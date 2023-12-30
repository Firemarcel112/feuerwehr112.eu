<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailVerifizierung extends BaseModel
{
	use HasFactory;

	static public $fields = [

	];

	########################
	# CUSTOM FUNCTIONS
	########################

	static public function valid(string $email, string $token)
	{
		$verifiziert = new self;
		$verifiziert = $verifiziert->isToken($token)
			->isEmail($email)
			->first();

		if(empty($verifiziert))
		{
			self::setErrorMessage(__('general.fehler_verifizierung'));
			return false;
		}

		if($verifiziert->getLaueftAb() < now())
		{
			self::setErrorMessage(__('general.token_ist_abgelaufen'));
			return false;
		}
		else
		{
			$user = $verifiziert->user;
			$user->setEmailVerifiedAt(now());
			$user->save();
			$verifiziert->delete();
			return true;
		}
	}

	########################
	# SCOPES
	########################

	/**
	 * Scope Für Email
	 *
	 * @param Builder $query
	 * @param string $email
	 * @return Builder
	 */
	public function scopeIsEmail(Builder $query, string $email): Builder
	{
		return $query->where(self::getFieldName('email'), $email);
	}

	/**
	 * Scope Für Token
	 *
	 * @param Builder $query
	 * @param string $token
	 * @return Builder
	 */
	public function scopeIsToken(Builder $query, string $token): Builder
	{
		return $query->where(self::getFieldName('token'), $token);
	}

	########################
	# RELATIONS
	########################

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	########################
	# CASTS
	########################

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

	public function setUserId(int $user_id) : void
	{
		$this->setAliasValue($user_id, 'user_id');
	}

	public function getUserId() : int
	{
		return $this->getAliasValue('user_id');
	}

	public function setEmail(string $email) : void
	{
		$this->setAliasValue($email, 'email');
	}

	public function getEmail() : string
	{
		return $this->getAliasValue('email');
	}

	public function setToken(string $token) : void
	{
		$this->setAliasValue($token, 'token');
	}

	public function getToken() : string
	{
		return $this->getAliasValue('token');
	}

	public function setLaueftAb(\DateTime $laueft_ab) : void
	{
		$laueft_ab = $laueft_ab->format('Y-m-d H:i:s');
		$this->setAliasValue($laueft_ab, 'laueft_ab');
	}

	public function getLaueftAb() : \DateTime
	{
		return new \DateTime($this->getAliasValue('laueft_ab'));
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

}
