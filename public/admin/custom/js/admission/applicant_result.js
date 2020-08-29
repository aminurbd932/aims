
                /*         search admission offer           */

$('form.search_form').validator().on('submit', function(e){
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
                $('.list-container').html(response);

                if (response.success == false) {
                    showAlertMessage('Unsuccess...', response.message, 'warning');
                }
          }, error: function (jqXHR) {
            showAlertMessage('Error...', jqXHR, 'error');
          }
      });
    }
});