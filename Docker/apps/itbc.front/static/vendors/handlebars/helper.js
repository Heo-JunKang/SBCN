/**
 * Created by June on 2015. 12. 4..
 */
Handlebars.registerHelper({
    debug           : function(val_)
    {
        console.log("Current Context");
        console.log("====================");
        console.log(this);

        if (val_) {
            console.log("Value");
            console.log("====================");
            console.log(val_);
        }
    },

    nl2br   : function(content)
    {
        var nl2br = (content + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br>' + '$2');
        return new Handlebars.SafeString(nl2br);
    },


    number_format   : function(num_)
    {
        if(num_!=null)
        {
            var num_str = num_.toString();
            var result  = '';

            for(var i=0; i<num_str.length; i++)
            {
                var tmp = num_str.length - (i+1);

                if(((i%3)==0) && (i!=0))    result = ',' + result;
                result = num_str.charAt(tmp) + result;
            }
        }
        else
        {
            result  = 0;
        }

        return result;
    },

    replace : function( find, replace, options)
    {
        var string = options.fn(this);
        return string.replace( find, replace );
    },

    get_row : function(datas_)
    {
        return JSON.stringify(datas_);
    },

    kb_by_mb    : function(kb_)
    {
        return Math.ceil(kb_/1024);
    },

    pagination  : function(current_page_, total_page_, size_, options__)
    {
        var page, size, start_page, end_page, total_page;

        var current_page= current_page_;
        var size        = size_;
        var total_page  = total_page_;

        start_page  = parseInt(current_page) - Math.floor(size / 2);
        end_page    = parseInt(current_page) + Math.floor(size / 2);

        if (start_page <= 0)
        {
            end_page    -= (start_page - 1);
            start_page  = 1;
        }

        if (end_page > total_page)
        {
            end_page = total_page;
            if (end_page - size + 1 > 0)
            {
                start_page  = end_page - size + 1;
            }
            else
            {
                start_page  = 1;
            }
        }

        context = {
            is_show_first: false,
            pages       : [],
            is_show_last: false,
            total_page  : total_page,
            current_page: current_page
        };

        if (start_page === 1)
        {
            context.is_show_first = true;
        }

        for (var i = start_page; i <= end_page; i++)
        {
            context.pages.push({
                page        : i,
                is_current  : i == current_page
            });
        }

        if (end_page === total_page)
        {
            context.is_show_last = true;
        }

        return options__.fn(context);
    },

    selected : function(val01,val02)
    {
        if(val01==val02)
        {
            return "selected";
        }

        return "";
    },

    checked : function(val01,val02)
    {
        if(val01==val02)
        {
            return "checked";
        }

        return "";
    },

    convert_value   : function(val01,val02,output_true, output_false)
    {
        if(val01==val02)
        {
            return output_true;
        }

        return output_false;
    },

    compare : function (lvalue_, operator_, rvalue_, options_)
    {
        var operator_s, result;

        if (arguments.length < 3)
        {
            throw new Error("Handlerbars Helper 'compare' needs 2 parameters");
        }

        if (options_ === undefined)
        {
            options_ = rvalue_;
            rvalue_ = operator_;
            operator_ = "===";
        }

        operator_s = {
            '==': function (l, r) { return l == r; },
            '===': function (l, r) { return l === r; },
            '!=': function (l, r) { return l != r; },
            '!==': function (l, r) { return l !== r; },
            '<': function (l, r) { return l < r; },
            '>': function (l, r) { return l > r; },
            '<=': function (l, r) { return l <= r; },
            '>=': function (l, r) { return l >= r; },
            'typeof': function (l, r) { return typeof l == r; }
        };

        if (!operator_s[operator_])
        {
            throw new Error("Handlerbars Helper 'compare' doesn't know the operator_ " + operator_);
        }

        result = operator_s[operator_](lvalue_, rvalue_);

        if (result)
        {
            return options_.fn(this);
        }
        else
        {
            return options_.inverse(this);
        }

    },

    math    : function(lvalue_, operator_, rvalue_, options_)
    {
        lvalue = parseFloat(lvalue_);
        rvalue = parseFloat(rvalue_);

        return {
            "+": lvalue + rvalue,
            "-": lvalue - rvalue,
            "*": lvalue * rvalue,
            "/": Math.ceil(lvalue / rvalue),
            "%": lvalue % rvalue
        }[operator_];
    },

    character_limiter   : function(str, len_ , char_)
    {
        var str = str.replace(/(<([^>]+)>)/ig,"");

        if (str.length > len_)
            return str.substring(0,len_) + char_;
        return str;
    },

    for   : function(from, to, incr, block) {
        var accum = '';
        for(var i = from; i <= to; i += incr)
            accum += block.fn(i);
        return accum;
    },

    get_location_path   : function() {
        return window.location.pathname;
    }
});