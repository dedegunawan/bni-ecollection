<?php

namespace DedeGunawan\BniEcollection;

class MissingParameterMessage
{
	const DEFAULT_MISSING_MESSAGE = 'Parameter kurang';
	const TRANSACTION_TYPE_MISSING_MESSAGE = 'Tipe transaksi wajib diisi';
	const CLIENT_ID_MISSING_MESSAGE = 'Id client wajib diisi';
	const TRX_ID_MISSING_MESSAGE = 'Id transaksi wajib diisi';
	const TRX_AMOUNT_MISSING_MESSAGE = 'Nominal transaksi wajib diisi';
	const BILLING_TYPE_MISSING_MESSAGE = 'Jenis tagihan wajib diisi';
	const CUSTOMER_NAME_MISSING_MESSAGE = 'Nama pelanggan wajib diisi';

	const MESSAGE_MAP = [
		MissingParameterCode::DEFAULT_MISSING_CODE => self::DEFAULT_MISSING_MESSAGE,
		MissingParameterCode::TRANSACTION_TYPE_MISSING_CODE => self::TRANSACTION_TYPE_MISSING_MESSAGE,
		MissingParameterCode::CLIENT_ID_MISSING_CODE => self::CLIENT_ID_MISSING_MESSAGE,
		MissingParameterCode::TRX_ID_MISSING_CODE => self::TRX_ID_MISSING_MESSAGE,
		MissingParameterCode::TRX_AMOUNT_MISSING_CODE => self::TRX_AMOUNT_MISSING_MESSAGE,
		MissingParameterCode::BILLING_TYPE_MISSING_CODE => self::BILLING_TYPE_MISSING_MESSAGE,
		MissingParameterCode::CUSTOMER_NAME_MISSING_CODE => self::CUSTOMER_NAME_MISSING_MESSAGE,
	];
}