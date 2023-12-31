<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
	use HasFactory,
		Notifiable;

	static public $fields = [

	];

	protected $hidden = [
		'passwort',
		'remember_token'
	];

	########################
	# CUSTOM FUNCTIONS
	########################

	public function setOriginal($original)
	{
		$this->original = $original;
		return $this;
	}

	public function setAttributes($attributes)
	{
		$this->attributes = $attributes;
		return $this;
	}

	/**
	 * Gibt die Audit Tags zurück
	 *
	 * @return array
	 */
	public function generateTags() : array
	{
		return $this->audit_tags;
	}

	/**
	 * Fügt einen neue Tags für das Audit hinzu
	 *
	 * @param string $tag
	 * @return FinanceAdsModel
	 */
	public function addAuditTags(string $tag)
	{
		$this->audit_tags[] = $tag;
		return $this;
	}

	/**
	 * Wenn in dem Model der Prefix für die Salte gesetzt ist kann der Prefix ignoriert werden.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key)
	{
		if(!empty($this->column_prefix) && isset($this->attributes[$this->column_prefix.$key]))
		{
			return $this->getAttribute($this->column_prefix.$key);
		}
		return parent::__get($key);
	}

	private function cleanString(string $string): string
	{
		$string = preg_replace("/[\x{200B}-\x{200D}\x{FEFF}\s]+/u", " ", $string); // Unicode Leerzeichen wie Non Breaking Space ersetzen mit normalem Leerzeichen
		$encoding = mb_detect_encoding($string, mb_detect_order());
		$encoding = $encoding ? $encoding : 'UTF-8';
		$string = iconv('LATIN1',$encoding, iconv($encoding,'LATIN1//TRANSLIT//IGNORE',$string));
		return trim($string);
	}

	/**
	 * Dynamically set attributes on the model.
	 *
	 * @param  string  $key
	 * @param  mixed  $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		if(
			is_string($value) &&
			(
				in_array($key, $this->latin_fields ?? [])
				||
				in_array($this->column_prefix.$key, $this->latin_fields ?? [])
			)
		)
		{
			$value = $this->cleanString($value);
		}
		if(!empty($this->column_prefix) && isset($this->attributes[$this->column_prefix.$key]))
		{
			$this->setAttribute($this->column_prefix.$key, $value);
		}
		else
		{
			parent::__set($key, $value);
		}
	}

	/**
	 * Gibt den Namen der Tabelle zurück
	 *
	 * @param boolean $addSchema
	 * @param string $table_alias
	 * @return string Name der Tabelle
	 */
	static public function getTableName($addSchema = false, string $table_alias = '') : string
	{
		if($addSchema){
			$class = (new static);
			$dbconnection = $class->getConnection();
			$table = $dbconnection->getDatabaseName().".".$class->getTable();
		}else{
			$table = (new static)->getTable();
		}
		if(!empty($table_alias))
		{
			$table.= ' AS '.$table_alias;
		}
		return $table;
	}


	/**
	 * Gibt den Namen des Primärschlüssels zurück
	 *
	 * @return string
	 */
	static public function getPrimaryKey() : string
	{
		return (new static)->getKeyName();
	}

	public static function getFieldName(string $field, string $alias = "") : string
	{
		return self::getFullFieldName($field, $alias, false, '');
	}

	/**
	 * Gibt den Tabellenamen und die Aliasnamen des Feldes zurück
	 *
	 * @param string $field
	 * @param string $alias
	 * @param boolean $addSchema
	 * @param string $table_alias
	 * @return string
	 */
	static public function getFullFieldName(string $field, string $alias = "", bool $addSchema = true, string $table_alias = '') : string
	{
		if($addSchema)
		{
			$return = static::getTableName();
			$return.= '.';
		}
		else
		{
			$return = '';
		}

		if(!empty($table_alias))
		{
			$return = $table_alias.'.';
		}

		if(isset(static::$fields[$field]))
		{
			$return.= static::$fields[$field];
		}
		else
		{
			$return.= $field;
		}
		if(!empty($alias))
		{
			$return.= ' AS '.$alias;
		}
		return $return;

	}

	public function getAliasValue(string $field_name)
	{
		if(isset((new static)::$fields[$field_name]))
		{
			$v = (new static)::$fields[$field_name];
			return $this->$v ?? null;
		}
		return $this->{$field_name} ?? null;
	}

	public function setAliasValue($value, string $field_name)
	{
		if(is_string($value) && in_array($field_name, $this->latin_fields ?? []))
		{
			$value = $this->cleanString($value);
		}
		if(isset((new static)::$fields[$field_name]))
		{
			$v = (new static)::$fields[$field_name];
			$this->$v = $value;
			return $this;
		}
		$this->{$field_name} = $value;
		return $this;
	}

	static public function findAndCache($id, int $cache_time = 3600)
	{
		$class_name = get_class((new static));
		if(Cache::has($class_name.$id) == true)
		{
			return Cache::get($class_name.$id);
		}
		$data = parent::find($id);
		Cache::put($class_name.$id, $data, 3600);
		return $data;
	}

	public function save(array $options = [])
	{
		$class_name = get_class($this);
		$primary_key = self::getPrimaryKey();
		$id = $this->$primary_key;
		Cache::forget($class_name.$id);
		return parent::save($options);
	}

	public function delete()
	{
		$class_name = get_class($this);
		$primary_key = self::getPrimaryKey();
		$id = $this->$primary_key;
		Cache::forget($class_name.$id);
		return parent::delete();
	}

	########################
	# SCOPES
	########################

	/**
	 * Scope für Benutzername
	 *
	 * @param Builder $query
	 * @param string $benutzername
	 * @return Builder
	 */
	public function scopeIsBenutzername(Builder $query, string $benutzername): Builder
	{
		return $query->where(self::getFieldName('benutzername'), $benutzername);
	}

	/**
	 * Scope für E-Mail
	 *
	 * @param Builder $query
	 * @param string $email
	 * @return Builder
	 */
	public function scopeIsEmail(Builder $query, string $email): Builder
	{
		return $query->where(self::getFieldName('email'), $email);
	}

	########################
	# RELATIONS
	########################

	public function emailverifizierung(): HasOne
	{
		return $this->hasOne(EmailVerifizierung::class);
	}


	########################
	# GET & SET
	########################

	public function setId(int $id) : void
	{
		$this->setAliasValue($id, 'id');
	}

	public function getId() : int
	{
		return $this->getAliasValue('id');
	}

	public function setBenutzername(string $benutzername) : void
	{
		$this->setAliasValue($benutzername, 'benutzername');
	}

	public function getBenutzername() : string
	{
		return $this->getAliasValue('benutzername');
	}

	public function setEmail(string $email) : void
	{
		$this->setAliasValue($email, 'email');
	}

	public function getEmail() : string
	{
		return $this->getAliasValue('email');
	}

	public function setEmailVerifiedAt($email_verified_at) : void
	{
		$this->setAliasValue($email_verified_at, 'email_verified_at');
	}

	public function getEmailVerifiedAt()
	{
		return $this->getAliasValue('email_verified_at');
	}

	public function setPasswort(string $passwort) : void
	{
		$this->setAliasValue($passwort, 'passwort');
	}

	public function getPasswort() : string
	{
		return $this->getAliasValue('passwort');
	}

	public function getRememberToken() : ?string
	{
		return $this->getAliasValue('remember_token');
	}

	public function setCreatedAt($created_at) : void
	{
		$this->setAliasValue($created_at, 'created_at');
	}

	public function getCreatedAt()
	{
		return $this->getAliasValue('created_at');
	}

	public function setUpdatedAt($updated_at) : void
	{
		$this->setAliasValue($updated_at, 'updated_at');
	}

	public function getUpdatedAt()
	{
		return $this->getAliasValue('updated_at');
	}

	public function setGebannt(int $gebannt) : void
	{
		$this->setAliasValue($gebannt, 'gebannt');
	}

	public function getGebannt() : int
	{
		return $this->getAliasValue('gebannt');
	}

	public function setDeletedAt($deleted_at) : void
	{
		$this->setAliasValue($deleted_at, 'deleted_at');
	}

	public function getDeletedAt()
	{
		return $this->getAliasValue('deleted_at');
	}
}
