<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

trait MessageTrait
{
	public static function setErrorMessage(string $message)
	{
		$errmsg = Session::get('messages.error', []);
		$errmsg[] = $message;
		Session::flash('messages.error', $errmsg);
	}

	public static function setSuccessMessage(string $message)
	{
		$errmsg = Session::get('messages.success', []);
		$errmsg[] = $message;
		Session::flash('messages.success', $errmsg);
	}

	public static function log(string $message, array $context = [], string $type = 'info')
	{
		switch($type)
		{
			case 'debug':
				Log::debug($message, $context);
			break;

			case 'alert':
				Log::alert($message, $context);
			break;

			default:
				Log::info($message, $context);
			break;
		}
	}
}
