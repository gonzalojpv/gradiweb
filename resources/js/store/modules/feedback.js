import axios from 'axios';

const baseURL = process.env.MIX_VUE_APP_BASE_URI;

const state = {
    feedbacks: [],
};

const mutations = {
    SET_FEEDBACKS(state, feedbacks) {
        state.feedbacks = feedbacks;
    },
}

const getters = {
    getFeedbacks(state) {
        return state.feedbacks;
    },
}

const actions = {
    fetchFeedbacks({ commit }) {
        return axios.get(`${baseURL}feedbacks/`).then((Response) => {
            commit('SET_FEEDBACKS', Response.data.data);
            return Response.data;
        }).catch((Error) => {
            return Promise.reject(Error);
        });
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions,
}
