<?php
/* Smarty version 3.1.30, created on 2016-09-20 15:38:36
  from "C:\wamp\www\structure\site\protected\mail\boleto.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e1822ca41687_29476154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7d523c36bed14ea76e371f49f540c38c17ba5e7' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\mail\\boleto.tpl',
      1 => 1474396685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e1822ca41687_29476154 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html "-//w3c//dtd xhtml 1.0 transitional //en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>
        <!--[if gte mso 9]><xml>
         <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
         </o:OfficeDocumentSettings>
        </xml><![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width">
                <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
                    <title>Template Base</title>


                    </head>
                    <body style="width: 100% !important;min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100% !important;margin: 0;padding: 0;background-color: #FFFFFF">
                        <style id="media-query">
                            /* Client-specific Styles & Reset */
                            #outlook a {
                                padding: 0;
                            }

                            /* .ExternalClass applies to Outlook.com (the artist formerly known as Hotmail) */
                            .ExternalClass {
                                width: 100%;
                            }

                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                                line-height: 100%;
                            }

                            #backgroundTable {
                                margin: 0;
                                padding: 0;
                                width: 100% !important;
                                line-height: 100% !important;
                            }

                            /* Buttons */
                            .button a {
                                display: inline-block;
                                text-decoration: none;
                                -webkit-text-size-adjust: none;
                                text-align: center;
                            }

                            .button a div {
                                text-align: center !important;
                            }

                            /* Outlook First */
                            body.outlook p {
                                display: inline !important;
                            }

                            /*  Media Queries */
                            @media only screen and (max-width: 500px) {
                                table[class="body"] img {
                                    height: auto !important;
                                    width: 100% !important; }
                                table[class="body"] img.fullwidth {
                                    max-width: 100% !important; }
                                table[class="body"] center {
                                    min-width: 0 !important; }
                                table[class="body"] .container {
                                    width: 95% !important; }
                                table[class="body"] .row {
                                    width: 100% !important;
                                    display: block !important; }
                                table[class="body"] .wrapper {
                                    display: block !important;
                                    padding-right: 0 !important; }
                                table[class="body"] .columns, table[class="body"] .column {
                                    table-layout: fixed !important;
                                    float: none !important;
                                    width: 100% !important;
                                    padding-right: 0px !important;
                                    padding-left: 0px !important;
                                    display: block !important; }
                                table[class="body"] .wrapper.first .columns, table[class="body"] .wrapper.first .column {
                                    display: table !important; }
                                table[class="body"] table.columns td, table[class="body"] table.column td, .col {
                                    width: 100% !important; }
                                table[class="body"] table.columns td.expander {
                                    width: 1px !important; }
                                table[class="body"] .right-text-pad, table[class="body"] .text-pad-right {
                                    padding-left: 10px !important; }
                                table[class="body"] .left-text-pad, table[class="body"] .text-pad-left {
                                    padding-right: 10px !important; }
                                table[class="body"] .hide-for-small, table[class="body"] .show-for-desktop {
                                    display: none !important; }
                                table[class="body"] .show-for-small, table[class="body"] .hide-for-desktop {
                                    display: inherit !important; }
                                .mixed-two-up .col {
                                    width: 100% !important; } }
                            @media screen and (max-width: 500px) {
                                div[class="col"] {
                                    width: 100% !important;
                                }
                            }

                            @media screen and (min-width: 501px) {
                                table[class="container"] {
                                    width: 500px !important;
                                }
                            }
                        </style>
                        <table class="body" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 100%;width: 100%;table-layout: fixed" cellpadding="0" cellspacing="0" width="100%" border="0">
                            <tbody><tr style="vertical-align: top">
                                    <td class="center" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;background-color: #FFFFFF" align="center" valign="top">

                                        <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #EEEEEE" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
                                            <tbody><tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
                                                        <!--[if gte mso 9]>
                                                        <table id="outlookholder" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        <table width="500" align="center" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td>
                                                        <![endif]-->
                                                        <table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid two-up" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" bgcolor="transparent" cellpadding="0" cellspacing="0" border="0"><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign="top" width="250"><![endif]--><div class="col num6" style="display: inline-block;vertical-align: top;text-align: center;width: 250px"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 20px;padding-right: 0px;padding-bottom: 5px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;width: 100%;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px" align="center">
                                                                                                                            <div style="font-size:12px" align="center">
                                                                                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
