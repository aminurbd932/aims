

/*        get subject offer list    */

$(document).on('change','#program_offer_id', function(e){

    var targetUrl = base_url+'/admin/getSubjectOfferListByProgramOfferId';
    var _token = $("input[name='_token']").val();
    var program_offer_id = $(this).val();
    var sendData = {_token:_token,program_offer_id:program_offer_id};
    $.get( targetUrl, sendData).done( function( resp ) { 
    console.log("resp="+resp);
            $('select[name="subject_offer_id[]"]').html(resp);
    }); 
});