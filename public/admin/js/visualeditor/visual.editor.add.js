
$.visual.editor.add = {
    _createBtn: function () {
        var btn = $('<button/>');
        var div = $('<div/>');
        div.addClass('add-item add-item-visual-editor').attr("admitem", true);
        btn.appendTo(div).attr("type", "button");
        btn.html('<i class="glyphicon glyphicon-plus"></i>');
        return div;
    },
    _createBtnRemove: function () {
        var btn = $('<button/>');
        btn.attr("type", "button");
        btn.attr("adm-delete", true);
        btn.html('<i class="glyphicon glyphicon-trash"></i>');
        return btn;
    },
    addBtnRemove: function () {
        var btn = this._createBtnRemove();
        $("[adm-form]").each(function () {
            var itens = $(this).find("[admitem]");
            itens.each(function () {
                if ($(this).parents('[type="structure"]').length == 0) {
                    var btnclone = btn.clone();
                    $(this).append(btnclone);
                    $(btnclone, this).eq(0).css({
                        left: "-" + $(btnclone).css('width'),
                        top: 0
                    });
                    $.visual.editor.save.remove(btnclone);
                }
            });
        });
    },
    addbtn: function () {
        var div = this._createBtn();
        var that = this;
        $('button', div).click(function () {
            var admform = $(this).parent().parent().find('[adm-form]');
           
            var admitem = $(admform).find("[admitem]");
            var structure = admform.find('adm[type="structure"]');
            var children = structure.children().clone();
            //console.log(admitem.eq(admitem.length-2));
            children.next(admitem.eq(admitem.length - 2));
            $(admform).append(children);
            var btndelete = that._createBtnRemove();
            btndelete.appendTo(children);
            $(btndelete, this).eq(0).css({
                left: "-" + $(btndelete).css('width'),
                top: 0
            });
            $.visual.editor.save.remove(btndelete);
        })
        $("[adm-form]").each(function () {
            $(div).insertBefore(this);
        })
    }
    //
};