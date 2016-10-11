$.editable.itens = {btns:{},btnsSelections:[]};
$.editable.btns = {
    private: {
        /**
         * Cria um botão
         * @param {string} icon nome do icone da bliblioteca glyphicon, apenas o nome
         * @returns {$.editable.btns.private.btns.btn|$}
         */
        btns: function (icon, text) {
            var btn = $('<button/>');
            var i = $('<i/>');
            var span = $('<span/>').html(text);
            i.addClass('glyphicon glyphicon-' + icon);
            btn.append(i, span);
            return btn;
        },
    },
    btnImagem: function () {
        return this.private.btns('picture', 'Imagem');
    },
    btnBold: function () {
        return this.private.btns('bold', 'Negrito');
    },
    btnUnderline: function () {
        return this.private.btns('text-color', 'Sublinhado');
    },
    btnAleft: function () {
        return this.private.btns('align-left', 'Esquesda');
    },
    btnAcenter: function () {
        return this.private.btns('align-center', 'Centro');
    },
    btnAright: function () {
        return this.private.btns('align-right', 'Direita');
    },
    btnAJustify: function () {
        return this.private.btns('align-justify', 'Justificado');
    },
    btnHeading: function () {
        var select = $('<select/>');
        $('<option/>').val('0').html('Títulos').appendTo(select);
        $('<option/>').val('1').html('Título 1 (H1)').appendTo(select);
        $('<option/>').val('2').html('Título 2 (H2)').appendTo(select);
        $('<option/>').val('3').html('Título 3 (H3)').appendTo(select);
        $('<option/>').val('4').html('Título 4 (H4)').appendTo(select);
        $('<option/>').val('5').html('Título 5 (H5)').appendTo(select);
        $('<option/>').val('6').html('Título 6 (H6)').appendTo(select);

        return select;
    },
    btnItalico: function () {
        return this.private.btns('italic', 'Italico');
    }

}