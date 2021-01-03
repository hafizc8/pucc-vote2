<template>
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="card mb-3">
                <div class="card-header text-white bg-dark">Total Anggota</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><b>{{ countanggota.count_anggota }}</b> Anggota</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card mb-3">
                <div class="card-header text-white bg-dark">Total Anggota Yang Sudah Vote</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><b>{{ countanggota.count_has_voted }}</b> Anggota</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card mb-3">
                <div class="card-header text-white bg-dark">Anggota Yang Belum Vote</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><b>{{ countanggota.count_anggota - countanggota.count_has_voted }}</b> Anggota</h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['countanggota']
    };
</script>