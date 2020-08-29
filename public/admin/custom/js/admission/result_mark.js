

           /*            input mark        */

$(document).on('keyup','table.com_table .input-mark', function(){
     _this = $(this);
     var _closest = _this.closest('tr');
    var sum = 0;
    _closest.find(".input-mark").each(function(){
        this_mark = parseFloat(+$(this).val());
        if(isNaN(this_mark) || this_mark == '') {
            this_mark = 0;
        }
        sub_mark = parseFloat($(this).attr('subject_mark'));
        if (sub_mark < this_mark) {
            this_mark = 0;
            $(this).val('0');
        }
        sum += this_mark;
    });
    _closest.find(".total-mark").val(sum);
});


 /*           edit input mark        */

$(document).on('keyup','table.edit_com_table .input-mark', function(){
     _this = $(this);
     var _closest = _this.closest('tr');
    var sum = 0;
    $(".input-mark").each(function(){
        this_mark = parseFloat(+$(this).val());
        if(isNaN(this_mark) || this_mark == '') {
            this_mark = 0;
        }
        sub_mark = parseFloat($(this).attr('subject_mark'));
        if (sub_mark < this_mark) {
            this_mark = 0;
            $(this).val('0');
        }
        sum += this_mark;
    });
    $(".total-mark").val(sum);
});


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
               // console.log("response"+response);
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