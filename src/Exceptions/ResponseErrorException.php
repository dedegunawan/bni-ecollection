<?php

namespace DedeGunawan\BniEcollection\Exceptions;


use DedeGunawan\BniEcollection\ResponseCode;
use DedeGunawan\BniEcollection\ResponseMessage;

class ResponseErrorException extends \Exception
{
	public function __construct(string $message = "", $code = 0, ?\Throwable $previous = null)
	{
		if (!in_array($code, ResponseCode::VALID_CODE)) {
			$code = ResponseCode::DEFAULT_RESPONSE_ERROR_CODE;
		}

		parent::__construct($message, $code, $previous);
	}

	public static function newException($code, ?\Throwable $previous = null) {
		if (!in_array($code, ResponseCode::VALID_CODE)) {
			$code = ResponseCode::DEFAULT_RESPONSE_ERROR_CODE;
		}
		throw new ResponseErrorException(
			ResponseMessage::MESSAGE_MAP[$code],
			$code,
			$previous
		);
	}
}