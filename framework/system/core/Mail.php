<?php


namespace system\core;

/**
 * Description of Mail
 *
 * @author eduardo
 */
class Mail extends \PHPMailer{
    
    /**
     * Smarty template
     * @var \Smarty
     */
    private $template;
    
    public function __construct($exceptions = null) {
        parent::__construct($exceptions);
        $this->setSmtp();
        $this->configureSmary();
    }
    
    /**
     * Configura o smarty
     */
    private function configureSmary(){
        $this->template = new \Smarty();
        $this->template->setCompileDir(PROTECTED_PATH.'cache/compile/');
        $this->template->setCacheDir(PROTECTED_PATH.'cache/cache/');
        $this->template->setTemplateDir(PROTECTED_PATH.'mail/');
        $this->template->assign('SITE_URL', SITE_URL);
    }
    
    /**
     * Seta o SMTP caso o usuario usar
     */
    private function setSmtp(){
        $isSmtp = Config::get('config_is_smtp');
        if($isSmtp==1){
            $this->isSMTP();
            $this->Debugoutput = 'html';
            $this->Host = Config::get('config_smtp_server');
            $this->Port = Config::get('config_smtp_port');
            $this->SMTPAuth = true;
            $this->Username = Config::get('config_smtp_user');
            $this->Password = Config::get('config_smtp_pass');
            $secure = Config::get('config_smtp_secure');
            if(!is_null($secure) and !empty($secure)){
                $this->SMTPSecure = $secure;
            }
        }
    }
    
    /**
     * Assina variavel de template
     * @param string $var
     * @param mixed $val
     */
    public function assign($var,$val){
        $this->template->assign($var, $val);
    }
    
    /**
     * Envia o email
     */
    public function send() {
        $this->setFrom(Config::get('config_email'), Config::get('config_site_name'));
        return parent::send();
    }
    
    /**
     * Envia o email apartir de um template
     * @param string $tpl arquivo do template
     */
    public function sendHtml($tpl) {
        $this->isHTML();
        $this->Body = $this->template->fetch($tpl);
        $this->setFrom(Config::get('config_email'), Config::get('config_site_name'));
        return parent::send();
    }
    
}
