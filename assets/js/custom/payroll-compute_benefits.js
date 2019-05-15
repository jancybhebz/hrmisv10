$(document).ready(function() {
	$('.loading-image').hide();
	$('#div-body').show();

    $('#frmsavebenefits').submit( function(ev) {
        // alert();
        // ev.preventDefault();
        $('#tblemployee-list tr').each(function (i, valtr) {
            // dtr_tr = [];
            json_tr = [{}];
            $(this).find('td').each(function (f, valtd) {
                td_text = $(this).text();
                td_text = td_text.replace(/(<([^>]+)>)/ig,"").replace(/(\r\n|\n|\r)/gm, "");
                // dtr_tr.push($.trim(td_text));
                json_tr.push({ 'td' : $.trim(td_text)});
            });
            json_alltr.push({ 'tr' : json_tr});
            // console.log(json_tr);
            // dtr.push('tr', [dtr_tr]);
        });
        console.log(JSON.stringify(json_alltr));
        // // dtr = ;
        // // jsondtr = {};
        // // jsondtr.val = JSON.stringify(dtr);
        // // console.log(jsondtr);
        $('#txtjson').val(JSON.stringify(json_alltr));
        $(this).unbind('submit').submit()
    });

    // var dtr = [];
    // var json_alltr = [{}];
    // $('a#btnsavecont').click(function(e) {
    //     // e.preventDefault();
    //     $('#tblemployee-list tr').each(function (i, valtr) {
    //         // dtr_tr = [];
    //         json_tr = [{}];
    //         $(this).find('td').each(function (f, valtd) {
    //             td_text = $(this).text();
    //             td_text = td_text.replace(/(<([^>]+)>)/ig,"").replace(/(\r\n|\n|\r)/gm, "");
    //             // dtr_tr.push($.trim(td_text));
    //             json_tr.push({ 'td' : $.trim(td_text)});
    //         });
    //         json_alltr.push({ 'tr' : json_tr});
    //         // console.log(json_tr);
    //         // dtr.push('tr', [dtr_tr]);
    //     });
    //     console.log(JSON.stringify(json_alltr));
    //     // // dtr = ;
    //     // // jsondtr = {};
    //     // // jsondtr.val = JSON.stringify(dtr);
    //     // // console.log(jsondtr);
    //     $('#txtjson').val(JSON.stringify(json_alltr));
    //     // e.submit();
    // });

});