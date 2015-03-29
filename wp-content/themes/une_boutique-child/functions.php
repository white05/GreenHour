<?php
/**
 * Une Boutique functions and definitions
 *
 * @package Une Boutique
 */

/*-----------------------------------------------------------------------------------*/
/*   Load Option Tree Theme Mode (theme options)
/*-----------------------------------------------------------------------------------*/

add_filter('loginout','loginout_text_change');
function loginout_text_change($text) {
$login_text_before = '登入';
$login_text_after = 'LOG IN';

$logout_text_before = '登出';
$logout_text_after = 'LOG OUT';

$text = str_replace($login_text_before, $login_text_after ,$text);
$text = str_replace($logout_text_before, $logout_text_after ,$text);
return $text;
}

add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
        ob_start();
        wp_loginout('index.php');
        $loginoutlink = ob_get_contents();
        ob_end_clean();
        $items .= '<li>'. $loginoutlink .'</li>';
    return $items;
}



