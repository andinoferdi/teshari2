<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenPembelajaranService extends Midtrans
{
    protected $checkout_pembelajaran;

    public function __construct($checkout_pembelajaran)
    {
        parent::__construct();

        $this->checkout_pembelajaran = $checkout_pembelajaran;
    }

    public function getSnapToken()
    {
        $item_details = [];
        $item_details[] = [
            'id' => $this->checkout_pembelajaran->pembelajaran->id,
            'price' => $this->checkout_pembelajaran->pembelajaran->tarif - ($this->checkout_pembelajaran->pembelajaran->tarif * $this->checkout_pembelajaran->pembelajaran->diskon / 100),
            'quantity' => $this->checkout_pembelajaran->lama,
            'name' => $this->checkout_pembelajaran->pembelajaran->nama_pembelajaran,
        ];

        $order_id = "pembelajaran:" . $this->checkout_pembelajaran->uuid;
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $this->checkout_pembelajaran->total_harga,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $this->checkout_pembelajaran->user->name,
                'phone' => $this->checkout_pembelajaran->user->no_hp,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
