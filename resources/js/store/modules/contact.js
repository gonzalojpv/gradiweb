import axios from 'axios';

const baseURL = process.env.MIX_VUE_APP_BASE_URI;

const state = {
    contact: {},
};

const mutations = {
    SET_CONTACT(state, contact) {
        state.contact = contact;
    },
}

const getters = {
    getContact(state) {
        return state.contact;
    },
}

const actions = {
    sendContact({ state, commit }, form) {

        return axios.post(`${baseURL}contact/`, form)
            .then((response) => {
                commit('SET_CONTACT', response.data.data);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
            });
    },
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions,
}
