
$.visual.editor.save = {
    private: {
        getData: function () {
            var data = {};
            $('[adm-config]').each(function () {
                var formconfig = $(this).attr('adm-config');
                $('[adm-field]', this).each(function () {
                    if ($(this).parents('adm[type="structure"]').length === 0) {
                        var name = $(this).attr('adm-field');
                        var val = {val: $(this).html(), type: $(this).attr('adm-field-type')};
                        if(data[formconfig]==undefined){
                            data[formconfig] = {};
                        }
                        data[formconfig][name] = val;
                    }
                });
            });
            $('[adm-form]').each(function () {
                var containerForm = $(this).attr('adm-form');
                data[containerForm] = [];

                $('[admitem]', this).each(function () {
                    //console.log($(this).parents('[admitem]'));
                    var fields = {};
                    $('[adm-field]', this).each(function () {
                        if ($(this).parents('adm[type="structure"]').length === 0) {
                            var name = $(this).attr('adm-field');
                            var val = {val: $(this).html(), type: $(this).attr('adm-field-type')};
                            fields[name] = val;
                        }
                    })

                    if ($(this).is("[adm-id]")) {
                        var pk = $(this).attr("adm-id");
                        fields['@pk@'] = pk;
                    }
                    data[containerForm].push(fields);
                })
            })
            return data;
        },
        save: function () {
            var data = $.visual.editor.save.private.getData();
            $.ajax({
                url: ADMIN_URL + 'visual/save',
                data: data,
                type: 'POST',
                dataType: 'JSON',
                success: function (json) {
                    if (json.success) {
                        alert("Dados salvos");
                        location.reload();
                    } else {
                        alert(json.msg)
                    }
                }
            });
        }
    },
    create: function () {
        var btn = $('<button/>');
        var icon = $('<i/>');
        icon.addClass('glyphicon glyphicon-ok');
        btn.append(icon);
        btn.html(btn.html() + ' Salvar');
        btn.addClass('visual-editor-save').attr('type', 'button');
        btn.click(this.private.save);
        $.editable.paletefn.addItem(btn);
    },
    remove: function (btn) {
        $(btn).click(function () {
            if (confirm("Deseja remover esse item?")) {
                var item = $(this).parents("[admitem]");
                if (item.is('[adm-id]')) {
                    var id = item.attr('adm-id');
                    var form = item.parents('[adm-form]').attr('adm-form');
                    $.ajax({
                        url: ADMIN_URL + 'visual/remove',
                        data: {id: id, form: form},
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (json) {
                            if (json.success) {
                                alert("Dados Removidos");
                            } else {
                                alert(json.msg)
                            }
                        }
                    })
                }
                item.remove();
            }
        })
    }

}