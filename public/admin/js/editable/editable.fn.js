
$.editable.fns = {
    private:{
        exec: function(aCommandName,aShowDefaultUI,aValueArgument){
            document.execCommand(aCommandName,aShowDefaultUI,aValueArgument);
        }
    },
    additem: function (html) {
        if (window.getSelection) {
            var sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                var range = window.getSelection().getRangeAt(0);
                var node = range.createContextualFragment(html);
                range.insertNode(node);
            }
        } else if (document.selection && document.selection.createRange) {
            document.selection.createRange().pasteHTML(html);
        }
    },
    text:{
        bold: function(){
            $.editable.fns.private.exec('Bold',false,null);
        },
        italic: function(){
            $.editable.fns.private.exec('Italic',false,null);
        },
        underline: function(){
            $.editable.fns.private.exec('underline',false,null);
        },
        aleft: function(){
            $.editable.fns.private.exec("justifyLeft", false, null);
        },
        acenter: function(){
            $.editable.fns.private.exec("justifyCenter", false, null);
        },
        aright: function(){
            $.editable.fns.private.exec("justifyRight", false, null);
        },
        ajust: function(){
            $.editable.fns.private.exec("justifyFull", false, null);
        }
    }
};