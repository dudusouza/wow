<?php

use admin\form\field;

/**
 * Configuração Geral do sistema
 *
 * @author eduardo
 */
class FormConfig extends admin\FormConfig{
    
    public function setup() {
        
        $tabsmtp = 'smtp-tab';
        $this->addTab($tabsmtp, 'SMTP');
        
        $emailContato = new field\Text('config_email', 'Email de contato');
        $this->addField($emailContato);
        
        $foneContato = new field\Text('config_fone', 'Telefone de contato');
        $this->addField($foneContato);
        
        $nome = new field\Text('config_site_name', 'Nome do site');
        $this->addField($nome);
        
        $issmtp = new field\YesNo('config_is_smtp', 'Enviar email via SMTP');
        $this->addField($issmtp);
        
        
        //configuração SMTP
        $smtpServer = new field\Text('config_smtp_server', 'Servidor');
        $this->addField($smtpServer,$tabsmtp);
        
        $smtpPort = new field\Text('config_smtp_port', 'Porta');
        $this->addField($smtpPort,$tabsmtp);
        
        $smtpUser = new field\Text('config_smtp_user', 'Usuário');
        $this->addField($smtpUser,$tabsmtp);
        
        $smtpPass = new field\Text('config_smtp_pass', 'Senha');
        $this->addField($smtpPass,$tabsmtp);
        
        $smtpSecure = new field\Select('config_smtp_secure', 'Segurança');
        $smtpSecure->addVal('tsl', 'TSL');
        $smtpSecure->addVal('ssl', 'SSL');
        $this->addField($smtpSecure,$tabsmtp);
        
    }
    
    
}
