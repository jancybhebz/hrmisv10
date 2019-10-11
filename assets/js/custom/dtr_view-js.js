$('#tbldtr').on('click', 'tbody > tr > td #btnlog', function () {
    var jsdata = $(this).data('json');
    $('#td-empname').html(jsdata['empname'] == null ? '' : '<li>'+jsdata['empname'].split(';').join('<li>'));
    $('#td-ipadd').html(jsdata['ipadd'] == null ? '' : '<li>'+jsdata['ipadd'].split(';').join('<li>'));
    $('#td-datetime').html(jsdata['datetime'] == null ? '' : '<li>'+jsdata['datetime'].split(';').join('<li>'));
    $('#td-oldval').html(jsdata['oldval'] == null ? '' : '<li>'+jsdata['oldval'].split(';').join('<li>'));
    $('#span-bsremarks').html('<b>Broken Schedule:</b> '+jsdata['bsremarks']);
    $('#log-modal').modal('show');
});

$('#tbldtr').on('click', 'tbody > tr > td #btnob', function () {
    var objsdata = $(this).data('json');
    $('#tblob-details tr:nth-child(1) > td').text(objsdata['dateFiled']);
    $('#tblob-details tr:nth-child(2) > td').text(objsdata['official']);
    $('#tblob-details tr:nth-child(3) > td').html('<b>From</b> '+objsdata['obDateFrom']+' <b>To</b> '+objsdata['obDateTo']);
    $('#tblob-details tr:nth-child(4) > td').html('<b>From</b> '+objsdata['obTimeFrom']+' <b>To</b> '+objsdata['obTimeTo']);
    $('#tblob-details tr:nth-child(5) > td').text(objsdata['obPlace']);
    $('#tblob-details tr:nth-child(6) > td').text(objsdata['obMeal']);
    $('#tblob-details tr:nth-child(7) > td').text(objsdata['purpose']);
    $('#ob-modal').modal('show');
});

$('#tbldtr').on('click', 'tbody > tr > td #btnto', function () {
    var objsdata = $(this).data('json');
    $('#tblto-details tr:nth-child(1) > td').text(objsdata['dateFiled']);
    $('#tblto-details tr:nth-child(2) > td').html('<b>From</b> '+objsdata['toDateFrom']+' <b>To</b> '+objsdata['toDateTo']);
    $('#tblto-details tr:nth-child(3) > td').text(objsdata['purpose']);
    $('#tblto-details tr:nth-child(4) > td').text(objsdata['destination']);
    $('#tblto-details tr:nth-child(5) > td').text(objsdata['wmeal']);
    $('#tblto-details tr:nth-child(6) > td').text(objsdata['transportation']);
    $('#tblto-details tr:nth-child(7) > td').text(objsdata['perdiem']);
    $('#to-modal').modal('show');
});

$('#tbldtr').on('click', 'tbody > tr > td #btnleave', function () {
    var objsdata = $(this).data('json');
    $('#tblleave-details tr:nth-child(1) > td').text(objsdata['dateFiled']);
    $('#tblleave-details tr:nth-child(2) > td').text(objsdata['leaveType']);
    $('#tblleave-details tr:nth-child(3) > td').html('<b>From</b> '+objsdata['leaveFrom']+' <b>To</b> '+objsdata['leaveTo']);
    $('#tblleave-details tr:nth-child(4) > td').text(objsdata['reason']);
    $('#leave-modal').modal('show');
});

$('#tbldtr').on('click', 'tbody > tr > td #btncto', function () {
    var objsdata = $(this).data('json');
    $('#tblcto-details tr:nth-child(1) > td').text(objsdata['cto_date']);
    $('#tblcto-details tr:nth-child(2) > td').html('<b>From</b> '+objsdata['cto_timefrom']+' <b>To</b> '+objsdata['cto_timeto']);
    $('#cto-modal').modal('show');
});

// var baseurl = window.location.origin;
// var pathname = window.location.pathname.split('/');
// pathname = pathname.split('/').slice(0,5).join('/')+'/dtr_edit';

var dtr = [];

var json_alltr = [{}];
$('#btn_edit_dtr').click(function(e) {
    // e.preventDefault();
    $('.dtr-edit tr').each(function (i, valtr) {
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
    // dtr = ;
    // jsondtr = {};
    // jsondtr.val = JSON.stringify(dtr);
    // console.log(jsondtr);
    $('#txtjson').val(JSON.stringify(json_alltr));


    // console.log(baseurl+'/'+pathname[1]+'/hr/attendance/dtr_edit');
    // $.post(baseurl+'/'+pathname[1]+'/hr/attendance/dtr_edit', dtr );
    // $.post( baseurl+'/'+pathname[1]+'/hr/attendance/dtr_edit', function( data ) {
    //   console.log( "Data Loaded: " + data );
    // });
    // $.post(baseurl+'/'+pathname[1]+'/hr/attendance/dtr_edit', dtr, function(response) {
        // Log the response to the console
        // console.log("Response: "+response);
    // });
    // $.ajax({
    //             type: "post",
    //             dataType: "json",
    //             url: baseurl+'/'+pathname[1]+'/hr/attendance/dtr_edit',
    //             data: dtr,
    //             contentType: 'json',
    //             "success": function(result) {
    //                 console.log(result);
    //             },
    //         });
});