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


$(document).on('click','.data-view-btn', function(e){
    e.preventDefault();
    _this = $(this);
    var _closest = _this.closest('tr');
    var targetUrl = base_url+_this.attr('data-href');
    var _token = $("input[name='_token']").val();
    var sendData = {_token:_token};
    
    modalShow("Company View", "");
    $.post( targetUrl, sendData).done( function( resp ) { 
    //console.log("resp="+resp);
            $('#commonModalBody').html(resp);
    }); 
});