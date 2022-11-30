<?php

namespace DedeGunawan\BniEcollection;

class BniEcollectionErrorMessage
{
	const NO_RESPONSE_CURL_MESSAGE = 'Tidak ada response dari server';
	const JSON_DECODE_ERROR_MESSAGE = 'Gagal melakukan decode response';
	const INTERNAL_ERROR_MESSAGE = 'Internal Error';


	const MESSAGE_MAP = [
		BniEcollectionErrorCode::NO_RESPONSE_CURL => self::NO_RESPONSE_CURL_MESSAGE,
		BniEcollectionErrorCode::JSON_DECODE_ERROR => self::JSON_DECODE_ERROR_MESSAGE,
		BniEcollectionErrorCode::INTERNAL_ERROR => self::INTERNAL_ERROR_MESSAGE
	];
}