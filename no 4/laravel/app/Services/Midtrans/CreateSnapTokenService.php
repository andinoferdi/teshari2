<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $checkout;

    public function __construct($checkout)
    {
        parent::__construct();

        $this->checkout = $checkout;
    }

    public function getSnapToken()
    {
        $item_details = [];
        foreach ($this->checkout->pesanans as $pesanan) {
            $item_details[] = [
                'id' => $pesanan->id,
                'price' => $pesanan->subtotal / $pesanan->kuantitas,
                'quantity' => $pesanan->kuantitas,
                'name' => $pesanan->barang->nama_barang,
            ];
        }
        $item_details[] = [
            'id' => $this->checkout->pengiriman->id,
            'price' => $this->checkout->pengiriman->ongkir,
            'quantity' => 1,
            'name' => 'Ongkir',
        ];

        $order_id = "barang:" . $this->checkout->uuid;
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $this->checkout->total_price,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $this->checkout->user->name,
                'phone' => $this->checkout->user->no_hp,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