" target="_blank">
                                                                                                                                    <img class="center" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block;border: none;height: auto;line-height: 100%;margin: 0 auto;float: none;width: 88px;max-width: 88px" align="center" border="0" src="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
public/img/tormin.png" alt="Image" title="Image" width="88">
                                                                                                                                </a>

                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                        </td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]><td valign="top" width="250"><![endif]--><div class="col num6" style="display: inline-block;vertical-align: top;text-align: center;width: 250px"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 20px;padding-right: 0px;padding-bottom: 20px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">&nbsp;</td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                        </td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                                                        <!--[if mso]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #fff" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
                                            <tbody><tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
                                                        <!--[if gte mso 9]>
                                                        <table id="outlookholder" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        <table width="500" align="center" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td>
                                                        <![endif]-->
                                                        <table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #000000;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" bgcolor="transparent" cellpadding="0" cellspacing="0" border="0"><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign="top" width="500"><![endif]--><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
                                                                                                                            <div style="height: 10px;">
                                                                                                                                <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
                                                                                                                                    <tbody><tr style="vertical-align: top">
                                                                                                                                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center"></td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody></table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px">
                                                                                                                            <div style="color:#445B88;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;">            
                                                                                                                                <div style="font-size:12px;line-height:14px;color:#445B88;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><strong><span style="font-size: 28px; line-height: 33px;">Plano <?php echo $_smarty_tpl->tpl_vars['plano']->value;?>
</span></strong></p></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                            <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
                                                                                                                            <div style="color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;">            
                                                                                                                                <div style="font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 12px;line-height: 14px;text-align: center"><span style="font-size: 18px; line-height: 21px;">Ol&#225;, <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</span></p><p style="margin: 0;font-size: 12px;line-height: 14px;text-align: center"><span style="font-size: 18px; line-height: 21px;">Voc&#234; adquiriu o Plano <?php echo $_smarty_tpl->tpl_vars['plano']->value;?>
 no valor de R$ <?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
</span></p></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                            <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
                                                                                                                            <div style="height: 10px;">
                                                                                                                                <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
                                                                                                                                    <tbody><tr style="vertical-align: top">
                                                                                                                                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center"></td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody></table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
                                                                                                                            <div style="height: 10px;">
                                                                                                                                <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 10px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
                                                                                                                                    <tbody><tr style="vertical-align: top">
                                                                                                                                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center"></td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody></table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                                                        <!--[if mso]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #445B88" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
                                            <tbody><tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
                                                        <!--[if gte mso 9]>
                                                        <table id="outlookholder" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        <table width="500" align="center" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td>
                                                        <![endif]-->
                                                        <table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" bgcolor="transparent" cellpadding="0" cellspacing="0" border="0"><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign="top" width="500"><![endif]--><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 25px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
                                                                                                                            <div style="color:#ffffff;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;">            
                                                                                                                                <div style="font-size:12px;line-height:14px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 18px;line-height: 22px;text-align: center"><span style="font-size: 24px; line-height: 28px;"><strong>Para gerar o boleto clique no bot&#227;o abaixo</strong></span></p></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                            <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td class="button-container" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
                                                                                                                            <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                                        <td class="button" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%" align="center" valign="middle">
                                                                                                                                            <!--[if mso]>
                                                                                                                                              <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href=""
                                                                                                                                                style="
                                                                                                                                                  height:42px;
                                                                                                                                                  v-text-anchor:middle;
                                                                                                                                                  width:266px;"
                                                                                                                                                  arcsize="60%"
                                                                                                                                                  strokecolor="#c4c4c4"
                                                                                                                                                  fillcolor="#c4c4c4" >
                                                                                                                                              <w:anchorlock/>
                                                                                                                                                <center 
                                                                                                                                                  style="color:#445B88;
                                                                                                                                                    font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;
                                                                                                                                                    font-size:16px;">
                                                                                                                                            <![endif]-->
                                                                                                                                            <!--[if !mso]><!- - --><div style="display: inline-block;
                                                                                                                                                                        border-radius: 25px; 
                                                                                                                                                                        -webkit-border-radius: 25px; 
                                                                                                                                                                        -moz-border-radius: 25px; 
                                                                                                                                                                        max-width: 50%;
                                                                                                                                                                        width: 100%;
                                                                                                                                                                        border-top: 0px solid transparent;
                                                                                                                                                                        border-right: 0px solid transparent;
                                                                                                                                                                        border-bottom: 0px solid transparent;
                                                                                                                                                                        border-left: 0px solid transparent;" align="center">

                                                                                                                                                <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;height: 42" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                                                    <tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;border-radius: 25px;                   -webkit-border-radius: 25px;                   -moz-border-radius: 25px;                  color: #445B88;                  background-color: #c4c4c4;                  padding-top: 5px;                   padding-right: 20px;                  padding-bottom: 5px;                  padding-left: 20px;                  font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align: center" valign="middle"><!--<![endif]-->
                                                                                                                                                                <a style="display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;background-color: #c4c4c4;color: #445B88" href="<?php echo $_smarty_tpl->tpl_vars['urlboleto']->value;?>
