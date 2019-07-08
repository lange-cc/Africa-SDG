/*
 Created by: Abe jahwin
 Saved : plugin folder
 Vesion : 1.0
*/

var app = new Vue({
    el: '.data-table-widget',
    data() {
        return {
            countries:null,
            emptydata:null,
            nextyear:null,
            nextyeardata:null,
            year:null
        }
    },
    mounted() {
          this.getSdgData();
    },
    methods: {
        getSdgData:function () {
            var url = $('#js-site-api').val()+'sdgindex';
            var functions = this;
            axios.get(url).then(response => {
                this.countries    = response.data[0].country;
                this.emptydata    = response.data[0].countrywithNodata;
                this.nextyear     = response.data[0].nextyear;
                this.nextyeardata = response.data[0].nextyeardata;
                this.year         = response.data[0].year;

                setTimeout(function () {
                   // functions.loadDataTable();
                },200)

              // console.log(this.emptydata);
            });
        },
        loadDataTable:function () {
            var dataTable = $('#index-data').DataTable({
                    paging: false,
                    searching: true,
                    "info":     false,
                    "order": [[ 2, null ]]
                }
            )
            $('.index-search-input').keyup(function () {
                dataTable.search($(this).val()).draw();
            });
            return dataTable;
        },
        getProfile:function (code) {
            console.log(Profile);
            Profile.getProfile(code);
        }
    }


});
