<?php

namespace App\Models\Benutzer\Profil;

use DateTime;
use App\Models\BaseModel;
use App\Models\Feuerwehr\Feuerwehr;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profil extends BaseModel
{
	use HasFactory;

	protected $table = "profile";

	static public $fields = [

	];

	########################
	# CUSTOM FUNCTIONS
	########################

	public function getGeburtstagIn()
	{
		$geburstag = Carbon::parse($this->getGeburtsdatum());
		$aktuelles_datum = now();


		$naechster_geburtstag = $geburstag->copy()
			->year($aktuelles_datum->year);

		if($naechster_geburtstag->lt($aktuelles_datum))
		{
			$naechster_geburtstag->addYear();
		}
		return $aktuelles_datum->diffInDays($naechster_geburtstag);
	}

	########################
	# SCOPES
	########################


	########################
	# RELATIONS
	########################

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function kommentare(): HasMany
	{
		return $this->hasMany(Kommentar::class);
	}

	public function feuerwehr(): HasOne
	{
		return $this->hasOne(Feuerwehr::class);
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

	public function setUserId(int $user_id) : void
	{
		$this->setAliasValue($user_id, 'user_id');
	}

	public function getUserId() : int
	{
		return $this->getAliasValue('user_id');
	}

	public function setGeschlecht($geschlecht) : void
	{
		$this->setAliasValue($geschlecht, 'geschlecht');
	}

	public function getGeschlecht()
	{
		return $this->getAliasValue('geschlecht');
	}

	public function setAvatarPfad(?string $avatar_pfad) : void
	{
		$this->setAliasValue($avatar_pfad, 'avatar_pfad');
	}

	public function getAvatarPfad() : ?string
	{
		return $this->getAliasValue('avatar_pfad');
	}

	public function setBannerPfad(?string $banner_pfad) : void
	{
		$this->setAliasValue($banner_pfad, 'banner_pfad');
	}

	public function getBannerPfad() : ?string
	{
		return $this->getAliasValue('banner_pfad');
	}

	public function setSignatur($signatur) : void
	{
		$this->setAliasValue($signatur, 'signatur');
	}

	public function getSignatur()
	{
		return $this->getAliasValue('signatur');
	}

	public function setGeburtsdatum(?\DateTime $geburtsdatum) : void
	{
		$geburtsdatum = $geburtsdatum->format('Y-m-d H:i:s');
		$this->setAliasValue($geburtsdatum, 'geburtsdatum');
	}

	public function getGeburtsdatum()
	{
		return new DateTime($this->getAliasValue('geburtsdatum'));
	}

	public function getAlter()
	{
		$geburtsdatum = Carbon::parse(self::getGeburtsdatum());
		return now()->diffInYears($geburtsdatum);
	}

	public function setBeschreibung($beschreibung) : void
	{
		$this->setAliasValue($beschreibung, 'beschreibung');
	}

	public function getBeschreibung()
	{
		return $this->getAliasValue('beschreibung');
	}

	public function setFeuerwehrId(?int $feuerwehr_id) : void
	{
		$this->setAliasValue($feuerwehr_id, 'feuerwehr_id');
	}

	public function getFeuerwehrId() : ?int
	{
		return $this->getAliasValue('feuerwehr_id');
	}

	public function setDienstgradId(?int $dienstgrad_id) : void
	{
		$this->setAliasValue($dienstgrad_id, 'dienstgrad_id');
	}

	public function getDienstgradId() : ?int
	{
		return $this->getAliasValue('dienstgrad_id');
	}

	public function setFunktionId(?int $funktion_id) : void
	{
		$this->setAliasValue($funktion_id, 'funktion_id');
	}

	public function getFunktionId() : ?int
	{
		return $this->getAliasValue('funktion_id');
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

	public function setDeletedAt($deleted_at) : void
	{
		$this->setAliasValue($deleted_at, 'deleted_at');
	}

	public function getDeletedAt()
	{
		return $this->getAliasValue('deleted_at');
	}

	public function setSichtbar(int $sichtbar) : void
	{
		$this->setAliasValue($sichtbar, 'sichtbar');
	}

	public function getSichtbar() : int
	{
		return $this->getAliasValue('sichtbar');
	}

}
