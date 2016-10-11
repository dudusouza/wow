<?php
/* Smarty version 3.1.30, created on 2016-09-21 10:12:26
  from "C:\wamp\www\structure\site\protected\viewc\template\orcamento\dados.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2873a2af3f7_65898607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8241bdb74ade12f5272895661e28ae1805b3ecf' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\viewc\\template\\orcamento\\dados.tpl',
      1 => 1474463544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e2873a2af3f7_65898607 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\structure\\site\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<div  style="font-size: 16px; color: #666;">
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-4"><b>Código</b></div>
                <div class="col-md-8" style="color: #999">#<?php echo $_smarty_tpl->tpl_vars['tbl']->value['orcamento_id'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Nome</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['nome'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['email'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Telefone</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['telefone'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Area de atuação</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['areaatuacao'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Já possui domínio</b></div>
                <div class="col-md-8">
                    <?php if ($_smarty_tpl->tpl_vars['tbl']->value['possuidominio']) {?>
                        <span style="color: #006600">Sim</span>
                    <?php } else { ?>
                        <span style="color: #990000">Não</span>
                    <?php }?>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['tbl']->value['possuidominio'] != 1) {?>
                <div class="row">
                    <div class="col-md-4"><b>Deseja registrar um domínio?</b></div>
                    <div class="col-md-8">
                        <?php if ($_smarty_tpl->tpl_vars['tbl']->value['registrar']) {?>
                            <span style="color: #006600">Sim</span>
                        <?php } else { ?>
                            <span style="color: #990000">Não</span>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['tbl']->value['possuidominio'] == 1 || $_smarty_tpl->tpl_vars['tbl']->value['registrar'] == 1) {?>
                <div class="row">
                    <div class="col-md-4"><b>Domínio</b></div>
                    <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['dominio'];?>
</div>
                </div>
            <?php }?>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3"><b>Sites como referência</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['sitesreferencia'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-3"><b>Em relação ao logo</b></div>
                <div class="col-md-8">
                    <?php if ($_smarty_tpl->tpl_vars['tbl']->value['logo'] == "POSSUO") {?>
                        <span>Possuo</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['tbl']->value['logo'] == "NAOPOSSUO") {?>
                        <span>Não Possuo</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['tbl']->value['logo'] == "MELHORAR") {?>
                        <span>Quero Melhorar</span>
                    <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><b>Paginas</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['paginas'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-3"><b>Módulos</b></div>
                <div class="col-md-8" style="color: #006699">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tbl']->value['TblSiteOrcamentomodulos'], 'tblitem', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['tblitem']->value) {
?>
                        <?php echo $_smarty_tpl->tpl_vars['tblitem']->value['TblSiteModulos']['nome'];?>

                        <?php if ($_smarty_tpl->tpl_vars['k']->value < count($_smarty_tpl->tpl_vars['tbl']->value['TblSiteOrcamentomodulos'])-1) {?>
                            <br/>
                        <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><b>Oservações</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['obs'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-3"><b>Data</b></div>
                <div class="col-md-8"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value,"%d/%m/%Y");?>
</div>
            </div>
        </div>
    </div>
</div><?php }
}
