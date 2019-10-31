/**
 * Created by June on 2016. 4. 14..
 */
/**
 * Created by June on 2015. 12. 2..
 */
var premium  = {
    show_notify: function (type, msg) {
        var type    = type.toLowerCase();

        alert(type);
        var opts = {
            msg: msg,
            type: type,
            position: "center"
        };

        notif(opts);
    },

    check_validation    : function(json) {
        var code = json.response.code;

        if(code!=200 && code!=201) {
            premium.show_notify('아이디나 비밀번호가 올바르지 않습니다.',json.response.msg);
            return false;
        }

        return true;
    },
    
    remove_fb_evt :function(){
        $("form[action='https://www.facebook.com/tr/']").remove();
    }
};