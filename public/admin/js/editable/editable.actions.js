$.editable.actions = function (btns) {
    var that = this;

    //NEGRITO
    $.editable.click(btns.bold, $.editable.fns.text.bold);
    $.editable.click(btns.italic, $.editable.fns.text.italic);
    $.editable.click(btns.underline, $.editable.fns.text.underline);
    
    //Alinhamentos
    $.editable.click(btns.aleft,$.editable.fns.text.aleft)
    $.editable.click(btns.aright,$.editable.fns.text.aright)
    $.editable.click(btns.acenter,$.editable.fns.text.acenter)
    $.editable.click(btns.ajustify,$.editable.fns.text.ajust)
    
    //adiciona umagem
    $.editable.click(btns.image,$.editable.dialogs.imagem)
    
    
    //heading
    if (btns.heading !== undefined) {
        btns.heading.change(function () {
            var val = $(this).find('option:selected').val();
            if (val === '0') {
                document.execCommand('formatBlock', false, 'p');
            } else {
                document.execCommand('formatBlock', false, 'h' + val);
            }
        })
    }
}