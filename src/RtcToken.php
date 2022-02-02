<?php

namespace EurekuDev\AgoraKeyGenerator;

use RtcTokenBuilder;

include_once "lib/RtcTokenBuilder.php";

class RtcToken
{
    	public const RoleAttendee = 0;
    	public const RolePublisher = 1;
    	public const RoleSubscriber = 2;
    	public const RoleAdmin = 101;

	public $textToken;

	private $appID;

	private $appCertificate;

	private $expireTimeInSeconds;

	
	public function __construct()
	{
		$this->appID = config('agorakeygenerator.agora_app_id');
		$this->appCertificate = config('agorakeygenerator.agora_app_certificate');
		$this->expireTimeInSeconds = config('agorakeygenerator.agora_token_expire_time');

	}

	public function buildWithUid($channelName, $uid=0, $role=RtcToken::RolePublisher)
	{
		$currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $this->expireTimeInSeconds;

		$this->textToken = RtcTokenBuilder::buildTokenWithUid(
			$this->appID,
			$this->appCertificate,
			$channelName,
			$uid,
			$role,
			$privilegeExpiredTs
		);

		return $this;
	}

	public function buildWithUserAccount($channelName, $user, $role=RtcToken::RolePublisher)
	{
		$currentTimestamp = (new \DateTime("now", new \DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $this->expireTimeInSeconds;

		$this->textToken = RtcTokenBuilder::buildTokenWithUserAccount(
			$this->appID,
			$this->appCertificate,
			$channelName,
			$user,
			$role,
			$privilegeExpiredTs
		);

		return $this;
	}

	public function getTextToken()
	{
		return $this->textToken;
	}
}
