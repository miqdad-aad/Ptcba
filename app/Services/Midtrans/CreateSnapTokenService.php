<?php
 
namespace App\Services\Midtrans;

use App\Models\PesananModels;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $order = $this->order;
    //   printJSON($order);
        $params = [
            'transaction_details' => [
                'order_id' =>  'PES'.rand(10,20). date('Ym'). (PesananModels::count() + 1).rand(20,90),
                'gross_amount' => $order['total_pesanan'],
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nomor_hp,
            ]
        ];

        
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}