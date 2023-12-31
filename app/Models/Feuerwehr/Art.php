<?php

namespace App\Models\Feuerwehr;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Art extends BaseModel
{
	use HasFactory;

	protected $table = "feuerwehr_arten";

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

	public function setKuerzel(?string $kuerzel) : void
	{
		$this->setAliasValue($kuerzel, 'kuerzel');
	}

	public function getKuerzel() : ?string
	{
		return $this->getAliasValue('kuerzel');
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
