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
$('.alert').hide();
$('#btn_edit_dtr').click(function(e) {
    var err = 0;
    // e.preventDefault();
    $('.dtr-edit tr').each(function (i, valtr) {
        // dtr_tr = [];
        json_tr = [{}];
        $(this).find('td').each(function (f, valtd) {
            td_text = $(this).text();
            td_text = td_text.replace(/(<([^>]+)>)/ig,"").replace(/(\r\n|\n|\r)/gm, "");
            // dtr_tr.push($.trim(td_text));
            json_tr.push({ 'td' : $.trim(td_text)});
            var tdindex = $(this).index();

            $(this).css('background-color','#fff');
            if(tdindex >= 1 && tdindex <=6 ){
                value = td_text.replace(/ /g,'');
                if(!/^\d{2}:\d{2}$/.test(value)){
                    $(this).find('.tdedit').css('background-color','pink');
                    err = err + 1;
                }else{
                    var parts = value.split(':');
                    if(parts[0] > 23 || parts[1] > 59){
                        $(this).find('.tdedit').css('background-color','pink');
                        err = err + 1;
                    }
                }
            }
        });
        json_alltr.push({ 'tr' : json_tr});
    });

    $('#txtjson').val(JSON.stringify(json_alltr));
    console.log(err);
    if(err > 0){
        $('.alert').show();
        e.preventDefault();
    }else{
        $('.alert').hide();
    }
});