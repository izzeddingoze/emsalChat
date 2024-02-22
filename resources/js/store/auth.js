import Vuex from 'vuex'
import SWAlert from "sweetalert2";

const state = {
    user: {},
    authenticated: null
}
const getters = {
    user: state => state.user,
    authenticated: state => state.authenticated
}

const actions = {
    async authenticate({commit}) {
        return axios.get('/api/user').then(res => {
            commit('setAuthenticate', true)
            commit('setUser', res.data.data)
        })
    },
    async login({commit, dispatch, state}, authData) {

        await axios.post('/api/login', {...authData})
            .then(async res => {
                commit('setAuthenticate', true)
                commit('setUser', res.data.data)
            }).catch((err) => {
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
