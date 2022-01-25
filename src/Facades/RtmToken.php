<?php

namespace EurekuDev\AgoraKeyGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class RtmToken extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'rtmtoken';
	}
}
