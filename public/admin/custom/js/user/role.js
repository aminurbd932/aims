$(document).on('click','.data-delete-btn', function(e){
	e.preventDefault();
	_this = $(this);
	var _closest = _this.closest('tr');
	var targetUrl = base_url+"/admin"+_this.attr('data-href');
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
