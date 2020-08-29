/*        get subject offer list    */

$(document).on('change','#class_level_id', function(){

    var targetUrl = base_url+'/admin/getProgramListByProgramLevelId';
    var _token = $("input[name='_token']").val();
    var class_level_id = $(this).val();
    var sendData = {_token:_token,class_level_id:class_level_id};
    $.get( targetUrl, sendData).done( function( resp ) { 
         $('#program_id').html(resp);
    }); 
});