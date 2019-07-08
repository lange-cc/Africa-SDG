var dashboardUrl = $('#js-site-api').val();

var sdgDashboard = new Vue({
    el: '#sdg-dashboard',
    mounted() {
        this.getCountries();
    },
    data() {
        return {
            countries: [],
            activeTab: 'africa',//north,east,central,south,west
            legend: false,
        }
    },
    computed: {
        northCountries() {
            var countries = [];
            this.countries.forEach(function (country) {
                if (country.reg == 'North') {
                    countries.push(country);
                }
            })
            return countries;
        },
        eastCountries() {
            var countries = [];
            this.countries.forEach(function (country) {
                if (country.reg == 'East') {
                    countries.push(country);
                }
            })
            return countries;
        },
        centralCountries() {
            var countries = [];
            this.countries.forEach(function (country) {
                if (country.reg == 'Central') {
                    countries.push(country);
                }
            })
            return countries;
        },
        southCountries() {
            var countries = [];
            this.countries.forEach(function (country) {
                if (country.reg == 'Southern') {
                    countries.push(country);
                }
            })
            return countries;
        },
        westCountries() {
            var countries = [];
            this.countries.forEach(function (country) {
                if (country.reg == 'West') {
                    countries.push(country);
                }
            })
            return countries;
        }
    },
    methods: {
        getCountries() {
            var vm = this;
            axios.get(
                dashboardUrl + 'trendsdashboard'
            ).then(function (response) {
                vm.countries = response.data;
            }).catch(function (response) {
                alert('An error occurred!')
            })
        },
        getArrowClass(sdgValue) {
            if (sdgValue == "1.00") {
                return 'rotate-270';
            }
            else if (sdgValue == "2.00") {
                return 'flat';//flat
            }
            else if (sdgValue == "3.00") {
                return 'rotate-45';
            }
            else if (sdgValue == "4.00") {
                return 'rotate-90';//ontrack
            }
            else if (sdgValue == "5.00") {
                return 'maintaining';
            }
        },
        getProfile(code) {
            Profile.getProfile(code);
        },
        showLegend: function (tooge) {
            this.legend = tooge;
        },
        getTrendsIndicator: function (sdg, code) {
            Profile.getTrendsIndicator(sdg, code);
        }
    }
})