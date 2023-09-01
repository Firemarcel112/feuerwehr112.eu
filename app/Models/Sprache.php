<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Sprache extends BaseModel
{
	use HasFactory;

	protected $table = 'sprachen';

	protected $fillable = [
		'code',
		'bezeichnung',
	];

	########################
	# CUSTOM FUNCTIONS
	########################

	########################
	# SCOPES
	########################

	public function scopeisCode(Builder $query, string $code)
	{
		return $query->where('code', $code);
	}

	########################
	# RELATIONS
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

	public function setCode($code) : void
	{
		$this->setAliasValue($code, 'code');
	}

	public function getCode()
	{
		return $this->getAliasValue('code');
	}

	public function setBezeichnung(string $bezeichnung) : void
	{
		$this->setAliasValue($bezeichnung, 'bezeichnung');
	}

	public function getBezeichnung() : string
	{
		return $this->getAliasValue('bezeichnung');
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
