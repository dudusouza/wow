<?php
/* Smarty version 3.1.30, created on 2016-09-14 11:40:07
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\html\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d96147e74ab4_92512082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c76950d08840969dba37e41f88863c975ec4f903' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\html\\field.tpl',
      1 => 1473864006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d96147e74ab4_92512082 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div data-max="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" data-counter="#counter-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-summernote" class="summernote" rel="#txt-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-summernote"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</div>
<sub class="max" id="counter-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-summernote"></sub>
<textarea class="hide" id="txt-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-summernote" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</textarea><?php }
}
