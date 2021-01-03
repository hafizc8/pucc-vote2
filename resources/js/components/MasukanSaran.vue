<template>
    <div class="row">
        <div class="col-12">
            <div class="card card-default chats">
                <div class="card-header text-white bg-dark">Masukan dan Saran</div>
                <div class="card-body">
                    <ul class="chat">
                        <li class="left clearfix" v-for="(val) in masukan" :key="val.username">
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">
                                        {{ val.anggota.nama }}
                                    </strong>
                                </div>
                                <p>
                                    [{{ val.tgl_aksi }}] {{ val.masukan }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['masukan']
    };
</script>