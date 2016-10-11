$.editable.palete = function () {
    var palete = $('<div/>').addClass('editable-palete');
    var minus = $('<div/>').addClass('editable-minus');
    var more = $('<div/>').addClass('editable-more');
    var drager = $('<div/>').addClass('editable-drag');
    var btnsdiv = $('<div/>').addClass('btns');
    var titulo = $('<div/>').addClass('title');
    $('<i/>').addClass('glyphicon glyphicon-plus').appendTo(more);
    $('<i/>').addClass('glyphicon glyphicon-minus').appendTo(minus);
    $('<i/>').addClass('glyphicon glyphicon-option-horizontal').appendTo(drager);
    $.editable.itens.btns = {
        titleText: titulo.clone().html('Texto'),
        bold: this.btns.btnBold(),
        italic: this.btns.btnItalico(),
        underline: this.btns.btnUnderline(),
        titleAlign: titulo.clone().html('Alinhamento'),
        aleft: this.btns.btnAleft(),
        acenter: this.btns.btnAcenter(),
        aright: this.btns.btnAright(),
        ajustify: this.btns.btnAJustify(),
        heading: this.btns.btnHeading(),
        hr1: $('<hr/>'),
        titleInsert: titulo.clone().html('Inserir'),
        image: this.btns.btnImagem(),
        hrEnd: $('<hr/>')
    }
    $.editable.itens.btnsSelections = ['bold', 'italic'];
    $.editable.actions($.editable.itens.btns);
    $.each($.editable.itens.btns, function (index, value) {
        btnsdiv.append(value);
    })
    palete.append(minus);
    palete.append(more);
    palete.append(drager);
    palete.append(btnsdiv);
    $('body').append(palete);
    $.editable.paletefn.focusToggle();
    $.editable.paletefn.selectToggle();
    $(document).click(function () {
        $.editable.paletefn.focusToggle()
    }).on('mouseup keyup', function () {
        $.editable.paletefn.selectToggle();
    });
    $.editable.paletefn.getItens(palete);
    var state = $.editable.helper.getCookie('editable.palete.state');
    if (state == 'open') {
        palete.addClass('editable-close');
    }else{
        palete.addClass('editable-open');
    }
    $.editable.paletefn.openclose(palete);
    $(minus).click(function () {
        $.editable.paletefn.openclose(palete);
    })
    $(more).click(function () {
        $.editable.paletefn.openclose(palete);
    })
    return palete;
}


