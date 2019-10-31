$(document).on('click','.btn-move-index',function() {
    var form    = $(this).data('form');
    document.getElementById(form).submit();
});

$(document).on('click','.form-link',function() {
    var href    = $(this).attr('href');
    var form    = $(this).data('form');

    var query   = $('#'+form).serialize();
    var href    = href.replace('//','/');

    location.href   = href+'?'+query;
});

$(document).on('click','.btn-comming-soon',function() {
    global_common.alert('준비중입니다.');
    return false;
});

$(document).on('click','.action, button',function() {
    var type    = $(this).data('type');
    var that    = this;

    switch(type) {
        case 'ajax-form-submit' :
            var form        = $(this).data('form');
            var callback    = $(this).data('callback');

            global_common.form_ajax(form, callback);
            break;

        case 'ajax' :
            var data_type   = $(this).data('data-type');
            var method      = $(this).data('method');
            var datas       = $(this).data('datas');
            var callback    = $(this).data('callback');
            var url         = $(this).data('url');

            $.ajax({
                method      : method,
                url         : url,
                data        : datas,
                dataType    : data_type,
                beforeSend  : global_common.show_loading,
                complete    : global_common.hide_loading,
                success     : eval(callback)
            });
            premium.remove_fb_evt();
            break;
    }
});