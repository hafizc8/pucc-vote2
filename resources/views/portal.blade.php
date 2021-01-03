@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h3 class="mb-4">Pemilihan Kepengurusan Baru PUCC 2021</h3>
            </div>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Selamat Datang, !</h4>
                    <p>Website PUCC Vote ini menampilkan data secara realtime..</p>
                    <hr>
                    <p class="mb-0">Silahkan pergi ke halaman "Vote" untuk memberikan voting.</p>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header text-white bg-dark">Statistik Suara</div>
            <div class="card-body">
                <chart-paslon v-if="loaded" :chartnamapaslon="chartnamapaslon" :chartjumlahvote="chartjumlahvote"></chart-paslon>
            </div>
        </div>
        <count-anggota :countanggota="countanggota"></count-anggota>
        <masukan-saran :masukan="masukan"></masukan-saran>
    </div>
@endsection