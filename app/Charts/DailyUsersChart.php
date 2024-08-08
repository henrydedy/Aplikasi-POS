<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaksi;
use Carbon\Carbon;

class DailyUsersChart
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart1 = $chart1;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Ambil data transaksi dari basis data untuk 2 minggu terakhir
        $start_date = Carbon::now()->subWeeks(1)->startOfWeek();
        $end_date = Carbon::now()->endOfWeek();

        $transaksi = Transaksi::selectRaw('DATE(tanggal) as date, SUM(total) as total_penjualan, SUM(total_beli) as total_pembelian')
            ->whereBetween('tanggal', [$start_date, $end_date])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Generate array untuk hari senin sampai minggu
        $dates = [];
        $totalPenjualan = [];
        $totalPembelian = [];

        $currentDate = $start_date->copy();
        while ($currentDate <= $end_date) {
            $formattedDate = $currentDate->format('D d M');
            $dates[] = $formattedDate;

            // Cari data penjualan dan pembelian untuk tanggal saat ini
            $transaksiData = $transaksi->where('date', $currentDate->toDateString())->first();
            if ($transaksiData) {
                $totalPenjualan[] = $transaksiData->total_penjualan;
                $totalPembelian[] = $transaksiData->total_pembelian;
            } else {
                $totalPenjualan[] = 0;
                $totalPembelian[] = 0;
            }

            $currentDate->addDay();
        }

        return $this->chart1->lineChart()
            ->setTitle('Data Penjualan dan Pembelian Harian (2 Minggu Terakhir)')
            // ->setSubtitle('Data Penjualan dan Pembelian Harian (2 Minggu Terakhir)')
            ->addData('Total Penjualan', $totalPenjualan)
            ->addData('Total Pembelian', $totalPembelian)
            ->setXAxis($dates)
            ->setGrid(true); // Menambahkan grid pada chart
    }
}
