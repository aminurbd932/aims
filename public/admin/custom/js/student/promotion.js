

/*                 promotin  type change      */
$(document).on('change','#promotion_type', function(){
	var promotion_type = $(this).val();
	if (promotion_type == 1) {
		$('.admission_offer_id_pp').show();
		$('.program_offer_id_pp').hide();
		$('#admission_offer_id').prop('required', true);
		$('#program_offer_id').prop('required', false);
	} else {
		$('.admission_offer_id_pp').hide();
		$('.program_offer_id_pp').show();
		$('#admission_offer_id').prop('required', false);
		$('#program_offer_id').prop('required', true);
	}
});

                /*         search offer           */

$('form.search_offer_form').validator().on('submit', function(e){
    if (!e.isDefaultPrevented()) {
        e.preventDefault();
        $("input[type = 'submit']").prop('disabled', true);
        var sendData = $(this).serialize();
        var targetUrl = $(this).attr('action');
        $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                console.log("response"+response);
                if (response.success == 2) {
                    showAlertMessage('Success...', response.message, 'success');
                }

                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
                $('.list-container').html(response);
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
    }
});

/*                 promotin  type change      */
$(document).on('change','#promotion_type', function(){
	var promotion_type = $(this).val();
	if (promotion_type == 1) {
		$('.admission_offer_id_pp').show();
		$('.program_offer_id_pp').hide();
		$('#admission_offer_id').prop('required', true);
		$('#program_offer_id').prop('required', false);
	} else {
		$('.admission_offer_id_pp').hide();
		$('.program_offer_id_pp').show();
		$('#admission_offer_id').prop('required', false);
		$('#program_offer_id').prop('required', true);
	}
});
         /*          get subject offer list         */
$(document).on('change','.program_offer_id', function(e){

    var targetUrl = base_url+'/admin/get_subject_offer_list';
    var _token = $("input[name='_token']").val();
    var program_offer_id = $(this).val();
    var sendData = {_token:_token,program_offer_id:program_offer_id};
    $.ajax({
            url: targetUrl,
            type: "POST",
            data: sendData,
             dataType: 'json',
            success: function (response) {
                console.log("response"+response);
                if (response.success == 2) {
                    showAlertMessage('Success...', response.message, 'success');
                }

                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
                $('.subject-list-container').html(response);
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
});


                        /*        promotion submit        */

    // $(document).on('click', '.promotion-save-btn', function(e){
    //     e.preventDefault();
    // })