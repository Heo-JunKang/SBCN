var Board_more   = function(datas, options) {
    this.datas      = datas;
    this.page       = 1;

    this.options    = {
        frm         : 'form-index',
        page        : 1,
        per_page    : 12,
        template    : {
            items : {
                id : 'template-items',
                box_id : 'template-box-items'
            },

            page : {
                id : 'template-page',
                box_id : 'template-box-page'
            },

            count : {
                id : 'tempate-count',
                box_id : 'template-box-count'
            }
        }
    };

    this.options        = $.extend(this.options, options);

    // setter datas
    this.set_datas      = function(datas) {this.datas=datas;}

    // setter page
    this.set_page       = function(page) {this.page=page;}

    // setter per_page
    this.set_per_page   = function(per_page) {this.per_page=per_page;}

    // getter datas
    this.get_datas      = function() {return this.datas;}

    // getter page
    this.get_page       = function() {return this.page;}

    // getter per_page
    this.get_per_page   = function() {return this.per_page;}

    // render items
    this.render_items   = function() {
        var datas   = this.get_datas();

        var source  = document.getElementById(this.options.template.items.id).innerHTML;

        var template= Handlebars.compile(source);

        //console.log(template(datas));

        document.getElementById(this.options.template.items.box_id).innerHTML   = template(datas);

        //console.log(datas);
    }

    // render paginations
    this.render_page    = function() {
        var datas   = this.get_datas();

        var source  = document.getElementById(this.options.template.page.id).innerHTML;

        var template= Handlebars.compile(source);

        document.getElementById(this.options.template.page.box_id).innerHTML   = template(datas);
    }

    // render count
    this.render_count   = function() {}

    // do search
    this.do_search      = function() {
        this.set_page(1);
        global_common.set_form_name_val(this.options.frm,'page',1);
        global_common.set_form_name_val(this.options.frm,'per_page',this.get_page()*this.get_per_page());
        this.call();
    }

    // move page
    this.move_page      = function() {
        var datas   = this.get_datas();

        var page    = datas.contents.paginations.total_page != 1 ? this.get_page()+1 : this.get_page();

        this.set_page(page);

        global_common.set_form_name_val(this.options.frm,'page',1);
        global_common.set_form_name_val(this.options.frm,'per_page',this.get_page()*this.get_per_page());

        this.call();
    }

    // call api
    this.call   = function() {
        var that    = this;
        global_common.form_ajax(this.options.frm, function(datas){
            global_common.set_push_state(that.options.frm);
            that.set_datas(datas);
            that.render_items();
            that.render_page();
        });
    }

    this.set_page(this.options.page);
    this.set_per_page(this.options.per_page);
}