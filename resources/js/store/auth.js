import Vuex from 'vuex'
import SWAlert from "sweetalert2";
import router from "../router.js";

const state = {
    user: null,
    authenticated: null
}
const getters = {
    user: state => state.user,
    authenticated: state => state.authenticated
}

const actions = {
    async authenticate({commit}) {
        if (!state.user)
            return axios.get('/api/user').then(res => {
                commit('setAuthenticate', true)
                commit('setUser', res.data.data)
            }).catch(err=>{

            })
    },
    async login({commit, dispatch, state}, authData) {

        await axios.get('/sanctum/csrf-token').then(() => {
            axios.post('/api/login', {...authData})
                .then(async res => {
                    commit('setAuthenticate', true)
                    commit('setUser', res.data.data)
                    router.push('/')
                }).catch((err) => {
                console.log(err)
                SWAlert.fire({
                    icon: 'error',
                    title: 'Hata!',
                    timer: 1500,
                    timerProgressBar: true,
                    position: 'top',
                    showConfirmButton: false,
                    text: "hata"
                })
            })
        })
    }

}
const mutations = {
    setAuthenticate(state, value) {
        state.authenticated = value
    },
    setUser(state, value) {
        state.user = value
    }

}

const store = new Vuex.Store({state, getters, actions, mutations})

export default store
