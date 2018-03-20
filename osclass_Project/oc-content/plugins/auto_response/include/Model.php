<?php

/* 
 * Copyright (C) 2016 Puiu Calin
 * This program is a commercial software: is forbidden to use this software without licence, 
 * on multiple installations, and by purchasing from other source than those authorized for the sale of software.
 * Unauthorized copying of this file, via any medium is strictly prohibited
 */
class Auto_Response extends DAO {

    private static $instance;

    public static function newInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct();
    }

    
    public function install(){
        $this->email_templates();
    }
    
    public function uninstall(){
        Page::newInstance()->deleteByInternalName('auto_response_message');
    }
    
    public function email_templates(){
        //email for auto response message
        $description[osc_language()]['s_title'] = '[{WEB_TITLE}] Automatic response to contact.';
        $description[osc_language()]['s_text'] = '<p>Hi <strong>{CONTACT_NAME}</strong>!</p><p>Thank you for contacting us!</p><p>This is an automatic response to an email sent to us using the contact page from our site, we will contact you as soon as possible.</p><p>Please do not reply on this message, because this is a message generated automatic.</p><p>Regards,</p><p>{WEB_LINK}</p>';
        Page::newInstance()->insert(array('s_internal_name' => 'auto_response_message', 'b_indelible' => '1'), $description);
        
    }
}