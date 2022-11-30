<?php

namespace DedeGunawan\BniEcollection;

class BillingType
{
	const OPEN_PAYMENT = 'o';
	const CLOSE_PAYMENT = 'c';
	const INSTALLMENT_PAYMENT = 'i';
	const MINIMUM_PAYMENT = 'm';
	const OPEN_MINIMUM_PAYMENT = 'n';
	const OPEN_MAXIMUM_PAYMENT = 'x';

	const VALID_BILLING_TYPE = [
		self::OPEN_PAYMENT,
		self::CLOSE_PAYMENT,
		self::INSTALLMENT_PAYMENT,
		self::MINIMUM_PAYMENT,
		self::OPEN_MINIMUM_PAYMENT,
		self::OPEN_MAXIMUM_PAYMENT,
	];

	const DEFAULT_BILLING_TYPE = self::CLOSE_PAYMENT;

	public static function validateBillingType($billing_type) {
		return in_array($billing_type, BillingType::VALID_BILLING_TYPE) ? $billing_type : BillingType::DEFAULT_BILLING_TYPE;
	}


}