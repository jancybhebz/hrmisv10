$(document).ready(function(){
    // $('.modal-title').html('Health Check Declaration Form');
    // $('#hcd-modal').modal('show');

    var dt = $('.date-picker').datepicker({autoclose: true, });
    $("#txttemp").keypress(function() {
        return (event.charCode >= 48 && event.charCode <= 57) ||  event.charCode == 46 || event.charCode == 0 
    });

    $('form [type="text"].form-required').on('focusout',function(e) {
        if(this.id == 'txtq5'){
            if($("input[name='rdoq5']:checked").val() == "1")
                checkElement($(this), 'text');
            else
                return;
        }
        else{
            checkElement($(this), 'text');
        }
    });

    if($('form [type="radio"]').length > 0){
        $('.radio-required').click(function() {
            checkElement($(this), 'radio', $(this).find("input:radio:checked").length);
        });
    }

    $('input[type=radio][name=rdoq5]').change(function() {
        if (this.value == 1) {
             $('#txtq5').addClass('form-required');
             $('#txtq5').prop('readonly', false);
        }       
        else{
            $('#txtq5').removeClass('form-required');
            $('#txtq5').parent().removeClass('has-error');
            $('#txtq5').removeAttr('placeholder');
            $('#txtq5').prop('readonly', true);
            $('#txtq5').val('');
        }
    });

    $('input[type=radio][name=rdochkall]').change(function() {
        if (this.value == 1) {
            $("#tblhcd input[type=radio][value='1']").prop('checked',true);
            $('#txtq5').addClass('form-required');
            $('#txtq5').prop('readonly', false);
        }       
        else{
            $("#tblhcd input[type=radio][value='0']").prop('checked',true);
            $('#txtq5').removeClass('form-required');
            $('#txtq5').parent().removeClass('has-error');
            $('#txtq5').removeAttr('placeholder');
            $('#txtq5').prop('readonly', true);
            $('#txtq5').val('');
        }
    });
});  


var form = document.getElementById('dtr_form');

function hcdForm(){
    // if($("input[name='wfh-toggle']:checked").val() != "on"){
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {strUsername: $('[name="strUsername"]').val(), strPassword: $('[name="strPassword"]').val(), txttime : $('[name="txttime"]').val()},
            url: "dtrkiosk/dtr_kiosk/check_dtr",
            success: function (data) {
                if(data.usr == 0){
                    toastr.error(data.err_msg);
                }
                else if(data.usr == 1){
                    form.submit();
                }
                else{
                    $('#btnHCD').prop("disabled", false);
                    $('.modal-title').html('Health Check Declaration Form');
                    $('#hcd-modal').modal('show');

                    if($("input[name='wfh-toggle']:checked").val() != "on"){    
                        $('.iswfh').show(); 
                        $("input[name='rdonvisit']").prop("checked", true); 
                        $("input[name='rdonvisit'][value='Official'").prop("checked", true);    
                        $("input[name='rdonob']").prop("checked", true);    
                        $("input[name='rdonob'][value='Employee'").prop("checked", true);   
                    }   
                    else{   
                        $('.iswfh').hide(); 
                        $("input[name='rdonvisit']").prop("checked", false);    
                        $("input[name='rdonob']").prop("checked", false);   
                    }
                    
                    $('#txtempno').val(data.emp['empNumber']);
                    $('#txtname').val(data.emp['fullname']);
                    $('input[name=rdosex][value=' + data.emp['sex'] + ']').prop('checked', true);
                    $('#txtage').val(data.emp['age']);
                    $('#txtrescon').val(data.emp['mobile'] != '' ? data.emp['address'].concat(' - ',data.emp['mobile']) : data.emp['address']);
                }
            }
        }).fail(function () {
            toastr.error("An error has occurred. Please try again later.");
        });
    // }
    // else{
    //     form.submit();
    // }
    
}

