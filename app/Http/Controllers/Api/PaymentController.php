<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Marketing;
use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'status_code'   => 200,
            'payment'       => Payment::where('marketing_Id', Marketing::where('name', $request->name)->first()->id)->get(),
            'sale'          => Sale::where('marketing_Id', Marketing::where('name', $request->name)->first()->id)->sum('grand_total'),
        ]);
    }

    public function create(Request $request)
    {
        $marketing  = Marketing::where('name', $request->name)->first()->id;
        $sale       = Sale::where('marketing_Id', $marketing)->sum('grand_total');
        $payment    = ($sale / $request->month);

        for ($i = 0; $i < $request->month; $i++) {

            $no = Payment::orderBy("payment_number", "DESC")->first();
            if ($no == null) {
                $payment_number = 'PYM0001';
            } else {
                $nama   = substr($no->payment_number, 3, 4);
                $tambah = (int) $nama + 1;
                if (strlen($tambah) == 1) {
                    $payment_number = 'PYM' . "000" . $tambah;
                } elseif (strlen($tambah) == 2) {
                    $payment_number = 'PYM' . "00" . $tambah;
                } elseif (strlen($tambah) == 3) {
                    $payment_number = 'PYM' . "0" . $tambah;
                } else {
                    $payment_number = 'PYM' . $tambah;
                }
            }

            Payment::create([
                'marketing_Id'      => $marketing,
                'payment_number'    => $payment_number,
                'total_payment'     => round($payment),
                'metode_payment'    => $request->metode_payment,
                'kredit'            => $i + 1,
                'date_payment'      => $no == null ? date('Y-m') . '-' . '25' : date('Y-m-d', strtotime('+1 month', strtotime($no->date_payment))),
                'status'            => 'Belum Lunas',
            ]);
        }

        return response()->json(['status_code' => 200, 'message' => 'Payment Dibuat ' . $request->month]);
    }

    public function store(Request $request)
    {
        Payment::where('payment_number', $request->payment_number)
                ->update([
                    'total_payment' => '0',
                    'status'        => 'Lunas',
                ]);

        return response()->json(['status_code' => 200, 'message' => 'Payment Dibuat ' . $request->payment_number]);
    }
}
