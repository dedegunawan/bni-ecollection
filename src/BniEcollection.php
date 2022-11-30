<?php

namespace DedeGunawan\BniEcollection;

use DedeGunawan\BniEcollection\Exceptions\BniEcolletionException;
use DedeGunawan\BniEcollection\Exceptions\MissingParameter;
use DedeGunawan\BniEcollection\Exceptions\ResponseErrorException;

class BniEcollection
{
	const DEVELOPMENT_ENV = 1;
	const PRODUCTION_ENV = 0;

	const DEVELOPMENT_MODES = [
		self::PRODUCTION_ENV,
		self::DEVELOPMENT_ENV,
	];

	const DEFAULT_DEVELOPMENT_URL = 'https://apibeta.bni-ecollection.com/';
	const DEFAULT_PRODUCTION_URL = 'https://api.bni-ecollection.com/';

	protected static $development_mode = self::DEVELOPMENT_ENV;
	protected static $development_url = self::DEFAULT_DEVELOPMENT_URL;
	protected static $production_url = self::DEFAULT_PRODUCTION_URL;
	protected static $client_id;
	protected static $secret_key;

	/**
	 * @return int
	 */
	public static function getDevelopmentMode(): int
	{
		return self::$development_mode;
	}

	/**
	 * @param int $development_mode
	 */
	public static function setDevelopmentMode(int $development_mode): void
	{
		self::$development_mode = $development_mode;
	}

	/**
	 * @return string
	 */
	public static function getDevelopmentUrl(): string
	{
		return self::$development_url;
	}

	/**
	 * @param string $development_url
	 */
	public static function setDevelopmentUrl(string $development_url): void
	{
		self::$development_url = $development_url;
	}

	/**
	 * @return string
	 */
	public static function getProductionUrl(): string
	{
		return self::$production_url;
	}

	/**
	 * @param string $production_url
	 */
	public static function setProductionUrl(string $production_url): void
	{
		self::$production_url = $production_url;
	}

	/**
	 * @return mixed
	 */
	public static function getClientId()
	{
		return self::$client_id;
	}

	/**
	 * @param mixed $client_id
	 */
	public static function setClientId($client_id): void
	{
		self::$client_id = $client_id;
	}

	/**
	 * @return mixed
	 */
	public static function getSecretKey()
	{
		return self::$secret_key;
	}

	/**
	 * @param mixed $secret_key
	 */
	public static function setSecretKey($secret_key): void
	{
		self::$secret_key = $secret_key;
	}

	public function getUrl() {
		return self::getDevelopmentMode() == self::DEVELOPMENT_ENV
			? self::getDevelopmentUrl()
			: self::getProductionUrl();

	}

	public static function getInstance() {
		static $instance;
		if (!$instance) $instance = new self();
		return $instance;
	}

	public function encrypt($datas) {
		return BniEnc::encrypt($datas, self::getClientId(), self::getSecretKey());
	}

	public function decrypt($hashed_string) {
		return BniEnc::decrypt($hashed_string, self::getClientId(), self::getSecretKey());
	}

	public function send($encrypted_datas) {

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->getUrl(),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode([
				'client_id' => self::getClientId(),
				'data' => $encrypted_datas
			]),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
		));

		$response = curl_exec($curl);

		curl_close($curl);

		if (!$response) BniEcolletionException::newException(BniEcollectionErrorCode::NO_RESPONSE_CURL);

		$response_json = json_decode($response, 1);
		if (!$response_json) BniEcolletionException::newException(BniEcollectionErrorCode::JSON_DECODE_ERROR);

		$status = $response_json['status'];

		if (!ResponseCode::isSuccessCode($status)) ResponseErrorException::newException($status);

		$data = $response_json['data'];
		$decrypted_response_data = $this->decrypt($data);
		return $decrypted_response_data;
	}

	public function createVa(
		$trx_id,
		$trx_amount,
		$billing_type,
		$customer_name,
		$customer_email = null,
		$customer_phone = null,
		$virtual_account = null,
		$datetime_expired = null,
		$description = null,
	) {
		if (!$trx_id) MissingParameter::newException(MissingParameterCode::TRX_ID_MISSING_CODE);
		if (!$trx_amount && $billing_type != BillingType::OPEN_PAYMENT) MissingParameter::newException(MissingParameterCode::TRX_AMOUNT_MISSING_CODE);
		if (!$customer_name) MissingParameter::newException(MissingParameterCode::CUSTOMER_NAME_MISSING_CODE);
		$datas = [
			'type' => TransactionType::CREATE_BILLING,
			'client_id' => self::getClientId(),
			'trx_id' => $trx_id,
			'trx_amount' => $trx_amount,
			'billing_type' => BillingType::validateBillingType($billing_type),
			'customer_name' => $customer_name,
			'customer_email' => $customer_email,
			'customer_phone' => $customer_phone,
			'virtual_account' => $virtual_account,
			'datetime_expired' => $datetime_expired,
			'description' => $description,
		];
		$encrypted = $this->encrypt($datas);
		$this->send($encrypted);

	}

	public function inquiryVa($trx_id) {
		if (!$trx_id) MissingParameter::newException(MissingParameterCode::TRX_ID_MISSING_CODE);
		$response = $this->send(
			$this->encrypt([
				'client_id' => self::getClientId(),
				'type' => TransactionType::INQUIRY_BILLING,
				'trx_id' => $trx_id
			])
		);
		return $response;
	}

	public function callback($client_id, $hashed_datas)
	{
		$app_client_id = self::getClientId();
		if ($app_client_id != $client_id) ResponseErrorException::newException(
			ResponseCode::UNEXPECTED_ERROR
		);

		$datas = $this->decrypt($hashed_datas);
		if (!$datas) ResponseErrorException::newException(
			ResponseCode::UNEXPECTED_ERROR
		);
		return $datas;
	}

}