<?php

/*
 * Copyright (C) 2016 Puiu Calin
 * This program is a commercial software: is forbidden to use this software without licence, 
 * on multiple installations, and by purchasing from other source than those authorized for the sale of software.
 * Unauthorized copying of this file, via any medium is strictly prohibited
 */

function auto_response_send_auto_email($name, $email) {
    $mPages = new Page();
    $aPage = $mPages->findByInternalName('auto_response_message');
    $locale = osc_current_user_locale();
    $content = array();
    if (isset($aPage['locale'][$locale]['s_title'])) {
        $content = $aPage['locale'][$locale];
    } else {
        $content = current($aPage['locale']);
    }
    if (empty($name)) {
        $name = __('visitor', 'auto_response');
    }
    $web_link = '<a href="' . osc_base_url() . '">' . osc_page_title() . '</a>';

    $words = array();
    $words[] = array('{WEB_TITLE}', '{CONTACT_NAME}', '{WEB_LINK}');
    $words[] = array(osc_page_title(), $name, $web_link);

    $title = osc_mailBeauty($content['s_title'], $words);
    $body = osc_mailBeauty($content['s_text'], $words);

    $emailParams = array('subject' => $title
        , 'to' => $email
        , 'to_name' => $name
        , 'body' => $body
        , 'alt_body' => $body);

    osc_sendMail($emailParams);
}
