<?php

namespace App\Models\Benutzer\Profil;

use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kommentar extends BaseModel
{
	use HasFactory;

	protected $table = "profil_kommentare";

	static public $fields = [

	];

	########################
	# CUSTOM FUNCTIONS
	########################

	########################
	# SCOPES
	########################

	public function scopeIsProfilId(Builder $query, int $profil_id): Builder
	{
		return $query->where(self::getFieldName('profil_id'), $profil_id);
	}

	########################
	# RELATIONS
	########################

	public function profil(): belongsTo
	{
		return $this->belongsTo(Profil::class);
	}

	public function user(): belongsTo
	{
		return $this->belongsTo(User::class);
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

	public function setProfilId(int $profil_id) : void
	{
		$this->setAliasValue($profil_id, 'profil_id');
	}

	public function getProfilId() : int
	{
		return $this->getAliasValue('profil_id');
	}

	public function setUserId(int $user_id) : void
	{
		$this->setAliasValue($user_id, 'user_id');
	}

	public function getUserId() : int
	{
		return $this->getAliasValue('user_id');
	}

	public function setKommentar($kommentar) : void
	{
		$this->setAliasValue($kommentar, 'kommentar');
	}

	public function getKommentar()
	{
		return $this->getAliasValue('kommentar');
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
