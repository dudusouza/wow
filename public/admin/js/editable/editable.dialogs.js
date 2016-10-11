$.editable.dialogs = {
    imagem: function () {
        var button = $('<button/>').attr('type', 'button').html('Adicionar Imagem');
        var img = $('<img/>');
        var input = $('<input/>').attr('type', 'file');
        input.hide();
        button.addClass('btn btn-default btn-file');

        button.click(function () {
            input.trigger('click');
        });
        input.change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(img).attr('src', e.target.result).show();
                }

                reader.readAsDataURL(this.files[0]);
            }
        })

        var div = $('<div/>').append(button, input, img).addClass('editable-upload-imagem');
        $.editable.dialog(div,{
            Salvar: function(){
                $.editable.fns.additem(img[0].outerHTML);
//                $( "[contenteditable]" ).find('img').resizable();
                $(this).dialog('close').remove();
            },
            Cancela: function(){
                $(this).dialog('close').remove();
            },
        });
    }
}
$.editable.dialog = function (html, buttons) {
    if (buttons == undefined) {
        buttons = false;
    }
    var div = $('<div/>').appendTo('body');
    div.append(html);
    div.dialog({
        buttons: buttons
    });
    div.parents('.ui-dialog').addClass('editable-dialog');
}