import axios from 'axios'

const baseURL = process.env.MIX_VUE_APP_BASE_URI;

const state = {
    results: [],
}

const mutations = {
    SET_RESULTS(state, results) {
        results.forEach(item => {
            state.results.push(item);
        });
    },
    CLEAR_RESULTS(state) {
        state.results = [];
    },
}

const getters = {
    getResults(state) {
        return state.results;
    },
}

const actions = {
    fetchSearch({ commit }, params) {
        return axios.get(`${baseURL}search`, { params }).then(response => {
            commit("SET_RESULTS", response.data.data);
            return response.data;
        }).catch(error => {
            return Promise.reject(error);
        });
    },
    clearSearch({ commit }) {
        commit("CLEAR_RESULTS");
    },
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions,
}
