function format_number(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
$(document).ready(function() {
    $('#txtvl,#txtsl').on('keyup',function() {
        var vl = $('#txtvl').val() == '' ? 0 : $('#txtvl').val();
        var sl = $('#txtsl').val() == '' ? 0 : $('#txtsl').val();
        var amt_monetize = $('#txtamt_mone').val();
        var actual_sal = $('#txtactual_sal').val();

        amount_monetized = (parseFloat(vl) + parseFloat(sl)) * amt_monetize * actual_sal;
        $('#txtmone_amt').val(format_number(amount_monetized.toFixed(2)));
    });
});