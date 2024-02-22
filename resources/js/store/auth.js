const state = {
    user: {},
    authenticated: false
}
const getters = {
    user: state => state.user,
    authenticated: state => state.authenticated
}

const actions = {
    async authenticate({commit}) {
        return axios.get('/api/user').then(res => {
            commit('SET_AUTHENTICATED', true)
            commit('SET_USER', res.data.data)
        })
    }
}
const mutations = {
    SET_AUTHENTICATED: (state, value) => state.authanticated = value,
    SET_USER: (state, value) => state.user = value,
}

export default {state, getters, actions, mutations}
