<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Charts\DailyUsersChart;
use App\Charts\MonthlyUsersChart;

class DashboardController extends Controller
{
    public function index(DailyUsersChart $dailyChart, MonthlyUsersChart $monthlyChart)
    {
        // Data yang diperlukan untuk dashboard
        $barang = Barang::all();
        $transaksi = Transaksi::all();
        $detail = TransaksiDetail::whereDate('created_at', today())->orderBy('created_at', 'desc')->get();
        $stok_kosong = Barang::where('stok', 0)->get();
        $hari_ini = Carbon::now()->format('Y-m-d');
        $transaksi_hari_ini = Transaksi::whereDate('tanggal', $hari_ini)->get();
        $pendapatan_hari_ini = Transaksi::whereDate('created_at', today())->sum('total');

        // Mengambil data untuk chart harian dan bulanan
        $chart1 = $dailyChart->build();
        $chart2 = $monthlyChart->build();

        return view('dashboard.index', compact('barang', 'transaksi', 'detail', 'transaksi_hari_ini', 'stok_kosong', 'pendapatan_hari_ini', 'chart1', 'chart2'));
    }

    public function kalkulator()
    {
        return view('dashboard.kalkulator');
    }
}
