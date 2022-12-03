<?php

namespace Tests;

use App\Call;
use App\Mobile;
use Mockery as m;
use App\Providers\MyProvider;
use PHPUnit\Framework\TestCase;
use App\Services\ContactService;

class MobileTest extends TestCase
{
	
	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$provider = new MyProvider();
		$mobile = new Mobile($provider);

		$this->assertNull($mobile->makeCallByName(''));
	}

	/** @test */
	public function it_returns_an_exception_when_there_is_no_valid_contact_supplied()
	{
		try {
			ContactService::findByName('Undefined');
		} catch (\Exception $er) {
			$error = $er->getMessage();
		}

		$this->assertEquals(Exception::class, get_class($er));
	}

}
