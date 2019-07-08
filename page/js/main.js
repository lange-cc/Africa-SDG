$(document).ready(function(){ 

$('.nav-togger-btn').on('click', function () {
   $('.overlay').show(500);
    $('.phone-menu-widget').show(500);
})

$('.overlay').on('click', function () {
   $('.overlay').hide(500);
    $('.phone-menu-widget').hide(500);
})

$('.lang').on('click', function (e) {
e.preventDefault();
  //var url      = window.location.hostname; 
 // var path     =window.location.pathname 
  var lang     = $(this).data('lang');
  var realUrl  = lang;
window.location.href = realUrl;
});

$('.pre-loader').hide();

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