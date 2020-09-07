import axios from 'axios';

const baseURL = process.env.MIX_VUE_APP_BASE_URI;

const state = {
    cars: [],
};

const mutations = {
    SET_CARS(state, cars) {
        state.cars = cars;
    },
}

const getters = {
    getAllCars(state) {
        return state.cars;
    },
}

const actions = {
    fetchAllCars({ commit }) {

        return axios.get(`${baseURL}cars`)
            .then((response) => {
                commit('SET_CARS', response.data.data);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
            });
    },
    createCar({ state, commit }, form) {
        return axios.post(`${baseURL}cars`, form)
            .then((response) => {
                commit('SET_CARS', response.data.data);
                return response.data;
            }).catch(error => {
                return Promise.reject(error);
            });
    },
    deleteCar({ commit }, id) {
        return axios.delete(`${baseURL}cars/${id}`)
            .then((response) => {
                commit('SET_CARS', response.data.data);

                return response.data;
            }).catch(error => {
                return Promise.reject(error);
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
