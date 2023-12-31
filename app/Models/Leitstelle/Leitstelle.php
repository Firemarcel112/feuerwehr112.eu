<?php

namespace App\Models\Leitstelle;

use App\Models\BaseModel;
use App\Models\Feuerwehr\Feuerwehr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Leitstelle extends BaseModel
{
	use HasFactory;

	protected $table = "leitstellen";

	static public $fields = [

	];

	########################
	# CUSTOM FUNCTIONS
	########################

	########################
	# SCOPES
	########################

	########################
	# RELATIONS
	########################

	public function art(): HasOne
	{
		return $this->hasOne(Art::class);
	}

	public function feuerwehren(): HasMany
	{
		return $this->hasMany(Feuerwehr::class);
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

	public function setName(string $name) : void
	{
		$this->setAliasValue($name, 'name');
	}

	public function getName() : string
	{
		return $this->getAliasValue('name');
	}

	public function setArtId(int $art_id) : void
	{
		$this->setAliasValue($art_id, 'art_id');
	}

	public function getArtId() : int
	{
		return $this->getAliasValue('art_id');
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