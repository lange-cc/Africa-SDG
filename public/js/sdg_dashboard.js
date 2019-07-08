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
            legend:false,
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
            let vm = this;
            axios.get(
                dashboardUrl + 'dashboard'
            ).then(function (response) {
                vm.countries = response.data;
            }).catch(function (response) {

            })
        },
        getProfile(code) {
            Profile.getProfile(code);
        },
        showLegend:function (tooge) {
                this.legend = tooge;
        },
        getIndicator: function (sdg,code) {
            Profile.getIndicator(sdg, code);
        }
        
    }
})