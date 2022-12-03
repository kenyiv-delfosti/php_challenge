<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;


class Mobile
{

	protected $provider;
	
	function __construct(CarrierInterface $provider)
	{
		$this->provider = $provider;
	}


	public function makeCallByName($name = '')
	{
		if( empty($name) ) return;

		$contact = ContactService::findByName($name);

		$this->provider->dialContact($contact);

		return $this->provider->makeCall();
	}

	public function SendMessageByName(string $name, string $message)
	{
		if( empty($name) ) return;

		$contact = ContactService::findByName($name);

		if(!ContactService::validateNumber($contact->number)){
			throw new \Exception('number invalid');
		}

		return $this->provider->SendMessage($contact->number, $message);
	}

}
