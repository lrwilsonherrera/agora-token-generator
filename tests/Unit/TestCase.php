<?php 

namespace EurekuDev\AgoraKeyGenerator\Tests;

use EurekuDev\AgoraKeyGenerator\AgoraKeyGeneratorServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	protected function getPackageProviders($app)
	{
		return [
			AgoraKeyGeneratorServiceProvider::class,
		];
	}

	protected function getEnvironmentSetUp($app)
	{
		//
	}
}
