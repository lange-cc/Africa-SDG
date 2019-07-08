/**
 * Created by Bapt on 10/7/2018.
 */
var apiUrl = $('#js-site-api').val();

var sdg = new Vue({
    el: '#sdgs_page',
    mounted() {
        this.getGoalsData();
    },
    data: {
        goalShown: 1,
        offset:100,
        goalsData: [],
    },
    methods: {
        showGoal(value) {
            this.goalShown = value;
            setTimeout(()=>{
                this.scoll('sdg_'+value);
            },200)
        },
        getGoalsData() {
            let vm = this;
            axios.post(
                apiUrl + 'information',
                {
                    id: 30,
                    lang: $('#lang').val(),
                }
            ).then(function (response) {
                vm.goalsData = response.data;
            }).catch(function (response) {
                alert("An error occurred!");
            })
        },
        scoll: function (el) {
            this.smoothScroll(el);
        },
        currentYPosition: function () {
            // Firefox, Chrome, Opera, Safari
            if (self.pageYOffset) return self.pageYOffset ;
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
            var stopY = this.elmYPosition(eID)-this.offset;
            var distance = stopY > startY ? stopY - startY : startY - stopY;
            if (distance < 100) {
                scrollTo(0, stopY);
                return;
            }
            var speed = Math.round(distance / 100);
            if (speed >= 20) speed = 20;
            var step = Math.round(distance / 25);
            var leapY = stopY > startY ? startY + step : startY - step ;

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
        }
        // ==========
    }
})