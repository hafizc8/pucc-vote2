<template>
    <div class="row mb-4">
        <div class="col" v-for="(val) in paslon" :key="val.id">
            <div class="card mb-3" style="height: 100%;">
                <h5 class="card-header bg-dark text-white">Kandidat {{ val.id }} # {{ val.nama_paslon }}</h5>
                <img :src="'/img/paslon'+val.id+'.jpg'" v-bind:alt="val.id" class="img-fluid card-img-top">
                <div class="card-body">
                    <b>Visi Misi</b>
                    <p class="card-text">{{ val.visi_misi }}</p>
                    <div class="text-center" v-if="isvoted==0">
                        <a :href="'/form-vote/' + val.id" class="btn btn-dark btn-lg btn-block">Vote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['paslon', 'user', 'isvoted']
    };
</script>