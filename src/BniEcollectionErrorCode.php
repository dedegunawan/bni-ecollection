<?php

namespace DedeGunawan\BniEcollection;

class BniEcollectionErrorCode
{
	const NO_RESPONSE_CURL = '2000';
	const JSON_DECODE_ERROR = '2001';
	const INTERNAL_ERROR = '9999';

	const VALID_CODE = [
		self::NO_RESPONSE_CURL,
		self::JSON_DECODE_ERROR,
		self::INTERNAL_ERROR,
	];

	const DEFAULT_ERROR_CODE = self::INTERNAL_ERROR;


}