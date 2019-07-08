var url = $('#js-site-api').val() + 'profile';

Vue.component("stat-circle", {
    template: "#stat-circle",
    props: ["percentage"]
});
var Profile = new Vue({
    el: '.country-profile-modal',
    data() {
        return {
            country_name: null,
            country_region: null,
            country_code: null,
            country_rank: null,
            country_score: 0,
            country_av_score: 0,
            sdgdata: null,
            sdgtrenddata: null,
            status: false,
            profileLegend:false,
            legend:false,
            percentage: 0,
            chartStart: 'not-active',
            options: {
                legend: {
                    display: false,
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                layout: {
                    padding: {
                        left: 47,
                        right: 0,
                        top: 30,
                        bottom: 30
                    }
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function (tooltipItems, data) {
                            var bgcolor = data.datasets[tooltipItems.datasetIndex].backgroundColor[13];
                            var bgcolor2 = data.datasets[tooltipItems.datasetIndex].backgroundColor[9];
                            var value = tooltipItems.yLabel;
                            if (bgcolor == 'rgba(162,164, 166, 0.7)' && value == 100) {
                                return  'SDG' + (tooltipItems.index+1) + ':NA';
                            }
                            else if (bgcolor2 == 'rgba(162,164, 166, 0.7)' && value == 100) {
                                return  'SDG' + (tooltipItems.index+1) + ':NA';
                            }
                            else {
                                return 'SDG' + (tooltipItems.index+1) + ':' + tooltipItems.yLabel;
                            }

                        }
                    }
                }

            },
            chart: null,
        }
    },
    mounted() {
        this.panzoom();
        this.mapclick();
        this.windowresize();
    },
    computed: {
        bgColors17() {
            var bgColors = [];
            for (i = 0; i < 17; i++) {
                bgColors.push('rgba(171,214, 255, 0.7)');
            }
            return bgColors;
        },
        bdColors17() {
            var bgColors = [];
            for (i = 0; i < 17; i++) {
                bgColors.push('rgba(255,255, 255, 0.9)');
            }
            return bgColors;
        },

    },
    methods: {
        chartData() {
            return {
                labels: ["SDG1abe", "SDG2", "SDG3", "SDG4", "SDG5", "SDG6", "SDG7", "SDG8", "SDG9", "SDG10", "SDG11", "SDG12", "SDG13", "SDG14", "SDG15", "SDG16", "SDG17"],
                datasets: [{
                    label: '',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: this.bgColors17,
                    borderColor: this.bdColors17,
                    borderWidth: 1
                }]
            }
        },
        windowresize: function () {
            var fun = this;
            window.onresize = function (event) {
                fun.addLabels();
            };
        },
        addLabels: function () {
            var canvas = document.getElementById('sdg-chart-labels');
            var chart_canvas = document.getElementById('sdg-chart');

            var radius = 140, radians = 0;

            var ctx = canvas.getContext("2d");
            ctx.font = '12px -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"';
            ctx.fillStyle = "#ccc";
            ctx.textAlign = "center";

            var width = chart_canvas.clientWidth;
            var height = chart_canvas.clientHeight;

            ctx.canvas.width = width;
            ctx.canvas.height = height;

            if (window.devicePixelRatio) {

                ctx.canvas.width = width * window.devicePixelRatio;
                ctx.canvas.height = height * window.devicePixelRatio;

                canvas.style.width = width + "px";
                canvas.style.height = height + "px";

                ctx.scale(window.devicePixelRatio, window.devicePixelRatio);

            }

            var min = Math.min(width, height);

            radius = min / 2 - 4;

            for (var i = 0; i < 17; i++) {
                radians = Math.PI - Math.PI / 17 - 2 * Math.PI * i / 17;
                ctx.fillText("SDG" + (i + 1), Math.sin(radians) * radius + width / 2 - 6, Math.cos(radians) * radius + height / 2 + 4);

            }


        },
        loadChart: function (data) {

            var ctx = document.getElementById("sdg-chart");
            this.chart = new Chart(ctx, {
                type: 'polarArea',
                data: data,
                options: this.options,
            });


        },
        loadProgress: function () {
            var $statCircle = document.querySelectorAll(".stat-circle circle");
            for (var i = 0; i < $statCircle.length; i++) {
                var p = parseFloat($statCircle[i].dataset.percentage);
                var off = -51 - ((51 / 100) * p);
                new TweenMax.to($statCircle[i], .8, {
                    strokeDashoffset: off
                });
            }
        },
        panzoom: function () {
            if (jQuery.fn.panzoom) {
                return $(".map-preview").panzoom({
                    cursor: 'default',
                    increment: 0.5,
                    minScale: 1,
                    maxScale: 2.5,
                    rangeStep: 0.3,
                    transition: true,
                    duration: 200,
                    easing: "ease-in-out",
                    $zoomIn: $('.zoom-in'),
                    $zoomOut: $('.zoom-out'),
                    $zoomRange: $('.zoom-range'),

                });
            }
            else {
                return false;
            }
        },
        mapclick: function () {

            var fanctions = this;
            // Get event on made on map
            if (this.panzoom() != false) {
                this.panzoom().on('panzoomend', function (e, panzoom, matrix, changed) {
                    if (changed) {
                    } else {
                        if ($(e.originalEvent.target).attr('data-code')) {
                            var country_code = $(e.originalEvent.target).data('code');
                            fanctions.sendDataOnProfile(country_code);
                        }
                    }
                });
            }
        },
        loadPopUp: function () {
            this.legend = true;
            $('.country-profile-modal,.overlay').show();
            $('body').css({'overflow-y': 'hidden'});
        },
        getProfile: function (country_code) {
            this.sendDataOnProfile(country_code);
        },
        sendDataOnProfile: function (country_code) {
            loading.showloading();
            axios.post(url, {country: country_code}).then(result => {
                this.country_name = result.data.country_info[0].name;
                this.country_region = result.data.country_info[0].region;
                this.country_code = country_code;
                this.country_rank = result.data.country_info[0].rank;
                if (result.data.country_info[0].score == 0) {
                    this.country_score = 'NA';
                    $('#index-score .progress').css({'stroke-dashoffset': '-50.551'});
                }
                else {
                    this.country_score = result.data.country_info[0].score;
                }

                if (result.data.country_info[0].avarage_index_score == 0) {
                    this.country_av_score = 'NA';
                    $('#average-score .progress').css({'stroke-dashoffset': '-50.551'});
                }
                else {
                    this.country_av_score = result.data.country_info[0].avarage_index_score;
                }


                this.sdgdata = result.data.sdg;
                this.sdgtrenddata = result.data.trends;
                //console.log(this.sdgdata);

                this.loadPopUp();
                setTimeout(() => {
                    this.loadProgress();
                }, 200);
                var value = [];
                var bgcolor = [];

                if (this.sdgdata[0].value == 0 && this.sdgdata[1].value == 0 && this.sdgdata[2].value == 0 && this.sdgdata[3].value == 0 && this.sdgdata[3].value == 0 && this.sdgdata[4].value == 0 && this.sdgdata[6].value == 0 && this.sdgdata[7].value == 0 && this.sdgdata[8].value == 0 && this.sdgdata[9].value == 0 && this.sdgdata[10].value == 0 && this.sdgdata[11].value == 0 && this.sdgdata[12].value == 0 && this.sdgdata[13].value == 0 && this.sdgdata[14].value == 0 && this.sdgdata[15].value == 0 && this.sdgdata[16].value == 0) {
                    for (var i = 0; i <= 16; i++) {
                        value.push(100);
                        bgcolor.push('rgba(162,164, 166, 0.7)');
                    }
                }
                else {

                    for (let index = 0; index < this.sdgdata.length; ++index) {
                        if (index == 13 && this.sdgdata[index].value == 44.2 && this.sdgdata[index].color == 'gray') {
                            value.push(100);
                            bgcolor.push('rgba(162,164, 166, 0.7)');
                        }
                        else if (this.sdgdata[index].color == 'gray' && index == 9) {
                            value.push(100);
                            bgcolor.push('rgba(162,164, 166, 0.7)');
                        }
                        else {
                            value.push(this.sdgdata[index].value);
                            bgcolor.push('rgba(171,214, 255, 0.7)');
                        }
                    }
                }


                if (this.chartStart == 'not-active') {
                    this.loadChart(this.chartData());
                    this.chartStart = 'active';
                }

                this.chart.data.datasets[0].data = value;
                this.chart.data.datasets[0].backgroundColor = bgcolor;
                this.chart.update();
                this.addLabels();
                loading.hideloading();
            });
        },
        getIndicator(sdg, code) {
            indicator.getIndicator(sdg, code);
        },
        getTrendsIndicator(sdg, code) {
            Trendindicator.getIndicator(sdg, code);
        },
        closeModa(el) {
            $(el).hide();
        },
        showLegend: function (tooge) {
            this.profileLegend = tooge;
        }
    }
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










