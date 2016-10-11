<?php
/* Smarty version 3.1.30, created on 2016-09-21 09:14:56
  from "C:\wamp\www\structure\site\protected\viewc\template\compras\dados.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e279c0134db1_43787018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4023505c531c0fdfdd5bb9a6987061abd59f9988' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\viewc\\template\\compras\\dados.tpl',
      1 => 1474460094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e279c0134db1_43787018 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div  style="font-size: 16px; color: #666;">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="row">
                <div class="col-md-2"><b>Código</b></div>
                <div class="col-md-8" style="color: #999">#<?php echo $_smarty_tpl->tpl_vars['tbl']->value['request_id'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>Nome</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['nome'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>Email</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['email'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>Telefone</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['fone'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>CPF</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['cpf'];?>
</div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>RG</b></div>
                <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['rg'];?>
</div>
            </div>
        </div>
        <?php if (count($_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'])) {?>
            <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-md-4"><b>Tipo de compra</b></div>
                    <div class="col-md-8">Cartão</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>Bandeira</b></div>
                    <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'][0]['brand'];?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>Numero</b></div>
                    <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'][0]['number_card'];?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>CVV</b></div>
                    <div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'][0]['cvv'];?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>Nome</b></div>
                    <div class="col-md-8"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'][0]['usuario'], 'UTF-8');?>
</div>
                </div>
                <div class="row">
                    <div class="col-md-4"><b>Vencimento</b></div>
                    <div class="col-md-8"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemCartao'][0]['validade'], 'UTF-8');?>
</div>
                </div>
            </div>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemBoleto'])) {?>
            <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-md-4"><b>Tipo de compra</b></div>
                    <div class="col-md-8">Boleto</div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
hospedagem/boleto/hash/<?php echo $_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemBoleto'][0]['hash'];?>
" target="_blank" class="btn btn-primary">Ver Boleto</a>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <div class="col-md-12">
            Serviço Contratado: 
            <b>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemRequestItem'], 'arrItem', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['arrItem']->value) {
?>
                    <?php echo $_smarty_tpl->tpl_vars['arrItem']->value['nome'];?>

                    <?php if ($_smarty_tpl->tpl_vars['k']->value < count($_smarty_tpl->tpl_vars['tbl']->value['TblHospedagemRequestItem'])-1) {?>
                        ,
                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </b>
            <br>
        </div>
    </div>
</div><?php }
}
