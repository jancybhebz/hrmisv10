$(document).ready(function() {
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm:ss A',
        disableFocus: true,
        showInputs: false,
        showSeconds: true,
        showMeridian: true,
    });
    $('.date-picker').datepicker();
    $('#selemps').multiSelect({});
    $('.selper').select2({
        placeholder: "",
        allowClear: true
    });

    // hide all the group
    $(".div-group,.div-group1,.div-group2,.div-group3,.div-group4,.div-group5").hide();

    $('#seltype').change(function() {
        strgrp = $(this).val();
        $(".div-group").hide();
        $(".div-group1").hide();
        $(".div-group2").hide();
        $(".div-group3").hide();
        $(".div-group4").hide();
        $(".div-group5").hide();

        // begin if select type is not empty
        if(strgrp != ''){
            // begin checking group
            if(strgrp != 'AllEmployees' && strgrp != ''){
                $('.div-type,.div-apptstatus').removeClass('col-md-5').addClass('col-md-4');

                $(".div-group").show();
                $(".div-group"+strgrp).show();
            }else{
                $('.div-type,.div-apptstatus').removeClass('col-md-4').addClass('col-md-5');
            }
            // end checking group
        }
        // end if select type is not empty
    });

    
    all_employees = $.parseJSON($('#json_employee').val());
    $('#selappt').on("select2:select", function(e) {
        /* Appointment Code */
        $('#selemps').empty().multiSelect('destroy');
        var apptcode = $(this).val();
        if(apptcode!=0){
            $('#selemps').multiSelect('destroy');
            $.each(all_employees, $.proxy(function(i, emp) {
                if(emp.appointmentCode == apptcode){
                    e_name = emp.surname + ', ' + emp.firstname + ' ' + emp.middleInitial + '.';
                    $('#selemps').append('<option value="'+ emp.empNumber +'">'+ e_name +'</option>');
                }
            }, this));
        }else{
            $.each(all_employees, $.proxy(function(i, emp) {
                e_name = emp.surname + ', ' + emp.firstname + ' ' + emp.middleInitial + '.';
                $('#selemps').append('<option value="'+ emp.empNumber +'">'+ e_name +'</option>');
            }, this));
        }
        $('#selemps').multiSelect({});
    });

});