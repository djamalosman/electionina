@extends('layouts.app')
@section('title')
    HOME
@endsection

@section('content')
<div id="app">
    <div id="main">
        <div class="page-content">
            
        </div>
    </div>
</div>
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>
{{-- <script>
    var newTabOpened = false; // Variabel untuk melacak apakah tab baru telah dibuka

    setTimeout(function() {
        if (!newTabOpened) { // Hanya refresh jika tab baru belum dibuka
            var newTab = window.open('http://127.0.0.1:8000/Jadwal', '_blank');
            newTab.focus(); // Fokuskan ke tab baru
        }
    }, 1000); // Membuka tab baru setelah 5000 milidetik (5 detik)

    // Fungsi untuk menandai bahwa tab baru telah dibuka
    function markTabOpened() {
        newTabOpened = true;
    }
</script> --}}

@endsection
