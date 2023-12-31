<?php

namespace App\Models\Feuerwehr;

use App\Models\BaseModel;
use App\Models\Leitstelle\Leitstelle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feuerwehr extends BaseModel
{
	use HasFactory;

	protected $table = 'feuerwehren';

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

	public function leitstelle(): HasOne
	{
		return $this->hasOne(Leitstelle::class);
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

	public function setArtId(int $art_id) : void
	{
		$this->setAliasValue($art_id, 'art_id');
	}

	public function getArtId() : int
	{
		return $this->getAliasValue('art_id');
	}

	public function setLeistelleId(int $leistelle_id) : void
	{
		$this->setAliasValue($leistelle_id, 'leistelle_id');
	}

	public function getLeistelleId() : int
	{
		return $this->getAliasValue('leistelle_id');
	}

	public function setBeschreibung($beschreibung) : void
	{
		$this->setAliasValue($beschreibung, 'beschreibung');
	}

	public function getBeschreibung()
	{
		return $this->getAliasValue('beschreibung');
	}

	public function setKontakt(?string $kontakt) : void
	{
		$this->setAliasValue($kontakt, 'kontakt');
	}

	public function getKontakt() : ?string
	{
		return $this->getAliasValue('kontakt');
	}

	public function setWebseite(?string $webseite) : void
	{
		$this->setAliasValue($webseite, 'webseite');
	}

	public function getWebseite() : ?string
	{
		return $this->getAliasValue('webseite');
	}

	public function setKuerzel(?string $kuerzel) : void
	{
		$this->setAliasValue($kuerzel, 'kuerzel');
	}

	public function getKuerzel() : ?string
	{
		return $this->getAliasValue('kuerzel');
	}

	public function setEinsatzanzahl(?int $einsatzanzahl) : void
	{
		$this->setAliasValue($einsatzanzahl, 'einsatzanzahl');
	}

	public function getEinsatzanzahl() : ?int
	{
		return $this->getAliasValue('einsatzanzahl');
	}

	public function setMitglieder(?int $mitglieder) : void
	{
		$this->setAliasValue($mitglieder, 'mitglieder');
	}

	public function getMitglieder() : ?int
	{
		return $this->getAliasValue('mitglieder');
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