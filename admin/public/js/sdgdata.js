$(document).ready(function () {
    var site_location = $('#js-site-location').attr('value');
    var file_location = $('#js-file-location').attr('value');
    var admin_file_location = $('#js-ad-file-location').attr('value');

// this function for dialog
    function Confirmation(message, callback) {
        if ($('#modalConfirmation_MyTools') != undefined) $('#modalConfirmation_MyTools').remove();
        $('body').append('<div class="modal dialog-modal" id="modalConfirmation_MyTools">\
            <div class="fadeInDown confirmation-win modal-dialog modal-sm">\
            <div class="modal-content">\
                <div class="modal-header">\
                    <h5><span style="color:#f49e42;" class="fa fa-exclamation-circle"></span> <span id="spanMessage_MyTools">&nbsp;&nbsp;</span></h5>\
                </div>\
                <div class="modal-footer">\
                    <button type="button" data-dismiss="modal" class="btn btn-success" id="btnConfirm_MyTools">Confirm</button>\
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>\
                </div>\
            </div>\
    </div>\
</div>');

        document.getElementById('spanMessage_MyTools').append(message);
        $('#modalConfirmation_MyTools').modal('toggle');
        var confirmBtn = document.getElementById('btnConfirm_MyTools');
        confirmBtn.onclick = function () {
            callback(true);
        }
    }

// end of function dialog

//show upload window function
    $('.sdgcard-btn').on('click', function (e) {
        e.preventDefault();
        $(".upload-overlay").show("slow");
        $("#uploadbox1").fadeTo("slow", 1);
        $('#uploadbox1').css({'display': 'block'}, 'slow');


    });
// end of finction


//start of function
    $('#sdgfileupload').fileupload({
        url: site_location + 'sdgdata/upload/'
    });
//end of function


//Start function
    $('.btn-process-file').on('click', function (e) {
        e.preventDefault();

        var url = site_location + 'sdgdata/ProcessAlldata/';


        Confirmation("Are You Sure You want to process this data?", function (response) {
            if (response) {

                $('.process-console').show(100);
                $('.console').html("Please wait...");
                $('.sdgloading-icon').addClass('spin');
                $('.sdgloading-icon').addClass('fa-cog');
                $('.sdgloading-icon').removeClass('fa-check-square');

                $.post(url, {id: 0}, function (o) {

                    var myObj = JSON.parse(o);
                    var status = myObj.status;
                    var sms = myObj.message;

                    if (status == "success") {
                        $('.console').html(sms);
                        $('.sdgloading-icon').removeClass('spin');
                        $('.sdgloading-icon').removeClass('fa-cog');
                        $('.sdgloading-icon').addClass('fa-check-square');
                    }
                    else {
                        $('.sdgloading-icon').removeClass('spin');
                        $('.sdgloading-icon').removeClass('fa-cog');
                        $('.console').html(sms);
                    }

                    setTimeout(function () {
                        $('.process-console').hide(500);
                    },2000)


                });
            }

        });

    });

// End of function


//Start of function
    $('.sdgcard-preview-btn').on('click', function (e) {
        e.preventDefault();
        var url = site_location + 'sdgdata/getsdgfileData/';
        var file = $(this).data('file');
        $('body').css('overflow', 'hidden');
        $('.sdg-file-name').html(file);

        $.ajax({
            type: 'post',
            url: url,
            data: {file: file},
            beforeSend: function () {
                $('.loading-overlay').show();
            },

            success: function (o) {
                $('.loading-overlay').hide();
                $('.excel-preview').show(500);
                var data = JSON.parse(o);
                $('#demo1').jexcel({
                    data: data
                });
            }

        });
    });
// End of function


//Start of function 
    $('.sdg-excel-close-widget a').on('click', function (e) {
        e.preventDefault();
        $('body').css('overflow', 'auto');
        $('.excel-preview').hide(500);
        $('#demo1').html('');
    });
//End of function

// Start of function
    $('.year-widget').on('change', function (e) {
        var year = $(this).val();
        var url = site_location + 'sdgdata/year/' + year + '/';
        window.location.href = url;

    });
// End of function
    // Start of function
    $('.lang-widget').on('change', function (e) {
        var lang = $(this).val();
        var url = site_location + 'sdgdata/lang/' + lang + '/';
        window.location.href = url;

    });
// End of function


});