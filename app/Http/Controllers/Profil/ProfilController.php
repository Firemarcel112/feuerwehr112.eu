<?php

namespace App\Http\Controllers\Profil;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Benutzer\Profil\Kommentar;
use App\Models\Benutzer\Profil\Profil;
use Illuminate\Http\Request;
use Nette\NotImplementedException;

class ProfilController extends Controller
{
	public function index(Request $request, string $benutzername)
	{
		$benutzer = User::with('profil')
			->isBenutzername($benutzername)
			->firstOrFail();

		if(empty($benutzer->profil))
		{
			$profil = new Profil();
			$profil->setUserId($benutzer->getId());
			$profil->save();
			$benutzer->load('profil');
		}

		$sichtbarkeit = $benutzer->profil->getSichtbar();

		switch($sichtbarkeit)
		{
			case 0: // Privat
				if(empty(auth()->user()) || auth()->user()->getBenutzername() != $benutzername)
				{
					throw new NotImplementedException('Redirect & ErrorMessage');
				}
				break;
			case 2: // Nur Freunde
				throw new NotImplementedException('Redirect & ErrorMessage');
				break;
		}

		$kommentare = Kommentar::with('user.profil')
			->isProfilId($benutzer->profil->getId())
			->get();

		return view('Profil.profil', [
			'benutzer' => $benutzer,
			'kommentare' => $kommentare,
		]);
	}

	public function edit(Request $request, string $benutzername)
	{

	}
}
