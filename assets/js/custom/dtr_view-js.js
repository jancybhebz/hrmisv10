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

$('#tbldtr').on('click', 'tbody > tr > td #btnhcd', function () {
    var jsdata = $(this).data('json');
    console.log(jsdata['empNumber']);
    console.log(jsdata['dtrdate']);
    var oldURL = window.location.toString();
    var index = 0;
    var newURL = oldURL;
    index = oldURL.indexOf('attendance_summary');
    if(index == -1){
        index = oldURL.indexOf('?');
    }
    if(index != -1){
        newURL = oldURL.substring(0, index);
    }
    
    $.ajax({
        type: "GET",
        dataType: "json",
        data: {empNumber: jsdata['empNumber'], dtrDate: jsdata['dtrdate']},
        url: newURL+"attendance/get_hcd/",
        success: function (data) {
                $('#hcd-modal').modal('show');

                $("#hcd_form :input[type='text']").val("");

                // $('#tblhcd tr').each(function (index) {
                //     $(this).find('input[type="radio"]').parents('span').removeClass('checked');
                // });
                $("#hcd_form :input[type='radio']").parents('span').removeClass('checked');

                $('#txtempno').val(data.empNumber);
                $('#hcd_form #txtdate').val(data.dtrDate);
                $('#txttemp').val(data.temperature);
                $('#txtname').val(data.fullName);
                $('input[name=rdosex][value=' + data.sex + ']').prop('checked', true);
                $('input[name=rdosex][value=' + data.sex + ']').parents('span').addClass('checked');
                $('#txtage').val(data.age);
                $('#txtrescon').val(data.residence_contact);

                $('input[name=rdonvisit][value=' + data.natureVisit + ']').prop('checked', true);
                $('input[name=rdonvisit][value=' + data.natureVisit + ']').parents('span').addClass('checked');
                $('input[name=rdonob][value=' + data.natureOb + ']').prop('checked', true);
                $('input[name=rdonob][value=' + data.natureOb + ']').parents('span').addClass('checked');

                $('input[name=rdoq1_1][value=' + data.q1_1 + ']').prop('checked', true);
                $('input[name=rdoq1_1][value=' + data.q1_1 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_2][value=' + data.q1_2 + ']').prop('checked', true);
                $('input[name=rdoq1_2][value=' + data.q1_2 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_3][value=' + data.q1_3 + ']').prop('checked', true);
                $('input[name=rdoq1_3][value=' + data.q1_3 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_4][value=' + data.q1_4 + ']').prop('checked', true);
                $('input[name=rdoq1_4][value=' + data.q1_4 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_5][value=' + data.q1_5 + ']').prop('checked', true);
                $('input[name=rdoq1_5][value=' + data.q1_5 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_6][value=' + data.q1_6 + ']').prop('checked', true);
                $('input[name=rdoq1_6][value=' + data.q1_6 + ']').parents('span').addClass('checked');
                $('input[name=rdoq1_7][value=' + data.q1_7 + ']').prop('checked', true);
                $('input[name=rdoq1_7][value=' + data.q1_7 + ']').parents('span').addClass('checked');
                $('input[name=rdoq2][value=' + data.q2 + ']').prop('checked', true);
                $('input[name=rdoq2][value=' + data.q2 + ']').parents('span').addClass('checked');
                $('input[name=rdoq3][value=' + data.q3 + ']').prop('checked', true);
                $('input[name=rdoq3][value=' + data.q3 + ']').parents('span').addClass('checked');
                $('input[name=rdoq4][value=' + data.q4 + ']').prop('checked', true);
                $('input[name=rdoq4][value=' + data.q4 + ']').parents('span').addClass('checked');
                $('input[name=rdoq5][value=' + data.q5 + ']').prop('checked', true);
                $('input[name=rdoq5][value=' + data.q5 + ']').parents('span').addClass('checked');
                
                $('#txtq5').val(data.q5_txt);
            }
    }).fail(function () {
        toastr.error("An error has occurred. Please try again later.");
    });

});

