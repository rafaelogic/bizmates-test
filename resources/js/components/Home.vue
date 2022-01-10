<template>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase">Welcome to</h2>
                <p class="mt-1 font-extrabold text-red-600 sm:tracking-tight text-8xl">Japan</p>
            </div>

            <div class="flex justify-center">
                <div class="mt-10 w-full max-w-xs">
                    <label for="city" class="block text-base font-medium text-gray-600">Please select a city you wanted to visit.</label>
                    <div class="mt-1.5 relative">
                        <select v-model="selectedCity" @change="getSelectedCityWeather()" class="appearance-none block w-full bg-none bg-blue-800 border border-transparent rounded-md pl-3 pr-10 py-2 text-base text-white focus:outline-none focus:ring-1 focus:ring-white focus:border-white sm:text-sm">
                            <option v-for="city in cities" :value="{id: city.id, name: city.name}" :key="city.id+city.name">{{ city.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="md:w-128 max-w-lg rounded-lg overflow-hidden shadow-lg mt-8">
                    <div class="p-6 bg-gray-100">
                        <div class="font-semibold text-xl text-gray-600">Weather in {{ selectedCity.name }}</div>
                    </div>
                    <div class="flex items-center justify-between px-2 py-4">
                        <div class="flex flex-col md:flex-row items-center">
                            <div>
                                <div class="text-6xl font-semibold text-blue-900">{{ currentWeather.temp }}°C</div>
                                <div class="font-light text-center">{{ currentWeather.description }}</div>
                            </div>
                        </div>
                        <div>
                            <img :src="`http://openweathermap.org/img/wn/${currentWeather.icon}@4x.png`">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'home',

        data() {
            return {
                selectedCity: {
                    id: 1,
                    name: 'Kyoto'
                },
                currentWeather: {},
            }
        },

        mounted() {
            this.$store.dispatch('city/fetchCities');
            this.getSelectedCityWeather();
        },

        computed: {
            ...mapGetters({
                cities: 'city/cities',
                weather: 'city/weather',
            }),
        },

        methods: {
            getSelectedCityWeather() {
                this.$store.dispatch('city/fetchCityWeather', this.selectedCity);
                this.currentWeather = this.weather.shift();
            }
        }
    }
</script>
