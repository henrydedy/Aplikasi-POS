<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaksi;
use Carbon\Carbon;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Ambil data transaksi dari basis data
        $transaksi = Transaksi::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(total) as total_penjualan, SUM(total_beli) as total_pembelian')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Buat array untuk bulan dari Januari hingga Desember
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Array untuk menyimpan data penjualan dan pembelian
        $totalPenjualan = array_fill(0, 12, 0);
        $totalPembelian = array_fill(0, 12, 0);

        // Isi data penjualan dan pembelian ke dalam array berdasarkan bulan
        foreach ($transaksi as $item) {
            $monthIndex = $item->month - 1; // Index bulan dimulai dari 0
            $totalPenjualan[$monthIndex] = $item->total_penjualan;
            $totalPembelian[$monthIndex] = $item->total_pembelian;
        }

        return $this->chart->lineChart()
            ->setTitle('Data Penjualan dan Pembelian Bulanan')
            // ->setSubtitle('Data Penjualan dan Pembelian Bulanan ' . Carbon::now()->year)
            ->addData('Total Penjualan', $totalPenjualan)
            ->addData('Total Pembelian', $totalPembelian)
            ->setXAxis($months)
            ->setGrid(true); // Menambahkan grid pada chart
    }
}
