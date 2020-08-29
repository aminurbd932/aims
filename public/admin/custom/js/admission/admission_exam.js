

/*               add remove subject          */
$(document).on('click','.add', function(e){
    $(this).parents('tr').clone(true).insertAfter('.subject_table tbody>tr:last');
    $(this).parents('tr').find('.remove').prop("disabled", false);
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
