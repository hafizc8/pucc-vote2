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
                <p class="mb-0">Silahkan tekan tombol "Vote" disalah satu kandidat untuk memberikan voting.</p>
            </div>
        </div>
    </div>

    <card-paslon :paslon="paslon" :isvoted="isvoted"></card-paslon>
</div>
@endsection