var stopClick = false; 
function submitHCD(){
    var err = 0;

    err = checkError();
    
    if(err == 0){
        if(stopClick) return;
        stopClick = true;
        $.ajax({
            type: "GET",
            dataType: "json",
            data: $('#hcd_form').serialize() + '&strUsername=' + $('[name="strUsername"]').val() + '&txtempno=' + $('[name="txtempno"]').val() + '&txtdate=' + $('#txtdate').val() + '&wfh=' + $("input[name='wfh-toggle']:checked").val(),
            url: "dtrkiosk/dtr_kiosk/submit_hcd",
            success: function (data) {
                if(data.status == "success"){
                    toastr.success(data.message);
                    $('#btnHCD').prop("disabled", true);
                    form.submit();
                } else {
                    toastr.error(data.message);
                }
            }
        }).fail(function () {
            toastr.error("An error has occurred. Please try again later.");
        });
    }
    else{
        return;
    }
    
    // form.submit();
    // console.log($('#hcd_form').serialize());
}

function savePDF(){
    var doc = new jsPDF();

    doc.setFontSize(10);
    doc.setFontType('bold');
    doc.text(170, 15, 'Annex A');
    doc.text(80, 20, 'Health Check Declaration Form');

    // doc.line(30, 25, 180, 25);

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
    // doc.line(55, 66, 180, 66);
    doc.line(55, 71, 180, 71);
    // doc.text(55, 55, cutString($('#txtrescon').val(),1));
    // doc.text(55, 60, cutString($('#txtrescon').val(),2));

    if($("input[name='wfh-toggle']:checked").val() != "on"){
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
    }

    // doc.text(20, 95, 'Company Name:');
    // doc.text(55, 95, $('#txtcompname').val());
    // doc.line(55, 96, 180, 96);

    // doc.text(20, 105, 'Company');
    // doc.text(20, 110, 'Address:');
    // doc.text($('#txtcompadd').val(), 55, 105, {maxWidth: 120, align: "justify"});
    // // doc.line(55, 101, 180, 101);
    // doc.line(55, 111, 180, 111);
    // // doc.text(55, 95, cutString($('#txtcompadd').val(),1));
    // // doc.text(55, 100, cutString($('#txtcompadd').val(),2));

    // doc.text(20, 235, $('#lblconsent').text(), "center");
    doc.text($('#lblconsent').text(), 20, 255-20, {maxWidth: 170, align: "justify"});

    // doc.text(20, 270, 'Signture:');
    // doc.text(55, 270, $('#txtsign').val());

    // doc.autoTable({
    //     html:"#tblhcd", 
    //     theme: 'grid', 
    //     startY: 150, 
    //     styles: { 
    //         textColor: [0, 0, 0] 
    //     },
    //     didDrawCell: data => {
    //         // tdtr = data.row.raw[1]._element; // Instance of <tr> element
    //         // console.log(tdtr.getElementsByTagName('span')[0]);
    //         // data.cell.text = 'qqq';
    //         if(data.column.index == 1)
    //         {
    //             // console.log(data.row.raw[1]);
    //             data.cell.text = 'qqq';
    //         }
            
    //     }
    // });


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

    // if(chckr > 0){
    //     toastr.warning("Please answer all questions.");
    //     return;
    // }

    // if($("input[name='rdoq5']:checked").val() == "1"){
    //     if($('#txtq5').val() == ""){
    //         $('#txtq5').parent().addClass('has-error');
    //         $('#txtq5').attr("placeholder", "This field is required.");
    //         return;
    //     }else{
    //         $('#txtq5').parent().removeClass('has-error');
    //         $('#txtq5').removeAttr('placeholder');
    //     }
    // }
    
    rows = rows.slice(0);
    rows.splice(1 - 1, 1);

    doc.autoTable(
        columns, 
        rows,
        {
            theme: 'grid', 
            // margin: { left: 10 },
            startY: 115-20, 
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

function deleteDTR(){
    $.ajax({
        type: "GET",
        dataType: "json",
        data: '&strUsername=' + $('[name="strUsername"]').val() + '&strPassword=' + $('[name="strPassword"]').val(),
        url: "dtrkiosk/dtr_kiosk/delete_dtr",
        success: function (data) {
            if(data.status == "success"){
                toastr.success(data.message);
                setTimeout(function(){
                   window.location.reload(1);
                }, 1000);
            } else {
                toastr.error(data.message);
            }
        }
    }).fail(function () {
        toastr.error("An error has occurred. Please try again later.");
    });
}

function checkElement(e,obj='',value=0){
    var res = 1;
    if(obj=='radio'){
        if(value == 1){
            e.parent().removeClass('has-error');
            res = 0;
        }else{
            e.parent().addClass('has-error');
            res = 1;
        }
    }else{
        if(obj == 'select2-multiple'){
            if(e.val() == null){
                e.parent().addClass('has-error');
                e.prev("i").attr('data-original-title', "This field is required.");
                e.prev("i").show();
                res = 1;    
            }else{
                e.prev("i").hide();
                e.parent().removeClass('has-error');
                res = 0;
            }
        }else{

            if(e.val() == '' || e.val() == null || e.val().toLowerCase() == 'null'){
                e.parent().addClass('has-error');
                e.attr("placeholder", "This field is required.");
                res = 1;
            }else{
                if(obj == 'text'){
                    if(!e.val().replace(/\s/g, '').length){
                        e.parent().addClass('has-error');
                        e.attr("placeholder", "This field is required.");
                        res = 1;
                    }else{
                        e.prev("i").hide();
                        e.parent().removeClass('has-error');
                        e.removeAttr('placeholder');
                        res = 0;
                    }
                }else{
                    e.prev("i").hide();
                    e.parent().removeClass('has-error');
                    e.removeAttr('placeholder');
                    res = 0;
                }
            }

        }

    }
    return res;
}

function checkError(){
    var err = 0;

    if($('#txtdate').val() == ""){
        $('#txtdate').parent().addClass('has-error');
        $('#txtdate').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtdate').parent().removeClass('has-error');
        $('#txtdate').removeAttr('placeholder');
    }

    if($('#txttemp').val() == ""){
        $('#txttemp').parent().addClass('has-error');
        $('#txttemp').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txttemp').parent().removeClass('has-error');
        $('#txttemp').removeAttr('placeholder');
    }

    if($('#txtname').val() == ""){
        $('#txtname').parent().addClass('has-error');
        $('#txtname').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtname').parent().removeClass('has-error');
        $('#txtname').removeAttr('placeholder');
    }

    if($('#txtage').val() == ""){
        $('#txtage').parent().addClass('has-error');
        $('#txtage').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtage').parent().removeClass('has-error');
        $('#txtage').removeAttr('placeholder');
    }

    if($('#txtrescon').val() == ""){
        $('#txtrescon').parent().addClass('has-error');
        $('#txtrescon').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtrescon').parent().removeClass('has-error');
        $('#txtrescon').removeAttr('placeholder');
    }

    if($('#txtcompname').val() == ""){
        $('#txtcompname').parent().addClass('has-error');
        $('#txtcompname').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtcompname').parent().removeClass('has-error');
        $('#txtcompname').removeAttr('placeholder');
    }

    if($('#txtcompadd').val() == ""){
        $('#txtcompadd').parent().addClass('has-error');
        $('#txtcompadd').attr("placeholder", "This field is required.");
        err++;
    }else{
        $('#txtcompadd').parent().removeClass('has-error');
        $('#txtcompadd').removeAttr('placeholder');
    }

    // if($('#txtsign').val() == ""){
    //     $('#txtsign').parent().addClass('has-error');
    //     $('#txtsign').attr("placeholder", "This field is required.");
    //     err++;
    // }else{
    //     $('#txtsign').parent().removeClass('has-error');
    //     $('#txtsign').removeAttr('placeholder');
    // }

    var chckr = 0;
    $('#tblhcd tr').each(function (index) {
        if(!$(this).find('input[type="radio"]').is(":checked")){

            chckr++;
            console.log(chckr);
        } 
        else{
            chckr = 0;
        }
    });

    if(chckr > 0){
        toastr.warning("Please answer all questions.");
        err++;
    }

    if($("input[name='rdoq5']:checked").val() == "1"){
        if($('#txtq5').val() == ""){
            $('#txtq5').parent().addClass('has-error');
            $('#txtq5').attr("placeholder", "This field is required.");
            return;
        }else{
            $('#txtq5').parent().removeClass('has-error');
            $('#txtq5').removeAttr('placeholder');
        }
    }

    return err;
}

function cutString(s, n){
    var middle = Math.floor(s.length / 2);
    var before = s.lastIndexOf(' ', middle);
    var after = s.indexOf(' ', middle + 1);

    if (middle - before < after - middle) {
        middle = before;
    } else {
        middle = after;
    }

    var s1 = s.substr(0, middle);
    var s2 = s.substr(middle + 1);

    return n == 1 ? s1 : s2;
}

