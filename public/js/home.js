$(document).ready(function () {
    // selecting miltiple country
    $('#ma, #eh').hover(function () {
        $('#ma, #eh').css({'fill': '#a31c43'})
    });
    $('#ma, #eh').on('mouseleave', function () {
        $('#ma, #eh').css({'fill': 'rgb(249, 219, 142)'})
    });


    // Get mouse position and show tooltip on every country
    var currentMousePos = {x: -1, y: -1};
    $('body #g22346 path').mousemove(function (event) {
        var name = $(this).data('country');
        currentMousePos.x = event.pageX;
        currentMousePos.y = event.pageY;
        $('.map-tooltip').html(name);

        var attr = $(this).attr('data-country');
        if (typeof attr !== typeof undefined && attr !== false) {
            $('.map-tooltip').show(50);
        }
        else {
            $('.map-tooltip').hide(50);
        }
        $('.map-tooltip').css({'left': (currentMousePos.x - 500) + 'px', 'top': (currentMousePos.y - 155) + 'px'});
    });
    // Hide tooltips
    $('#g22346').mouseleave(function (event) {
        $('.map-tooltip').hide(50);
    });

});

var Home = new Vue({
    el: '.annauncement',
    data: {
        slideText: null,
        Timeout: 4000,
        search: false,
    },
    mounted() {
        this.getSlideData();
    },
    methods: {
        getSlideData: function () {
            var url = $('#js-site-api').val() + 'information';
            axios.post(url, {id: 29, lang: 'en'}).then(result => {
                var length = result.data.length - 1;
                var data = result.data;
                if (result.data.length >= 1) {
                    this.Slidecontent(data, length, 1);
                }
                //console.log(result.data);
            });
        },
        Slidecontent: function (data, length, index) {
            if (index == length) {
                this.slideText = '<span class="fadeInUp">' + data[index].content + '</span>';
                this.nextSlide(data, length, 0);
            }
            else {
                this.slideText = '<span class="fadeInUp">' + data[index].content + '</span>';
                this.nextSlide(data, length, (index + 1));
            }

        },
        nextSlide: function (data, length, index) {
            setTimeout(() => {
                this.Slidecontent(data, length, index);
            }, this.Timeout);
        }
    }

});

var Search = new Vue({
    el: '.map-guide',
    data: {
        search: false,
        searchingText: null,
        searchdata: null,
        offset: 170,
        loading:false,
    },
    mounted() {

    },
    methods: {
        SearchCountry: function () {
             if (this.searchingText != '') {
                    this.search = true;
                    this.loading = true;
                }
                 else {
                    this.search = false;
                }
            var url = $('#js-site-api').val() + 'search';
            axios.post(url, {text: this.searchingText}).then(result => {
                if (this.searchingText != '') {
                    this.searchdata = result.data;
                    this.loading = false;
                } else {
                    this.search = false;
                }
            });
        },
        getProfile: function (code) {
            Profile.getProfile(code);
        },
        scoll: function (el) {
            this.smoothScroll(el);
        },
        currentYPosition: function () {
            // Firefox, Chrome, Opera, Safari
            if (self.pageYOffset) return self.pageYOffset;
            // Internet Explorer 6 - standards mode
            if (document.documentElement && document.documentElement.scrollTop)
                return document.documentElement.scrollTop;
            // Internet Explorer 6, 7 and 8
            if (document.body.scrollTop) return document.body.scrollTop;
            return 0;
        },
        elmYPosition: function (eID) {
            var elm = document.getElementById(eID);
            var y = elm.offsetTop;
            var node = elm;
            while (node.offsetParent && node.offsetParent != document.body) {
                node = node.offsetParent;
                y += node.offsetTop;
            }
            return y;
        },
        smoothScroll: function (eID) {
            var startY = this.currentYPosition();
            //console.log(startY);
            var stopY = this.elmYPosition(eID) - this.offset;
            var distance = stopY > startY ? stopY - startY : startY - stopY;
            if (distance < 100) {
                scrollTo(0, stopY);
                return;
            }
            var speed = Math.round(distance / 100);
            if (speed >= 20) speed = 20;
            var step = Math.round(distance / 25);
            var leapY = stopY > startY ? startY + step : startY - step;

            var timer = 0;
            if (stopY > startY) {
                for (var i = startY; i < stopY; i += step) {
                    setTimeout("window.scrollTo(0, " + leapY + ")", timer * speed);
                    leapY += step;
                    if (leapY > stopY) leapY = stopY;
                    timer++;
                }
                return;
            }
            for (var i = startY; i > stopY; i -= step) {
                setTimeout("window.scrollTo(0, " + leapY + ")", timer * speed);
                leapY -= step;
                if (leapY < stopY) leapY = stopY;
                timer++;
            }
        },
        Switch() {
            this.search = false;
            this.searchingText = '';
            $('body #g22346 path').css({'fill': 'rgb(249, 219, 142)'});
        },
        ShowOnMap(code,el) {
            if(el) {
                $("[data-code=" + code + "]").css({'fill': '#a31c43'});
            }
            else
            {
                $("[data-code=" + code + "]").css({'fill': 'rgb(249, 219, 142)'});
            }
        }
    }

});





