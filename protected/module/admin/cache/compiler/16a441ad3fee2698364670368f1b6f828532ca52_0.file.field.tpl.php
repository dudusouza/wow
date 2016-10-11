<?php
/* Smarty version 3.1.30, created on 2016-10-06 10:22:30
  from "C:\wamp\www\sites\estrutura2\protected\module\admin\view\templates\fields\select\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f650160c5ce3_52665911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16a441ad3fee2698364670368f1b6f828532ca52' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura2\\protected\\module\\admin\\view\\templates\\fields\\select\\field.tpl',
      1 => 1473707947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f650160c5ce3_52665911 (Smarty_Internal_Template $_smarty_tpl) {
?>
<select class='form-control' name='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' >
    <option <?php if ($_smarty_tpl->tpl_vars['val']->value == '') {?>selected<?php }?>></option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'label', false, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value => $_smarty_tpl->tpl_vars['label']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['val']->value == $_smarty_tpl->tpl_vars['value']->value) && ($_smarty_tpl->tpl_vars['val']->value != '')) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</select><?php }
}
