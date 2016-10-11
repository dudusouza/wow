<?php
/* Smarty version 3.1.30, created on 2016-10-06 10:22:29
  from "C:\wamp\www\sites\estrutura2\protected\module\admin\view\templates\fields\text\yesno.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f65015e0c259_13185304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1816457eb61ad53258c49132db780d60f74bb12' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura2\\protected\\module\\admin\\view\\templates\\fields\\text\\yesno.tpl',
      1 => 1473797467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f65015e0c259_13185304 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="radio  col-md-2 col-lg-1">
    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="0" <?php if ($_smarty_tpl->tpl_vars['val']->value == 0) {?>checked<?php }?> class='form-control' />
    <label for="radio1">
        Não
    </label>
</div>
<div class="radio col-md-2 col-lg-1">
    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['val']->value == 1) {?>checked<?php }?> class='form-control' />
    <label for="radio2">
        Sim
    </label>
</div><?php }
}
