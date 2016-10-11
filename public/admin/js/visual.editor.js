$.visual = {editor: {}};
$(function () {
    $('[adm-field]').attr('contenteditable', true);
    $.visual.editor.save.create();
    $.visual.editor.add.addbtn();
    $.visual.editor.add.addBtnRemove();
    $.editable.init();
})