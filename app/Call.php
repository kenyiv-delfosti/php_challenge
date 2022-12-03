<?php

namespace App;


class Call
{
	public string $number;
	public string $message;

	function __construct(string $number, string $message)
	{
		# code...
		$this->number=$number;
		$this->message=$message;
	}
}