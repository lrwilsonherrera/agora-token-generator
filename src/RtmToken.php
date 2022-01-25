<?php

namespace EurekuDev\AgoraKeyGenerator;

use RtmTokenBuilder;

include_once "lib/RtmTokenBuilder.php";

class RtmToken
{

	public $textToken;

	private $appID;

	private $appCertificate;

	private $role;

	private $expireTimeInSeconds;

	public function __construct()
	{
		$this->appID = config('agorakeygenerator.agora_app_id');
		$this->appCertificate = config('agorakeygenerator.agora_app_certificate');
		$this->role = RtmTokenBuilder::RoleRtmUser;
		$this->expireTimeInSeconds = config('agorakeygenerator.agora_token_expire_time');

	}

	public function build($user)
	{
		$currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $this->expireTimeInSeconds;

		$this->textToken = RtmTokenBuilder::buildToken(
			$this->appID,
			$this->appCertificate,
			$user,
			$this->role,
			$privilegeExpiredTs
		);

		return $this;
	}

	public function getTextToken()
	{
		return $this->textToken;
	}
}
