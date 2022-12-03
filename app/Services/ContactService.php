<?php

namespace App\Services;

use App\Contact;


class ContactService
{

	public static function findByName(string $name): Contact
	{
		// queries to the db
		$contacts = [
		[
			'name'=>'Juan',
			'number'=>'935218754'
		],
		[
			'name'=>'Luis',
			'number'=>'965743927'
		]
	];

	$tokens = array_search($name, array_column($contacts, 'name'));

	if ($tokens === false){
		throw new \InvalidArgumentException('Contact not found');
	}

	return new Contact(
		$contacts[$tokens]['name'],
		$contacts[$tokens]['number'],
	);

	}

	public static function validateNumber(string $number): bool
	{
		// logic to validate numbers
		return preg_match('/^[0-9]{10}+$/', $number);
	}
}
