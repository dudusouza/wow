<?php
/* Smarty version 3.1.30, created on 2016-09-13 16:27:55
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\lister.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d8533b6d57b2_26560656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d1f5838f9568d62a5a07742e29feab489d60a2f' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\lister.tpl',
      1 => 1473794794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d8533b6d57b2_26560656 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form>
    <div class="panel-body">
        <div class='panel-group'>
            <?php if ($_smarty_tpl->tpl_vars['ff']->value) {?>
            <h3 class='title-filter'>Filtro</h3>
            <div class='filter'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrFilter']->value, 'arr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->value) {
?>
                    <div class='form-group'>
                        <label class='control-label'>
                            <?php echo $_smarty_tpl->tpl_vars['arr']->value['label'];?>

                        </label>
                        <div>
                            <?php echo $_smarty_tpl->tpl_vars['arr']->value['html'];?>

                        </div>
                    </div>
                    <div class="hr-dashed"></div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                    <button class="btn btn-danger limpar-filtro" type="button">Limpar</button>
                </div>
            </div>
        </div>
        <hr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['fi']->value) {?>
            <div class='form-group'>
                <a class='btn btn-success additem' href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
insert'>Adicionar</a>
            </div>
            <hr/>
        <?php }?>
        <table class="table table-striped table-bordered table-list table-hover <?php if ($_smarty_tpl->tpl_vars['sortField']->value) {?>sortable-table<?php }?>">
            <thead>
                <tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrColumns']->value, 'column', false, 'name');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['column']->value) {
?>
                        <th data-name='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['column']->value;?>
</th>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <th width="200"><em class="fa fa-cog"></em></th>
                </tr> 
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrData']->value, 'arr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->value) {
?>
                    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['arr']->value['__PK__'];?>
">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'field', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['field']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['k']->value != '__PK__') {?>
                                <td><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</td>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <td align="center">
                            <?php if ($_smarty_tpl->tpl_vars['fu']->value) {?>
                                <a href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
update/<?php echo $_smarty_tpl->tpl_vars['arr']->value['__PK__'];?>
' class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['fd']->value) {?>
                                <a href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
remove/<?php echo $_smarty_tpl->tpl_vars['arr']->value['__PK__'];?>
' class="btn btn-danger remove-item"><em class="fa fa-trash"></em></a>
                                <?php }?>
                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col col-xs-4">Página <?php echo $_smarty_tpl->tpl_vars['curpage']->value;?>
 de <?php echo $_smarty_tpl->tpl_vars['lastpage']->value;?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['lastpage']->value > 1) {?>
                <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['lastpage']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['lastpage']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
                            <?php }
}
?>

                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            <?php }?>
        </div>
    </div>
    <input type="hidden" name="--pg--" value="<?php echo $_smarty_tpl->tpl_vars['curpage']->value;?>
" id='pager'/>
</form><?php }
}
