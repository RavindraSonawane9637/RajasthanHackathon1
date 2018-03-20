<?php
/*
 * Copyright (C) 2016 Puiu Calin
 * This program is a commercial software: is forbidden to use this software without licence, 
 * on multiple installations, and by purchasing from other source than those authorized for the sale of software.
 * Unauthorized copying of this file, via any medium is strictly prohibited
 */

/*
  Plugin Name: Auto Response
  Plugin URI: http://theme.calinbehtuk.ro/
  Description: Send an auto response message when user use your contact page.
  Version: 1.0.2
  Author: Puiu Calin
  Author URI: http://theme.calinbehtuk.ro/
  Plugin update URI: auto-response
  Short Name: auto-response
 */

require_once 'include/Model.php';
require_once 'include/Email.php';

define('AUTO_RESPONSE', '100');

function auto_response_install() {
    osc_set_preference('version', AUTO_RESPONSE, 'auto_response');
    osc_set_preference('send_email', '1', 'auto_response');
    Auto_Response::newInstance()->install();
}

function auto_response_uninstall() {
    Auto_Response::newInstance()->uninstall();
}

function auto_response_form_contact() {
    if (osc_get_preference('send_email', 'auto_response') == '1') {
        $yourName = Params::getParam('yourName');
        $yourEmail = Params::getParam('yourEmail');
        if (!empty($yourEmail)) {
            auto_response_send_auto_email($yourName, $yourEmail);
        }
    }
}

osc_add_hook('pre_contact_post', 'auto_response_form_contact');

function auto_response_admin_menu() {
    osc_admin_menu_plugins(__('Auto Response', 'auto_response'), osc_admin_render_plugin_url('auto_response/admin/settings.php'), 'auto_response_submenu');
}

osc_add_hook('admin_menu_init', 'auto_response_admin_menu');

function auto_response_actions() {
    switch (Params::getParam('auto_response_action_specific')) {
        case('auto_response_settings'):
            $send_email = Params::getParam('send_email');
            osc_set_preference('send_email', $send_email, 'auto_response');
            osc_add_flash_ok_message(__('Plugin settings updated correctly', 'auto_response'), 'admin');
            osc_redirect_to(osc_admin_render_plugin_url('auto_response/admin/settings.php'));
            break;
    }
}

osc_add_hook('init_admin', 'auto_response_actions');

//update version
if (OC_ADMIN) {
    if (AUTO_RESPONSE > osc_get_preference('version', 'auto_response')) {
        osc_set_preference('version', AUTO_RESPONSE, 'auto_response');
    }
}


osc_register_plugin(osc_plugin_path(__FILE__), 'auto_response_install');
osc_add_hook(osc_plugin_path(__FILE__) . "_uninstall", 'auto_response_uninstall');
