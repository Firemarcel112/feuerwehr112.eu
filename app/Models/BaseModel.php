<?php
namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Monolog\Logger;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Standardmodel Klasse für Models in Laravel
 */
class BaseModel extends Model
{
	use QueryCacheable;

	protected $column_prefix;

	static public $fields = [
	];

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


}
