var indicator  = new Vue({
    el:'.indicator-window',
    data:{
        indicator_window:false,
        indic_cou_name: null,
        indic_cou_code: null,
        indic_sdg_name: null,
        indic_sdg_n: null,
        indic_sdg_color: null,
        indic_data: null,
    },
    mounted() {
    },
    methods: {
        getIndicator: function (sdg, code) {
            this.indicator_window = false;
            loading.showloading();
            var fan = this;
            var indic_url = $('#js-site-api').val() + 'indicators';
            axios.post(indic_url, {code: code, sdg: sdg}).then(result => {
                this.indic_cou_name = result.data.country_name;
                this.indic_cou_code = code;
                this.indic_sdg_name = result.data.sdgname;
                this.indic_sdg_n = result.data.sdg_n;
                this.indic_sdg_color = result.data.sdgColor;
                this.indic_data = result.data.indicators;

                this.showIndic();
            });
        },
        showIndic: function () {
            loading.hideloading();
            $('.indicator-window').css('display','flex');
            this.indicator_window = true;
        },
        closeModa() {
            $('.indicator-window').css('display','none');
            this.indicator_window = false;
        }
    }
});


var Trendindicator  = new Vue({
    el:'.Trend-indicator-window',
    data:{
        trend_indicator_window:false,
        indic_cou_name: null,
        indic_cou_code: null,
        indic_sdg_name: null,
        indic_sdg_n: null,
        indic_sdg_color: null,
        indic_data: null,
        trend_sdg_value:null
    },
    mounted() {
    },
    methods: {
        getIndicator: function (sdg, code) {
            this.indicator_window = false;
            loading.showloading();
            var fan = this;
            var indic_url = $('#js-site-api').val() + 'Trendsindicators';
            axios.post(indic_url, {code: code, sdg: sdg}).then(result => {
                this.indic_cou_name = result.data.country_name;
                this.indic_cou_code = code;
                this.indic_sdg_name = result.data.sdgname;
                this.indic_sdg_n = result.data.sdg_n;
                this.indic_sdg_color = result.data.sdgColor;
                this.trend_sdg_value = result.data.sdgTrendValue;
                this.indic_data = result.data.indicators;

                this.showIndic();
            });
        },
        showIndic: function () {
            loading.hideloading();
            $('.Trend-indicator-window').css('display','flex');
            this.trend_indicator_window = true;
        },
        closeModa() {
            $('.Trend-indicator-window').css('display','none');
            this.trend_indicator_window = false;
        }
    }
});
