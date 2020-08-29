
                /*         search subject offer           */

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
                //console.log("response"+response);
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



/*        mark distribute */
$(document).on('keyup','.mark, .percent', function(){
    _this = $(this);
    var _closest = _this.closest('tr');
    calculate(_closest);

    //console.log('orginal_mark='+orginal_mark+"percent_mark="+percent_mark);
});

function calculate(_closest) {
    var orginal_mark = parseFloat(_closest.find('input[name="orginal_mark[]"]').val());
    var percent_mark = parseFloat(_closest.find('input[name="percent_mark[]"]').val());

    var cal = parseFloat(getCalMark(orginal_mark, percent_mark)).toFixed(2);
        if (!cal || cal == 0) {
            var cal = '';
        }
     _closest.find('input[name="divided_mark[]"]').val(Math.round(cal));
     total();
}

function getCalMark(mark = 0, percent = 0)
    {
        if (isNaN(mark)) {
            var mark = 0;
        }
        if (isNaN(percent)) {
            var percent = 0;
        }

        var cal = ((mark * percent) / 100);
        return cal;
    }

    function total()
    {
        var total_mark = parseFloat($('input[name="subject_mark"]').val());
        if (isNaN(total_mark)) {
            var total_mark = 0;
        }
        var sum_mark = 0;
        $('tr').find('input[name="divided_mark[]"]').each(function () {
           var or = parseFloat($(this).val());
            if (!isNaN(or) && or.length !== 0) {
             sum_mark += parseFloat(or);
         }
        });
        console.log('total_mark'+total_mark+'sum'+sum_mark);
        if (total_mark < sum_mark) {
           alert("Full Mark Overload!!");
           sum_mark = 0;
        }
        $('.total').text(sum_mark);
    }

    /*    check enable */

$(document).on('click','input[name="check[]"]', function(){
    _this = $(this);
    var _closest = _this.closest('tr');
    if(!$(_this).is(':checked')){
        $(_closest).find('.mark, .percent').attr('readonly', true);
        $(_closest).find('.mark, .percent').attr('required', false);
        $(_closest).find('.divided_mark').val('');
    } else {
       $(_closest).find('.mark, .percent').attr('readonly', false);
       $(_closest).find('.mark, .percent').attr('required', true);
       $(_closest).find('.divided_mark').val('');
       calculate(_closest);
    }
    total();
});