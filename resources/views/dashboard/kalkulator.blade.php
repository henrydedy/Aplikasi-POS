@extends('layout.app')

@section('title', ' - Kalkulator')

@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4 style="color: white;">Kalkulator Penghitung Uang</h4>
            </div>

            <div class="card-body">
                <form id="calculatorForm" class="row g-3">
                    @php
                        $denominations = [100, 500, 1000, 2000, 5000, 10000, 20000, 50000, 75000, 100000];
                        sort($denominations); // Mengurutkan denominasi secara berurutan
                    @endphp
                    @foreach ($denominations as $value)
                        <div class="col-6 col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-money-bill"></i>
                                    {{ number_format($value, 0, ',', '.') }} X</span>
                                <input type="number" class="form-control denomination-input" id="{{ $value }}"
                                    name="{{ $value }}" value="" min="" placeholder="">
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-center">
                        <p id="total" class="fw-bold fs-4 bg-light p-3 rounded">Total: Rp. 0</p>
                        <!-- fs-4 untuk memperbesar font -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-secondary" id="resetBtn">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('calculatorForm');
            const resetBtn = document.getElementById('resetBtn');
            form.addEventListener('input', calculateTotal);
            resetBtn.addEventListener('click', resetForm);

            function calculateTotal() {
                let total = 0;
                const denominations = [100, 500, 1000, 2000, 5000, 10000, 20000, 50000, 75000, 100000];

                denominations.forEach(denom => {
                    const value = parseInt(document.getElementById(denom).value) || 0;
                    total += value * denom;
                    const inputField = document.getElementById(denom);
                    inputField.style.backgroundColor = value > 0 ? 'lightgreen' : '';
                });

                const totalElement = document.getElementById('total');
                totalElement.innerText = 'Total: Rp. ' + total.toLocaleString('id-ID');
                totalElement.style.fontSize = '24px'; // Mengatur ukuran font total
            }

            function resetForm() {
                const inputs = document.querySelectorAll('.denomination-input');
                inputs.forEach(input => {
                    input.value = '';
                    input.style.backgroundColor = '';
                });
                calculateTotal(); // Panggil kembali calculateTotal untuk memperbarui total setelah mereset input.
            }
        });
    </script>
@endsection
