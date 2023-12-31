<?php

return [
	'required' => [
		'benutzername' => 'Der Benutzername ist erforderlich',
		'passwort' => 'Das Passwort ist erforderlich',
	],
	'regex' => [
		'passwort' => 'Das Passwort muss mindestens einen klein- und Großbuchstaben sowie ein Sonderzeichen enthalten',
	],
	'min' => [
		'passwort' => 'Das Passwort muss mindestens 8 Zeichen lang sein',
	]
];
