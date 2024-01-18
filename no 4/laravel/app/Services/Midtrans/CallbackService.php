<?php

namespace App\Services\Midtrans;

use App\Models\Checkout;
use App\Models\CheckoutPembelajaran;
use App\Services\Midtrans\Midtrans;
use Midtrans\Notification;

class CallbackService extends Midtrans
{
    protected $notification;
    protected $checkout;
    protected $serverKey;

    public function __construct()
    {
        parent::__construct();

        $this->serverKey = config('midtrans.server_key');
        $this->_handleNotification();
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getCheckout()
    {
        return $this->checkout;
    }

    protected function _createLocalSignatureKey()
    {
        $checkoutId = $this->notification->order_id;
        $statusCode = $this->notification->status_code;
        $grossAmount = $this->notification->gross_amount;
        $serverKey = $this->serverKey;
        $input = $checkoutId . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    protected function _handleNotification()
    {
        $notification = new Notification();

        $checkoutNumber = explode(':', $notification->order_id)[1];

        if (explode(':', $notification->order_id)[0] == 'barang') {
            $checkout = Checkout::where('uuid', $checkoutNumber)->first();
        } else {
            $checkout = CheckoutPembelajaran::where('uuid', $checkoutNumber)->first();
        }

        $this->notification = $notification;
        $this->checkout = $checkout;
    }
}
