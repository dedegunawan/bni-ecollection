<?php

namespace DedeGunawan\BniEcollection;

class ResponseMessage
{
	const SUCCESS_MESSAGE = 'Success';
	const INCOMPLETE_MESSAGE = 'Incomplete/invalid Parameter(s)';
	const IP_ADDRESS_CLIENT_ID_MESSAGE = 'IP address not allowed or wrong Client ID';
	const SERVICE_NOT_FOUND_MESSAGE = 'Service not found';
	const SERVICE_NOT_DEFINED_MESSAGE = 'Service not defined';
	const INVALID_VA_NUMBER_MESSAGE = 'Invalid VA Number';
	const INVALID_BILLING_NUMBER_MESSAGE = 'Invalid Billing Number';
	const TECHNICAL_FAILURE_MESSAGE = 'Technical Failure';
	const UNEXPECTED_ERROR_MESSAGE = 'Unexpected Error';
	const REQUEST_TIMEOUT_MESSAGE = 'Request Timeout';
	const BILLING_TYPE_NOT_MATCH_MESSAGE = 'Billing type does not match billing amount';
	const EXPIRED_DATE_MESSAGE = 'Invalid expiry date/time';
	const DECIMAL_FRACTION_MESSAGE = 'IDR currency cannot have billing amount with decimal fraction';
	const VA_NUMBER_SHOULD_NOT_DEFINED_MESSAGE = 'VA Number should not be defined when Billing Number is set';
	const INVALID_PERMISSION_MESSAGE = 'Invalid Permission(s)';
	const INVALID_BILLING_TYPE_MESSAGE = 'Invalid Billing Type';
	const CUSTOMER_NAME_CANNOT_BE_USED_MESSAGE = 'Customer Name cannot be used';
	const BILLING_PAID_MESSAGE = 'Billing has been paid';
	const BILLING_NOT_FOUND_MESSAGE = 'Billing not found';
	const VA_NUMBER_IN_USE_MESSAGE = 'VA Number is in use';
	const BILLING_NUMBER_IN_EXPIRED_MESSAGE = 'Billing has been expired';
	const BILLING_NUMBER_IN_USE_MESSAGE = 'Billing Number is in use';
	const DUPLICATE_BILLING_ID_MESSAGE = 'Duplicate Billing ID';
	const AMOUNT_CANNOT_BE_CHANGED_MESSAGE = 'Amount can not be changed';
	const DATA_NOT_FOUND_MESSAGE = 'Data not found';
	const EXCEED_DAILY_LIMIT_MESSAGE = 'Exceed Daily Limit Transaction';
	const FAILED_SEND_SMS_MESSAGE = 'Failed to send SMS Payment';
	const SMS_ONLY_FIX_PAYMENT_MESSAGE = 'SMS Payment can only be used with Fixed Payment';
	const BILLING_TYPE_NOT_SUPPORTED_MESSAGE = 'Billing type not supported for this Client ID';
	const SYSTEM_OFFLINE_MESSAGE = 'System is temporarily offline';
	const TOO_MANY_INQUIRY_MESSAGE = 'Too many inquiry request per hour';
	const CONTENT_TYPE_NOT_DEFINED_MESSAGE = 'Content-Type header not defined as it should be';
	const INTERNAL_ERROR_MESSAGE = 'Internal Error';

	const MESSAGE_MAP = [
		ResponseCode::SUCCESS => self::SUCCESS_MESSAGE,
		ResponseCode::INCOMPLETE => self::INCOMPLETE_MESSAGE,
		ResponseCode::IP_ADDRESS_CLIENT_ID => self::IP_ADDRESS_CLIENT_ID_MESSAGE,
		ResponseCode::SERVICE_NOT_FOUND => self::SERVICE_NOT_FOUND_MESSAGE,
		ResponseCode::SERVICE_NOT_DEFINED => self::SERVICE_NOT_DEFINED_MESSAGE,
		ResponseCode::INVALID_VA_NUMBER => self::INVALID_VA_NUMBER_MESSAGE,
		ResponseCode::INVALID_BILLING_NUMBER => self::INVALID_BILLING_NUMBER_MESSAGE,
		ResponseCode::TECHNICAL_FAILURE => self::TECHNICAL_FAILURE_MESSAGE,
		ResponseCode::UNEXPECTED_ERROR => self::UNEXPECTED_ERROR_MESSAGE,
		ResponseCode::REQUEST_TIMEOUT => self::REQUEST_TIMEOUT_MESSAGE,
		ResponseCode::BILLING_TYPE_NOT_MATCH => self::BILLING_TYPE_NOT_MATCH_MESSAGE,
		ResponseCode::EXPIRED_DATE => self::EXPIRED_DATE_MESSAGE,
		ResponseCode::DECIMAL_FRACTION => self::DECIMAL_FRACTION_MESSAGE,
		ResponseCode::VA_NUMBER_SHOULD_NOT_DEFINED => self::VA_NUMBER_SHOULD_NOT_DEFINED_MESSAGE,
		ResponseCode::INVALID_PERMISSION => self::INVALID_PERMISSION_MESSAGE,
		ResponseCode::INVALID_BILLING_TYPE => self::INVALID_BILLING_TYPE_MESSAGE,
		ResponseCode::CUSTOMER_NAME_CANNOT_BE_USED => self::CUSTOMER_NAME_CANNOT_BE_USED_MESSAGE,
		ResponseCode::BILLING_PAID => self::BILLING_PAID_MESSAGE,
		ResponseCode::BILLING_NOT_FOUND => self::BILLING_NOT_FOUND_MESSAGE,
		ResponseCode::VA_NUMBER_IN_USE => self::VA_NUMBER_IN_USE_MESSAGE,
		ResponseCode::BILLING_NUMBER_IN_EXPIRED => self::BILLING_NUMBER_IN_EXPIRED_MESSAGE,
		ResponseCode::BILLING_NUMBER_IN_USE => self::BILLING_NUMBER_IN_USE_MESSAGE,
		ResponseCode::DUPLICATE_BILLING_ID => self::DUPLICATE_BILLING_ID_MESSAGE,
		ResponseCode::AMOUNT_CANNOT_BE_CHANGED => self::AMOUNT_CANNOT_BE_CHANGED_MESSAGE,
		ResponseCode::DATA_NOT_FOUND => self::DATA_NOT_FOUND_MESSAGE,
		ResponseCode::EXCEED_DAILY_LIMIT => self::EXCEED_DAILY_LIMIT_MESSAGE,
		ResponseCode::FAILED_SEND_SMS => self::FAILED_SEND_SMS_MESSAGE,
		ResponseCode::SMS_ONLY_FIX_PAYMENT => self::SMS_ONLY_FIX_PAYMENT_MESSAGE,
		ResponseCode::BILLING_TYPE_NOT_SUPPORTED => self::BILLING_TYPE_NOT_SUPPORTED_MESSAGE,
		ResponseCode::SYSTEM_OFFLINE => self::SYSTEM_OFFLINE_MESSAGE,
		ResponseCode::TOO_MANY_INQUIRY => self::TOO_MANY_INQUIRY_MESSAGE,
		ResponseCode::CONTENT_TYPE_NOT_DEFINED => self::CONTENT_TYPE_NOT_DEFINED_MESSAGE,
		ResponseCode::INTERNAL_ERROR => self::INTERNAL_ERROR_MESSAGE,
	];
}