/**
 * Created by June on 15. 10. 7..
 */

var global_common  = {
    // 폼 네임으로 값 가져오기
    get_form_name_val   : function(form, name) {
        return jQuery('#'+form).find('[name="'+name+'"]').val();
    },

    // 폼 네임으로 값 할당
    set_form_name_val   : function(form, name, val) {
        jQuery('#'+form).find('[name="'+name+'"]').val(val);
    },

    get_radio_val   : function(name) {
        return $(':input:radio[name='+name+']:checked').val();
    },

    // 폼 AJAX
    form_ajax : function(form,callback) {
        var frm         = jQuery('#'+form);
        var datas       = frm.serialize();
        var url         = frm.attr('action');
        var method      = frm.attr('method');
        var data_type   = typeof(frm.attr('data_type'))=='undefined' ? 'json' : frm.attr('data_type');

        jQuery.ajax({
            method      : method,
            url         : url,
            data        : datas,
            dataType    : data_type,
            xhrFields   : {withCredentials: true},
            beforeSend  : global_common.show_loading,
            complete    : global_common.hide_loading,
            success     : eval(callback)
        });
    },

    call_ajax : function(datas,url,callback,method) {
        var datas       = datas;
        var data_type   = 'json';

        jQuery.ajax({
            method      : method,
            url         : url,
            data        : datas,
            dataType    : 'json',
            beforeSend  : function(){},
            complete    : function(){},
            success     : eval(callback)
        });
    },

    number_format   : function(num, decimals, dec_point, thousands_sep) {
        num = parseFloat(num);
        if(isNaN(num)) return '0';

        if(typeof(decimals) == 'undefined') decimals = 0;
        if(typeof(dec_point) == 'undefined') dec_point = '.';
        if(typeof(thousands_sep) == 'undefined') thousands_sep = ',';
        decimals = Math.pow(10, decimals);

        num = num * decimals;
        num = Math.round(num);
        num = num / decimals;

        num = String(num);
        var reg = /(^[+-]?\d+)(\d{3})/;
        var tmp = num.split('.');
        var n = tmp[0];
        var d = tmp[1] ? dec_point + tmp[1] : '';

        while(reg.test(n)) n = n.replace(reg, "$1"+thousands_sep+"$2");

        return n + d;
    },

    show_loading    : function() {
        var spinner = new Spinner().spin();
        $('body').append('<div id="loading_box" style="left:0;top:0;right:0;bottom:0;position: fixed;background: rgba(0,0,0,0.4);z-index:9999;"></div>');
        $('#loading_box').append(spinner.el);
    },

    hide_loading    : function() {
        $('#loading_box').remove();
    },

    kb_by_mb    : function(kb) {
        return kb/1024;
    },

    load_img    : function(event,target) {
        var output = document.getElementById(target);
        output.src = URL.createObjectURL(event.target.files[0]);
    },

    get_version_of_ie : function(){
        var word;
        var version = "N/A";

        var agent = navigator.userAgent.toLowerCase();
        var name = navigator.appName;

        // IE old version ( IE 10 or Lower )
        if ( name == "Microsoft Internet Explorer" ) word = "msie ";

        else {
            // IE 11
            if ( agent.search("trident") > -1 ) word = "trident/.*rv:";

            // Microsoft Edge
            else if ( agent.search("edge/") > -1 ) word = "edge/";
        }

        var reg = new RegExp( word + "([0-9]{1,})(\\.{0,}[0-9]{0,1})" );

        if (  reg.exec( agent ) != null  ) version = RegExp.$1 + RegExp.$2;

        return version;
    },

    add_zero    : function(num) {
        return num<10 ? '0'+num : num;
    },

    // 해당 월 총 몇주차 값 가져오기
    get_week_of_month   : function(yyyy,mm) {
        date    = new Date(yyyy,mm-1,1);
        day     = date.getDay();
        num     = new Date(yyyy, mm, 0).getDate();

        return Math.ceil((num + day) / 7);
    },

    get_selectbox_data  : function(obj, data) {
        return $(obj).find('option:selected').data(data);
    },

    replace_all : function(str,pattern,replace) {
        var pattern = new RegExp(pattern,'g');
        return str.replace(pattern,replace);
    },

    // handlebars template engin 의존
    call_handlebars : function(source,box, datas) {
        var source  = $('#'+source).html();
        var template= Handlebars.compile(source);

        $('#'+box).html(template(datas));
    },

    substr_replace  : function (str, replace, start, length) {
        if (start < 0) {
            start = start + str.length
        }
        length = length !== undefined ? length : str.length;
        if (length < 0) {
            length = length + str.length - start
        }
        return [
            str.slice(0, start),
            replace.substr(0, length),
            replace.slice(length),
            str.slice(start + length)
        ].join('')
    },

    get_query_string    : function(json) {
        var query_string    = '';
        $.each(json,function(k,v) {
            query_string	+= '&'+k+'='+v;
        });
        query_string	= '?'+this.substr_replace(query_string,'',0,1);
        return query_string;
    },

    set_push_state  : function(form_id) {
        let param   = $('#'+form_id).serialize();

        try {
            window.history.pushState(null, null, '?'+param+location.hash);
        }
        catch(e){}
    },

    strip_tags  : function(input, allowed) {
        var allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
        var tags    = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
        var php_tag = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;

        return input.replace(php_tag, '').replace(tags, function ($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
    },

    check_response_code   : function(json) {
        var code = json.response.code.toString();

        return code.indexOf(2)==0 ? true : false;
    },

    uuid    : function() {
        var d = new Date().getTime();
        if (typeof performance !== 'undefined' && typeof performance.now === 'function'){
            d += performance.now(); //use high-precision timer if available
        }
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    },

    alert : function(msg,callback)
    {
        $.alert({
            content : msg,
            header  : '알림',
            confirm :function () {
                if(typeof callback != 'undefined')
                {
                    callback;
                }
            }
        })
    },

    confirm : function(msg,confirm,cancel)
    {
        $.confirm({
            content:msg,
            header: '확인',
            confirm:function () {
                confirm;
            },
            cancel:function () {
                cancel;
            }
        })
    }
};