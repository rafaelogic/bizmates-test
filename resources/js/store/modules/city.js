export const state = () => ({
    city: {},
    cities: [],
    weather: {},
})

export const getters = {
    city: state => state.city,
    cities: state => state.cities,
    weather: state => state.weather,
}

export const mutations = {
    CITY(state, payload) {
        state.city = payload;
    },

    CITIES(state, payload) {
        state.cities = payload;
    },

    WEATHER(state, payload) {
        state.weather = payload;
    },
}

export const actions = {
    addCity({ commit }, city) {
        commit('CITY', city);
    },

    fetchCities({ commit }) {
        return axios.get('/api/cities')
            .then(response => commit('CITIES', response.data))
            .catch(error => console.error('city.fetchCities Error: ' + error))
    },

    fetchCityWeather({ commit }, city) {
        return axios.get(`/api/weather/${city.id}`)
            .then(response => commit('WEATHER', response.data.data))
            .catch(error => console.error('city.fetchCityWeather Error: ' + error));
    }
}
