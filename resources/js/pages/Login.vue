<template>
    <div class="vh-100 d-flex justify-content-center">
        <div class="  login-box vertical-align">
            <div class="login-logo rounded bg-white border py-2 shadow mb-4">
                <a>EmsalCHAT</a>
            </div>

            <div class="card shadow">
                <div class="card-body login-card-body rounded">
                    <p class="login-box-msg">Giriş yaparak oturum başlatın</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="E-posta" v-model="user.email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Şifre" v-model="user.password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-success">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Beni Hatırla
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-success btn-block" @click="login">Giriş Yap</button>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</template>

<script>
import SWAlert from "sweetalert2";

export default {
    name: "Login",
    data() {
        return {
            user: {
                email: null,
                password: null,
            },
        }

    },
    mounted() {

    },
    methods: {
        async login() {
            await axios.post('/api/login', {...this.user})
                .then(async res => {
                    this.$router.push('/')
                }).catch((err) => {
                    SWAlert.fire({
                        icon: 'error',
                        title: 'Hata!',
                        timer: 1500,
                        timerProgressBar: true,
                        position:'top',
                        showConfirmButton:false,
                        text: err.response.data.message
                    })
                })
        }
    }
}
</script>

<style>


</style>
