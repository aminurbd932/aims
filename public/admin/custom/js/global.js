//$(".nform-horizontal").validator();
$(document).find('.nform-horizontal').validator();

 $("#multi_select").select2();
 //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    $('#datepicker1').datepicker({
      autoclose: true
    });
    $('.timepicker').mdtimepicker();

// bangla language
// $(".bn").bnKb({
//     //{"webkit":"k", "mozilla":"y", "safari":"k", "chrome":"m", "msie":"y"},
//     'switchkey': {"mozilla": "m", "chrome": "m"},
//     'driver': phonetic
// });

/*      message           */

function showMessages(message, type) {
	//console.log("Message ="+message);
    $("#messages").show();
    $("#messages>div").addClass("alert-" + type);
    $("#text").html(message);
};


function getSwalTitle()
{
    var swalTitle = 
        {
            title: 'Are your confirm?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!',
            cancelButtonText: 'No!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }
    return swalTitle;
}

function showAlertMessage(title = '', text = '', icon = '') {
    swal({
        title,
        text,
        timer: 3000,
        icon
    });
}

function swalCancelConfirm(dismiss)
{
    if (dismiss === 'cancel') {
        showAlertMessage('Canceled', 'This app is safe :)', 'error');               
        }
}

// swal(
//         'Title',
//         'Text',
//         'sucess'
//     );


function modalShow(title, footer)
{
    $('#commonModalBody').html('<div class="loader"></div>');
    $('#commonModalTitle').html('<b>'+title+'</b>');
    $('#commonModalFooter').html(''+footer+'');
    $('#commonModal').modal('show');
}



//Searching
function searchList(targetUrl, formObj, destinationObj) {
    //var inputData = formObj.serializeArray();
    var inputData = formObj.serialize();
  // console.log(inputData);

    if (typeof targetUrl === 'undefined') {
        targetUrl = window.location.href;
    }
    console.log("Input Data: "+ inputData);
    $.get(targetUrl,inputData,function(response){
        console.log(response);
    	destinationObj.html(response);
    }).always(function(){
    	formObj.find('.loader-only').remove();
    }).fail(function(){
    	//showErrorModal();
    })
}

$(document).ready(function () {

    $(document).on('click','ul.pagination>li>a, #search',function(e){
    	if ($('#search_result').length) {
        	e.preventDefault();
    	}

        var $self = $(this),
            $form = $self.closest('form'),
            destinationObj = $self.closest('.list-container'),
            link = $self.attr('id') == 'search' ? $form.attr('action') : $self.attr('href'),
            //page = $self.attr('href') ? $self.attr('href').split('page=')[1] : 1,
           // url = link + '?page=' + page;

           //console.log("page="+page);

            url = link;

        if (url === '#') {
            return;
        }

        if (destinationObj.length == 0) {
            destinationObj = $('#search_result');
        }

        $form.append('<div class="loader-only"></div>');
        //console.log("DEGI"+destinationObj+"link="+url+"form"+$form);
        console.log('link='+link);

        searchList(url, $form, destinationObj);
    });

});

//Timepicker
    // $('.timepicker').timepicker({
    //   showInputs: false
    // });



    $(document).on('keypress keyup change','.decimal',function (event) {
    if(isDecimal(event, this)==true)
    {
        if($.isNumeric($(this).val())){
            return true;
        }else{
            $(this).val('');
        }
    }else{
        return false;
    }
    
});

function isDecimal(evt, element) {

    var charCode = (evt.which) ? evt.which : event.keyCode

    if (
        //(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
        (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
        (charCode < 48 || charCode > 57))
        return false;
        

    return true;
}
          /* @ for selecting a input on focus*/
$(document).on('focusin','.on-focus-selected',function(){$(this).select();});


/*
    Check All Feature
*/
$(document).on('click',".check-all",function(){
    _closest = $(this).closest('table');
    if(!$(this).is(':checked')){
       _closest.find('tbody td input[type=checkbox]').prop('checked', false);
    } else {
        _closest.find('tbody td input[type=checkbox]').prop('checked', true);
    }
});

/*        all remove   */
$(document).on('click',".all-remove-btn",function(){
    var _closest = $('table tbody tr');
    var _checked = _closest.has('input[type=checkbox]:checked');
    _checked.fadeOut(1000, function () {
        $(this).remove();
    });
});


/*           delete           */


$(document).on('click','.data-delete-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    swal(getSwalTitle()).then(function () {
        //console.log('yes');
        $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    showAlertMessage('Success...', response.message, 'success');
                    _closest.fadeOut(1000, function () {
                        $(this).remove();
                    });
                }
                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
    }, function (dismiss) {

        swalCancelConfirm(dismiss);
    });
});

/*        inactive          */
$(document).on('click', '.data-inactive-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    var path = _this.attr('data-href');

    $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    showAlertMessage('Success...', response.message, 'success');
                    _closest.find('span.status').html('<button class="btn btn-danger btn-xs data-active-btn" data-href="'+path+'" type="button"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>');
                    _closest.find('div.status_label').html('<span class="label label-warning">Inactive</span>');
                }

                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
});

        /*             active          */
$(document).on('click', '.data-active-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    var path = _this.attr('data-href');

    $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    showAlertMessage('Success...', response.message, 'success');
                    _closest.find('span.status').html('<button class="btn btn-success btn-xs data-inactive-btn" data-href="'+path+'" type="button"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>');
                    _closest.find('div.status_label').html('<span class="label label-success">Active</span>');
                }

                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
});

/*               view                   */
$(document).on('click','.data-view-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    var title = _this.attr('title');
    
    modalShow(title, "");
    $.post( targetUrl, sendData).done( function( resp ) { 
    //console.log("resp="+resp);
            $('#commonModalBody').html(resp);
    }); 
});