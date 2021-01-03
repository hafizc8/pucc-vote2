<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header bg-dark text-white'>Voting</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>
                        
                        <div class="alert alert-warning">
                            <b>Anda akan memilih paslon nomor {{ choosepaslon }}</b>
                        </div>

                        <form @submit.prevent="sendVote">
                            <div class='form-group'>
                                <label htmlFor='masukan'>Masukan dan Saran</label>
                                <textarea type="text" class="form-control" id="masukan" v-model="masukan" rows="5"></textarea>
                            </div>
                            <div class='form-group'>
                                <a href="/vote" class="btn btn-secondary">Back</a>
                                <button class='btn btn-primary'>Vote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['user', 'choosepaslon'],
        data(){
            return {
                errors: [],
                masukan: null,
            }
        },
        methods: {
            sendVote(e){
                if (this.$data.masukan != null) {
                    this.$emit('clickvote', {
                        user: this.user,
                        choosepaslon: this.choosepaslon,
                        masukan: this.masukan
                    });
                    return true;
                }

                this.errors = [];

                if (!this.masukan) {
                    this.errors.push('Masukan dan saran wajib diisi!');
                }

                e.preventDefault();
            }
        }
    }
</script>