" target="_blank">
                                                                                                                                                                    <span style="font-size:16px;line-height:32px;"><span style="font-size: 16px; line-height: 32px;" data-mce-style="font-size: 16px;"><strong><span style="line-height: 32px; font-size: 16px;" data-mce-style="line-height: 28px;">Gerar Boleto</span></strong></span></span>
                                                                                                                                                                </a>
                                                                                                                                                                <!--[if !mso]><!- - --></td></tr></tbody></table>
                                                                                                                                            </div><!--<![endif]-->
                                                                                                                                            <!--[if mso]>
                                                                                                                                                  </center>
                                                                                                                                              </v:roundrect>
                                                                                                                                            <![endif]-->
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody></table>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                            <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px" align="center">
                                                                                                                            <div style="height: 0px;">
                                                                                                                                <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;border-top: 0px solid transparent;width: 100%" align="center" border="0" cellspacing="0">
                                                                                                                                    <tbody><tr style="vertical-align: top">
                                                                                                                                            <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" align="center"></td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody></table>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table></td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                                                        <!--[if mso]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        <table style="border-spacing: 0;border-collapse: collapse;vertical-align: top;background-color: #C4C4C4" cellpadding="0" cellspacing="0" align="center" width="100%" border="0">
                                            <tbody><tr style="vertical-align: top">
                                                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%">
                                                        <!--[if gte mso 9]>
                                                        <table id="outlookholder" border="0" cellspacing="0" cellpadding="0" align="center"><tr><td>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        <table width="500" align="center" cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td>
                                                        <![endif]-->
                                                        <table class="container" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;max-width: 500px;margin: 0 auto;text-align: inherit" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top" width="100%"><table class="block-grid" style="border-spacing: 0;border-collapse: collapse;vertical-align: top;width: 100%;max-width: 500px;color: #333;background-color: transparent" cellpadding="0" cellspacing="0" width="100%" bgcolor="transparent"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;text-align: center;font-size: 0"><!--[if (gte mso 9)|(IE)]><table width="100%" align="center" bgcolor="transparent" cellpadding="0" cellspacing="0" border="0"><tr><![endif]--><!--[if (gte mso 9)|(IE)]><td valign="top" width="500"><![endif]--><div class="col num12" style="display: inline-block;vertical-align: top;width: 100%"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" align="center" width="100%" border="0"><tbody><tr style="vertical-align: top"><td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;background-color: transparent;padding-top: 30px;padding-right: 0px;padding-bottom: 30px;padding-left: 0px;border-top: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-left: 0px solid transparent"><table style="border-spacing: 0;border-collapse: collapse;vertical-align: top" cellpadding="0" cellspacing="0" width="100%">
                                                                                                                <tbody><tr style="vertical-align: top">
                                                                                                                        <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-top: 15px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px">
                                                                                                                            <div style="color:#959595;line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;">            
                                                                                                                                <div style="font-size:12px;line-height:18px;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;"><p style="margin: 0;font-size: 14px;line-height: 21px;text-align: center">Copyright &#169; 2011 WebTor. Todos os direitos reservados</p></div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody></table>
                                                                                                        </td></tr></tbody></table></div><!--[if (gte mso 9)|(IE)]></td><![endif]--><!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]--></td></tr></tbody></table></td></tr></tbody></table>
                                                        <!--[if mso]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                        <!--[if (IE)]>
                                                        </td></tr></table>
                                                        <![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>


                    </body></html><?php }
}
