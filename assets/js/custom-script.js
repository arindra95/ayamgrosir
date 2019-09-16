$(document).ready(function() {
    var datetime = null
      , date = null;
    var update = function() {
        date = moment(new Date())
        datetime.html(date.format('dddd, Do MMMM YYYY, h:mm:ss a'));
    };
    datetime = $('#tgl-sekarang');
    update();
    setInterval(update, 1000);
    $('[data-toggle="tooltip"]').tooltip(); 
    $(":input").inputmask();
    $(".uang-indo").inputmask({
        alias: 'numeric',
        groupSeparator: '.',
        autoGroup: true,
        digits: 0,
        digitsOptional: true,
        placeholder: '0',
        autoUnmask: true,
    	removeMaskOnSubmit: true,

    });

    $(".angka").inputmask({
        alias: 'numeric',
        groupSeparator: '.',
        autoGroup: true,
        digits: 0,
        autoUnmask: true,
    	removeMaskOnSubmit: true,
        digitsOptional: false
    });
    $(".no_nota").inputmask({
        alias: 'numeric',
        groupSeparator: '.',
        autoGroup: false,
        digits: 0,
        digitsOptional: false
    });
    $(".persentase").inputmask({
        alias: 'numeric',
        groupSeparator: ',',
        autoGroup: true,
        digits: 0,
        digitsOptional: false
    });
    $(".kode").inputmask({
        mask: 'AAA-99999',
        clearIncomplete: true
    });
    $(".username").inputmask({
        mask: 'aaaaaa-99',
        placeholder: 'xxxxxx-12',
        clearIncomplete: true
    });
    $(".email").inputmask({
        alias: 'email',
        clearIncomplete: true
    });
    $(".teks").inputmask('Regex');
    $('.tanggalwaktu').datetimepicker();
    $('.tanggal').datetimepicker({
        timepicker: false,
        format: 'Y/m/d',
    });
    $('.waktu').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
});
