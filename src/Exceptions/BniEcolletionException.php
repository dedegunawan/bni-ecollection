<?php

namespace DedeGunawan\BniEcollection\Exceptions;

use DedeGunawan\BniEcollection\BniEcollectionErrorCode;
use DedeGunawan\BniEcollection\BniEcollectionErrorMessage;

class BniEcolletionException extends \Exception
{
	public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
	{
		if (!in_array($code, BniEcollectionErrorCode::VALID_CODE)) {
			$code = BniEcollectionErrorCode::DEFAULT_ERROR_CODE;
		}
		parent::__construct($message, $code, $previous);
	}

	public static function newException($code, ?\Throwable $previous = null) {
		if (!in_array($code, BniEcollectionErrorCode::VALID_CODE)) {
			$code = BniEcollectionErrorCode::DEFAULT_ERROR_CODE;
		}
		throw new BniEcolletionException(
			BniEcollectionErrorMessage::MESSAGE_MAP[$code],
			$code,
			$previous
		);
	}
}