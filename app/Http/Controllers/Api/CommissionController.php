<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $commission = [];
        $bulan      = array(1 =>
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
        $sales      = Sale::orderBy('date', 'ASC')->groupBy('date')->get('date');
        $validSales = null;
        foreach ($sales as $showsales) {
            if ($validSales != date('Y-m', strtotime($showsales->date))) {
                $marketing = Sale::orderBy('marketing_Id', 'ASC')->where('date', 'LIKE', '%' . date('Y-m', strtotime($showsales->date)) . '%')->groupBy('marketing_Id')->get('marketing_Id');
                foreach ($marketing as $showmarketing) {
                    $sale = Sale::where('date', 'LIKE', '%' . date('Y-m', strtotime($showsales->date)) . '%')->where('marketing_Id', $showmarketing->marketing_Id)->sum('grand_total');

                    if ($sale <= 100000000) {
                        $omzet = 0;
                    }elseif ($sale >= 100000000 && $sale <= 200000000) {
                        $omzet = 2.5;
                    }elseif ($sale >= 200000000 && $sale <= 500000000) {
                        $omzet = 5;
                    } else {
                        $omzet = 10;
                    }

                    $commissions = $sale * ($omzet / 100);

                    $commission[] = [
                        'Marketing'         => $showmarketing->marketing->name,
                        'Bulan'             => $bulan[date('n', strtotime($showsales->date))],
                        'Omzet'             => $sale,
                        'Komisi %'          => $omzet . '%',
                        'Komisi Nominal'    => $commissions,
                    ];
                }

                $validSales = date('Y-m', strtotime($showsales->date));
            }
        }

        return $commission;
    }
}
