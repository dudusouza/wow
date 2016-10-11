$.editable.paletefn = {
    arrPaletItens: [],
    /**
     * habilita ou desabilita um item
     * @param {bool} enable true habilita e false desabilita
     * @param {object} object element item para habilitar ou desabilitar
     * @returns {undefined}
     */
    enableDisable: function (enable, item) {
        if (!enable) {
            item.attr("disable", true).addClass("disable");
        } else {
            item.removeAttr("disable").removeClass("disable");
        }
    },
    /**
     * Verifica se foi selecionado um texto em algum conteneditable
     * @returns {Boolean}
     */
    isSelected: function () {
        var text = "", element;
        if (window.getSelection) {
            text = window.getSelection().toString();
            var focusnode = window.getSelection().focusNode;
            if (focusnode !== null) {
                if (focusnode.parentNode !== undefined) {
                    element = focusnode.parentNode
                } else {
                    element = focusnode.parentElement;
                }
            } else if (focusnode === undefined) {
                element = window.getSelection().focusNode.parentNode
            } else {
                element = document;
            }
        } else if (document.getSelection) {
            text = document.getSelection().toString();
            if (document.getSelection().anchorNode !== null) {
                element = document.getSelection().anchorNode.parentElement;
            } else {
                element = document;
            }
        } else {
            var selection = document.selection && document.selection.createRange();
            element = selection.getSelection().focusNode.parentElement;
            if (selection.text) {
                text = selection.text.toString();
                element = selection.focusNode.parentElement;
            }
            return false;
        }
        if (text !== "") {
            var iseditable = !$(element).is('[notpalet]') || $(element).parents('[adm-field]').is('[notpalet]');
            if ($(element).is('[contenteditable]') || ($(element).parents('[contenteditable]').length > 0 && iseditable)) {
                return true;
            }
        }

        return false;

    },
    /**
     * Habilita ou desabilita quanto houver ou nao texto selecionado
     * @param {bool} enable
     * @returns {undefined}
     */
    enableSelection: function (enable) {
        $.each($.editable.itens.btnsSelections, function (index, val) {
            var item = $.editable.itens.btns[val];
            $.editable.paletefn.enableDisable(enable, item);
        })
    },
    /**
     * Habilita ou desabilita quanto estiver ou não focado no objeto editavel
     * @param {type} enable
     * @returns {undefined}
     */
    enable: function (enable) {
        $.each($.editable.itens.btns, function (index, item) {
            if ($.inArray(index, $.editable.itens.btnsSelections).toString() === '-1') {
                $.editable.paletefn.enableDisable(enable, item);
            }
        })
    },
    /**
     * Faz o tooble conforme a seleção dentro do contenteditable
     * @returns {undefined}
     */
    selectToggle: function () {
        var element = $(document.activeElement)

        $.editable.paletefn.enableSelection(($.editable.paletefn.isSelected()));
    },
    /**
     * Faz o tooble conforme a seleção dentro do contenteditable
     * @returns {undefined}
     */
    focusToggle: function () {
        var pureelement = window.getSelection().focusNode;
        var element = $(pureelement === null ? window : window.getSelection().focusNode.parentNode)
        var elementparemt = element.parent('[contenteditable]')
        var ispalet = element.hasClass('editable-palete') || element.parents('.editable-palete').length > 0;
        var iseditable = !(element.is('[notpalet]') || element.parent('[adm-field]').is('[notpalet]'));
        $.editable.paletefn.enable((element.is('[contenteditable]') || elementparemt.length > 0) && iseditable);
    },
    /**
     * Adiciona um item na paleta
     * @param {object} item
     */
    addItem: function (item) {
        this.arrPaletItens.push(item);
    },
    /**
     * Adiciona um item na paleta
     * @param {type} item
     * @returns {undefined}
     */
    getItens: function (palete) {
        $.each(this.arrPaletItens, function (index, val) {
            var div = $('<div/>');
            div.addClass('editable-palete-extraitem').append(val).appendTo(palete);
        });
    },
    openclose: function (palete) {
        $(palete).toggleClass('editable-open');
        $(palete).toggleClass('editable-close');
        if ($(palete).hasClass('editable-open')) {
            $(palete).find('.editable-more').hide();
            $(palete).find('.editable-minus').show();
            $.editable.helper.setCookie('editable.palete.state','open');
        } else {
            $(palete).find('.editable-more').show();
            $(palete).find('.editable-minus').hide();
            $.editable.helper.setCookie('editable.palete.state','close');
        }
    }
}

$.editable.helper = {
    getCookie: function (cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
    setCookie: function (cname, cvalue, exdays) {
        var d = new Date();
        if(exdays==undefined){
            exdays=31;
        }
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

}