function savePDF(){
    var doc = new jsPDF();

    doc.setFontSize(10);
    doc.setFontType('bold');
    doc.text(170, 15, 'Annex A');
    doc.text(80, 20, 'Health Check Declaration Form');

    doc.setFontType('normal');
    doc.setFontSize(10);
    doc.text(20, 35, 'Date:');
    doc.text(55, 35, $('#txtdate').val());
    doc.line(55, 36, 110, 36);

    doc.text(120, 35, 'Temperature:');
    doc.text(150, 35, $('#txttemp').val());
    doc.line(150, 36, 180, 36);

    doc.text(20, 45, 'Name:');
    doc.text(55, 45, $('#txtname').val());
    doc.line(55, 46, 110, 46);

    doc.text(120, 45, 'Sex:');
    doc.text(145, 45, 'Male');
    doc.text(145, 55, 'Female');
    doc.line(139, 46, 144, 46);
    doc.line(139, 56, 144, 56);
    $("input[name='rdosex']:checked").val() == 'M' ?  doc.text(141, 45, '/') :  doc.text(141, 55, '/');

    doc.text(160, 45, 'Age:');
    doc.text(175, 45, $('#txtage').val());
    doc.line(174, 46, 180, 46);

    doc.text(20, 65, 'Residence &');
    doc.text(20, 70, 'Contact No.:');
    doc.text($('#txtrescon').val(), 55, 65, {maxWidth: 120, align: "justify"});
    doc.line(55, 71, 180, 71);

    doc.text(20, 80, 'Nature of Visit:');
    doc.text(20, 85, '(Please check one)');
    doc.text(65, 80, 'Official');
    doc.text(65, 85, 'Personal');
    doc.line(59, 81, 64, 81);
    doc.line(59, 86, 64, 86);
    $("input[name='rdonvisit']:checked").val() == 'Official' ? doc.text(62, 80, '/') :  doc.text(62, 85, '/');

    doc.text(100, 80, 'Nature of Official Business:');
    doc.text(100, 85, '(Please check one)');
    doc.text(155, 80, 'Employee');
    doc.text(155, 85, 'Client');
    doc.line(149, 81, 154, 81);
    doc.line(149, 86, 154, 86);
    $("input[name='rdonob']:checked").val() == 'Employee' ? doc.text(151, 80, '/') :  doc.text(151, 85, '/');

    doc.text($('#lblconsent').text(), 20, 265-35, {maxWidth: 170, align: "justify"});


    var table = document.getElementById('tblhcd');
    var columns = [" ", "Yes", "No"];
    var rows = [];
    var chckr = 0;

    $('#tblhcd tr').each(function (index) {
        yes = "";
        no = "";
        qsn = (table.rows[index].cells[0].textContent.trim());

        if(!$(this).find('input[type="radio"]').is(":checked")){
            yes = "";
            no = "";
            chckr++;
        } else {
            if($(this).find('input[type="radio"]:checked').val() == 1)
                yes = '  /';
            else
                no = ' /';

            chckr = 0;
        }

        if(qsn.charAt(0) == "*")
            qsn = '\t'+qsn;

        if(qsn.charAt(0) == "5")
            qsn = qsn + '                                   ' + $('#txtq5').val();

        rows.push([qsn,yes,no]);
    });
    
    rows = rows.slice(0);
    rows.splice(1 - 1, 1);

    doc.autoTable(
        columns, 
        rows,
        {
            theme: 'grid', 
            // margin: { left: 10 },
            startY: 125-35, 
            // tableWidth: 180,    
            styles: { textColor: [0, 0, 0], fontSize: 10, fillColor: [255, 255, 255], halign: 'justify' },
            columnStyles: {
              0: {
                cellWidth: 'auto'
              }
            }
        });           

    // Save the PDF
    doc.save('hcdform_'+$('#txtempno').val()+'_'+$('#txtdate').val()+'.pdf');
}

$(document).ready(function() {
    $("#hcd_form :input").prop("disabled", true);
});