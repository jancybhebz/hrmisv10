$(document).ready(function() {
    $('#table-hazards').dataTable();
    $('.date-picker').datepicker( {
        format: 'yyyy',
        viewMode: 'years',
        minViewMode: 'years'
      });

    $('#selrep_type').on('change',function() {
        var reptype = $(this).val();
        if(reptype == 1){
            // Payslip
            $('.div-remittances,.div-yrrange,.div-generate').hide()
            $('.div-month,.div-yr,.div-period').show()
        }else{
            // Remittances
            $('.div-month,.div-yr,.div-period').hide()
            $('.div-remittances,.div-yrrange,.div-generate').show()
        }
    });

    $('#btnprint').click(function() {
        var reptype = $('#selrep_type').val();
        var replink = "";
        if(reptype == 1){
            report_name = "Payslip";
            replink = "finance/reports/monthlyreports/payslip";
        }else{
            report_name = "Remittance";
            replink = "finance/reports/monthlyreports/remittances";
        }
        $('.modal-title').html(report_name);
        if(reptype == 1 || (reptype == 2 && $('#selgen').val() == 1)){
            $('#print-preview-modal').modal('show');
        }else{
            alert('download excel');
        }
        $('#embed-pdf,#link-fullsize').attr('src',$('#txtbaseurl').val()+replink);
    });

});