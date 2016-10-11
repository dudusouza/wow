$.editable = {};
$.editable.init = function () {
    $.editable.palete();
    var palete = $('.editable-palete');
    var drager = $('.editable-drag', palete);
    var left = $.editable.helper.getCookie('editable.palete.left');
    var top = $.editable.helper.getCookie('editable.palete.top');
    if(top!="" && left!=""){
        $(palete).css({
            top:top+'px',
            left:left+'px'
        });
    }
    $(palete).draggable({
        handle: drager,
        stop: function( event, ui ) {
            $.editable.helper.setCookie('editable.palete.left', ui.offset.left);
            $.editable.helper.setCookie('editable.palete.top', ui.offset.top);
        }
    });
}
/**
 * Executa apenas se for defined
 * @param {type} obj
 * @param {type} fn
 * @returns {undefined}
 */
$.editable.click = function (obj, fn) {
    if (obj !== undefined) {
        $(obj).click(function () {
            if ($(this).attr("disable") === undefined) {
                fn();
            }
        });
    }
}