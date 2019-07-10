/**
 * Created by Bapt on 10/7/2018.
 */
var apiUrl = $('#js-site-api').val();
var fileUrl = $('#js-file-location').val();
var zipUrl = $('#js-site-location').val();
var downloads = new Vue({
    el: '#downloads_page',
    created(){
        window.addEventListener("scroll", this.windowScrolled);
    },
    mounted(){
        this.getCountryProfileData();
        this.getReportData();
        this.getData();
    },
    data: {
        activeTab: 'report', //Possible values: report,data,country
        countryProfileData: [],
        data: [],
        reportData: [],
        itemsDisplayed: 8,
        checkedFiles: [],
        IsProfile:false
    },
    computed: {
        countriesItems(){
            return this.countryProfileData.slice(0, this.itemsDisplayed);
        }
    },
    methods: {
        getCountryProfileData(){
            var vm = this;
            axios.get(
                apiUrl + 'CounrtyProfile'
            ).then(function (response) {
                vm.countryProfileData = response.data.data;
                vm.IsProfile = response.data.IsProfile;
            }).catch(function (response) {
                alert('An error occurred!')
            })
        },
        getReportData(){
            var vm = this;
            axios.post(apiUrl + 'report',
                {
                    lang: $('#lang').val(),
                    section: 'Reports',
                }
            ).then(function (response) {
                vm.reportData = response.data;
               
            }).catch(function (response) {
                alert('An error occurred!')
            })
        },
        getData(){
            var vm = this;
            axios.post(apiUrl + 'report',
                {
                    lang: $('#lang').val(),
                    section: 'Data',
                }
            ).then(function (response) {
                vm.data = response.data;
              
            }).catch(function (response) {
                alert('An error occurred!')
            })

        },
        previewPdf(canvasId, filename){
            var url = fileUrl + '/Report/2018/AGO.pdf';

            // Asynchronous download of PDF
            PDFJS.getDocument(url).promise.then(function (pdf) {
                console.log('PDF loaded');

                // Fetch the first page
                var pageNumber = 1;
                pdf.getPage(pageNumber).then(function (page) {
                    console.log('Page loaded');

                    var scale = 1.5;
                    var viewport = page.getViewport(scale);

                    // Prepare canvas using PDF page dimensions
                    var canvas = document.getElementById('file-preview-1');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render PDF page into canvas context
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);
                    renderTask.then(function () {
                        console.log('Page rendered');
                    });
                });
            }, function (reason) {
                // PDF loading error
                console.error(reason);
            });
        },
        windowScrolled(){
            if (this.itemsDisplayed < this.countryProfileData.length) {
                this.itemsDisplayed += 4;
            }
        },
        downloadFile(countryCode){
            alert(countryCode)
        },
        downloadAllFiles(){
            //Use the  this.checkedFiles array to know which files to download
            var vm = this;
           /* var formData = new FormData();
            vm.checkedFiles.forEach(function (item) {
                formData.append('country', item);
            })*/

            if (vm.checkedFiles.length > 0) {
                axios.post(
                    apiUrl + 'downloadProfiledata',
                    {country: vm.checkedFiles}
                ).then(function (response) {
                    window.location.replace(zipUrl+"zip/"+response.data.filename);
                    console.log(response.data);
                }).catch(function (response) {
                    console.log(response.data);
                })

            } else {
                axios.post(
                    apiUrl + 'downloadAllProfile'
                ).then(function (response) {
                    window.location.replace(zipUrl+"zip/"+response.data.filename);
                    console.log(response.data);
                }).catch(function (response) {
                    console.log(response.data);
                })
            }
        },
        toggleFileChecking(countryCode){//Use this function when a user clicks on check button

            var position = -1;
            this.checkedFiles.forEach(function (item, index) {
                if (item == countryCode) {
                    position = index;
                }
            })
            if (position == -1) {
                this.checkedFiles.push(countryCode); //Add it. It is checked.
            } else {
                this.checkedFiles.splice(position, 1);//Delete it. It is unchecked
            }
        }
    }
})
