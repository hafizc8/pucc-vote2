
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        // new
        masukan: [],
        countanggota: [],
        paslon: [],
        choosepaslon: 0,
        isvoted: 0,
        chartnamapaslon: [],
        chartjumlahvote: [],
        loaded: false
    },

    created() {
        this.fetchDataChart();
        this.fetchStatistik();
        this.fetchMasukanSaran();
        this.fetchDataPaslon();
        this.checkIsVoted();

        Echo.join('chat')
            .here(users => {
                this.users = users;
            })
            .joining(user => {
                this.users.push(user);
            })
            .leaving(user => {
                this.users = this.users.filter(u => u.id !== user.id);
            })
            .listen('MessageSent', (event) => {
                // update data
                this.fetchDataChart();
                this.fetchStatistik();
                this.fetchMasukanSaran();
                this.fetchDataPaslon();
                this.checkIsVoted();
            });
    },

    methods: {
        getVoteFromChild(data) {
            axios.post('/send-vote', data).then(response => {
                console.log(response.data);
                window.location.href = '/';
            });
        },

        fetchMasukanSaran() {
            axios.get('/get-masukan').then((response) => {
                this.masukan = response.data;
            });
        },

        fetchStatistik() {
            axios.get('/count-anggota').then((response) => {
                this.countanggota = response.data;
            });
        },

        fetchDataPaslon() {
            axios.get('/data-paslon').then((response) => {
                this.paslon = response.data;
            });
        },

        fetchDataChart() {
            this.loaded = false;
            axios.get('/data-chart')
                .then((response) => {
                    this.chartnamapaslon = response.data.map((val) => val.paslon.nama_paslon);
                    this.chartjumlahvote = response.data.map((val) => val.jumlah);
                    this.loaded = true;
                })
                .catch(err => {
                    console.log(err);
                    this.loaded = false;
                });
        },

        checkIsVoted() {
            axios.get('/check-voted').then((response) => {
                // console.log(response.data);
                this.isvoted = response.data;
            });
        }
    }
});
