/*
 Created by: Abe jahwin
 Saved : plugin folder
 Vesion : 1.0
*/
var loading = new Vue({
    el: '#loading-widget',
    data: {
        loadingWindow: false,
    },
    mounted() {
        this.hideloading()
    },
    methods: {
        showloading() {
            $('.loading-widget').css('display','flex');
            this.loadingWindow = true;
        },
        hideloading() {
            $('.loading-widget').css('display','none');
            this.loadingWindow = false;
        }
    }
});

var menu = new Vue({
    el: '#menu',
    data() {
        return {
            menus: null
        }
    },
    mounted() {
        if (localStorage.getItem('menu') != 'undefined') {
            this.menus = JSON.parse(localStorage.getItem('menu'));
        }
        this.itemsEvent();
        var url = $('#menu').data('link');
        axios.get(url).then(response => {
            this.menus = response.data.items;
            this.set_data(JSON.stringify(response.data.items));
        });

    },
    methods: {
        itemsEvent: function () {
            // Close popup when user click on overlay
            $('.overlay').on('click', function (e) {
                $(this).hide();
                $('.pop-up').hide();
                $('body').css({'overflow-y': 'auto'});
            });
        },
        set_data: function (value) {
            localStorage.setItem('menu', value);
        }
    },
    watch: {}

});


var language = new Vue({
    el: '.language-list',
    data() {
        return {
            menus: null
        }
    },
    mounted() {

    },
    methods: {
        selectLang: function (lang) {
            var url = $('#js-site-location').val() + 'home/changeLang';
            axios.post(url, {lang: lang}).then(result => {
                var data = result.data;
                if (data.status == 'success') {
                    window.location.reload();
                }
                else {
                    alert('Failed to load language');
                }

            });
        }
    }

});


$(document).ready(function () {
// Closing popups
    $('.btn-close').on('click', function (e) {
        var el = $(this).data('close');
        $(el).hide();
        $('body').css({'overflow-y': 'auto'});
    });

    setTimeout(function(){
        $('.pre-loader').hide();
    }, 2000);

});

var YearApp = new Vue({
    el: '.year-widget',
    data: {
        year_window:false,
        years:null
    },
    mounted() {
      this.GetYear();
    },
    methods: {
        GetYear: function () {
            var url = $('#js-site-api').val() + 'getYears';
            axios.post(url).then(result => {
                YearApp.years = result.data;
            });
        },
        SelectYear(year){
            var url = $('#js-site-api').val() + 'SelectYear';
            axios.post(url,{year:year}).then(result => {
                if(result.data.status == 'success'){
                        window.location.reload();
                }
            });
     }

    }

});


