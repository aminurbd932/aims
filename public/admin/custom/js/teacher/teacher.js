

/*               add remove subject          */
$(document).on('click','.add', function(e){
    $(this).parents('tr').clone(true).insertAfter('.subject_table tbody>tr:last');
   // $(this).parents('tr').find('.remove').prop("disabled", false);
        return false;
});

$(document).on('click', '.remove', function () {
        $(this).parents('tr').fadeOut('slow', function () {
            $(this).remove();
        });

        return false;
    });

/*   check     */

$(document).on('change', '.admission_subject_id', function(){
    _this = $(this);
    var _closest = _this.closest('tr');
    var id = parseInt($(this).val());
    if(checkDuplicate(id) == 1){
            showAlertMessage('Unsuccess...', "Already Exist..", 'warning');
            $(this,).val('');
            _closest.find('.check').val('');
            return false;
        }
    _closest.find('.check').val(id);
});

function checkDuplicate(id){
    var exist=0;
    $('table.subject_table').find('.check').each(function(){
        if(parseInt($(this).val()) == id){
            exist=1;
            return false;
        }
    });
    return exist;
}

/*           same present address        */

$(document).on('click', '.same_permanent_address', function(){
    var post_code = $('#present_post_code').val();
    var address = $('#present_address').val();
    var thana_id = $('#present_thana_id').val();
    if ($(this).is(':checked')) {
        $('#permanent_post_code').val(post_code);
        $('#permanent_address').val(address);
        $('#permanent_thana_id').val(thana_id);
    } else {
        $('#permanent_post_code').val('');
        $('#permanent_address').val('');
        $('#permanent_thana_id').val('');
    }
});
