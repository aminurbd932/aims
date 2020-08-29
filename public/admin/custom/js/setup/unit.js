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

    var segments = targetUrl.split( '/' );
    var id = segments[7];

    $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    showAlertMessage('Success...', response.message, 'success');
                    _closest.find('span.status').html('<button class="btn btn-danger btn-xs data-active-btn" data-href="/admin/active-user/'+id+'" type="button"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>');
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


/*        active          */
$(document).on('click', '.data-active-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};

    $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                if (response.success == true) {
                    showAlertMessage('Success...', response.message, 'success');
                    _closest.find('span.status').html('<button class="btn btn-success btn-xs data-inactive-btn" data-href="/admin/inactive-user/1" type="button"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>');
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


/*             add              */

$(document).on('click','.add-view-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    
    modalShow("Unit Add", "");
    $.get( targetUrl, sendData).done( function( resp ) { 
    //console.log("resp="+resp);
            $('#commonModalBody').html(resp);
    }); 
});


$('form.index_form').validator().on('submit', function(e){
    if (!e.isDefaultPrevented()) {
        e.preventDefault();
        $this = $(this);
        var targetUrl = $this.attr('action');
        var sendData = $this.serialize();
        //console.log("Send Data: "+targetUrl);
        //console.log(sendData);return;

        $.post( targetUrl, sendData, function( resp ) { 
            console.log("resp="+resp);
            if (resp.ajax_success == true) {
                showMessages(resp.message, 'success');
            } else {
                showMessages(resp.message, 'warning');
            }
            $('#commonModal').modal('hide');
       // $('#commonModalBody').html(resp);
         },'json')
            .fail(function(xhr, status, error) {
            showMessages('Unknown Error!!!', 'danger');
    });
    }
});
