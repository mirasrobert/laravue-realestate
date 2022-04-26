

// State
const state = {
    token: null,
    user: null
};

const getters = {
    authenticated: (state) => {
        return state.token && state.user // Check if authenticated
    },

    user: (state) => {
        return state.user // Get User Information from the state
    }

}

// Actions are when you are creating API calls and committing Mutations
const actions = {
    async login({dispatch}, formData) {
        const response = await axios.post('/api/auth/login', formData); // Login that returns a token

        dispatch('attempt', response.data.token)

    },

    async attempt({commit, state}, token) {
        if(token) {
            commit('SET_TOKEN', token)
        }

        // Check if there is a token in the state
        // Don't send unnecessary error if no token
        // Stop the process
        if(!state.token) {
            return
        }

        try {
            // If there is a token the get the user from API
            const response = await axios.get('/api/auth/me')

            commit('SET_USER', response.data) // Set the user data on the state

        } catch (e) {
            // If token is invalid then clear the state
            commit('SET_TOKEN', null)
            commit('SET_USER', null)
            console.error('Unauthorized')
        }
    },

    logout({ commit }) {
        return axios.post('/api/auth/logout').then(() => {
            commit('SET_TOKEN', null)
            commit('SET_USER', null)
        })
    }
};

const mutations = {
    SET_TOKEN: (state, payload) => {
        state.token = payload; // Set the token on the state
    },
    SET_USER: (state, payload) => {
        state.user = payload // Set the user data on the  state
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
