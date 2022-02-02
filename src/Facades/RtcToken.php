<?php

namespace EurekuDev\AgoraKeyGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class RtcToken extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'rtctoken';
	}
}
