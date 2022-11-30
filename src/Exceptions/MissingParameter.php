<?php

namespace DedeGunawan\BniEcollection\Exceptions;

use DedeGunawan\BniEcollection\MissingParameterCode;
use DedeGunawan\BniEcollection\MissingParameterMessage;

class MissingParameter extends \Exception
{
	public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
	{
		if (!in_array($code, MissingParameterCode::VALID_CODE)) {
			$code = MissingParameterCode::DEFAULT_MISSING_CODE;
		}
		parent::__construct($message, $code, $previous);
	}

	public static function newException($code, ?\Throwable $previous = null) {
		if (!in_array($code, MissingParameterCode::VALID_CODE)) {
			$code = MissingParameterCode::DEFAULT_MISSING_CODE;
		}
		throw new MissingParameter(
			MissingParameterMessage::MESSAGE_MAP[$code],
			$code,
			$previous
		);
	}
}