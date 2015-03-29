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

function greenhour_menu_func($attr, $content) {
	$return_content = '[vc_row bg_type="image" bg_grad="background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FBFBFB), color-stop(50%, #E3E3E3), color-stop(100%, #C2C2C2));background: -moz-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -webkit-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -o-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -ms-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);" parallax_style="vcpb-default" bg_image_new="36" bg_image_repeat="repeat" bg_image_size="contain" bg_img_attach="scroll" parallax_sense="30" animation_direction="left-animation" animation_repeat="repeat" bg_override="0" disable_on_mobile_img_parallax="off" parallax_content_sense="30" fadeout_start_effect="30" overlay_pattern_opacity="80" seperator_type="none_seperator" seperator_position="top_seperator" seperator_shape_size="40" seperator_svg_height="60" seperator_shape_background="#ffffff" seperator_shape_border="none" seperator_shape_border_width="1" icon_type="no_icon" icon_size="32" icon_style="none" icon_color_border="#333333" icon_border_size="1" icon_border_radius="500" icon_border_spacing="50" img_width="48" row_layout="full" el_class="page_row menu" css=".vc_custom_1427611572764{margin-bottom: 0px !important;}"][vc_column width="1/1"][vc_column_text css=".vc_custom_1427035410611{margin-bottom: 10px !important;}"]
<h5 style="text-align: center;"><span style="border-bottom: 3px solid #000; color: #000000;">MENU</span></h5>
[/vc_column_text][vc_tabs][vc_tab title="特製沙拉" tab_id="1427215865060-2-8"][vc_column_text][product_category category="salad" per_page="6" columns="3" orderby="date" order="desc" pagination="yes"][/vc_column_text][/vc_tab][vc_tab title="果汁" tab_id="1427215036-2-37"][vc_column_text][product_category category="drink" per_page="6" columns="3" orderby="date" order="desc" pagination="yes"][/vc_column_text][/vc_tab][vc_tab title="湯" tab_id="1427215036-1-42"][vc_column_text][product_category category="soup" per_page="6" columns="3" orderby="date" order="desc" pagination="yes"][/vc_column_text][/vc_tab][/vc_tabs][/vc_column][/vc_row]';
	return do_shortcode($return_content);
}
add_shortcode('greenhour_menu', 'greenhour_menu_func');

function greenhour_online_store_func($attr, $content) {
	$return_content = '[vc_row bg_type="image" bg_grad="background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FBFBFB), color-stop(50%, #E3E3E3), color-stop(100%, #C2C2C2));background: -moz-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -webkit-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -o-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: -ms-linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);background: linear-gradient(top,#FBFBFB 0%,#E3E3E3 50%,#C2C2C2 100%);" parallax_style="vcpb-default" bg_image_new="63" bg_image_repeat="no-repeat" bg_image_size="cover" bg_img_attach="scroll" parallax_sense="30" animation_direction="left-animation" animation_repeat="repeat" bg_override="0" disable_on_mobile_img_parallax="off" parallax_content_sense="30" fadeout_start_effect="30" overlay_pattern_opacity="80" seperator_type="none_seperator" seperator_position="top_seperator" seperator_shape_size="40" seperator_svg_height="60" seperator_shape_background="#ffffff" seperator_shape_border="none" seperator_shape_border_width="1" icon_type="no_icon" icon_size="32" icon_style="none" icon_color_border="#333333" icon_border_size="1" icon_border_radius="500" icon_border_spacing="50" img_width="48" row_layout="full" css=".vc_custom_1427611615917{margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}" el_class="row_center page_row2"][vc_column width="1/1" overlay_bg="rgba(255,255,255,0.3)" css=".vc_custom_1427616755228{background-color: rgba(255,255,255,0.5) !important;*background-color: rgb(255,255,255) !important;}" match_height="true" el_class="page_column_middle background_w"][vc_column_text]
<h2 style="text-align: center;"><span style="border-bottom: 3px solid #000; color: #000000; padding: 10px;">線上商店</span></h2>
<h4 style="text-align: center;"><span style="color: #000000;">線上商店</span></h4>
<h4 style="text-align: center;"><span style="color: #000000;">選購其他商品</span></h4>
[/vc_column_text][vc_button button_type="flat" title="進入線上商店" target="_self" color="wpb_button" size="wpb_regularsize" icon_position="right" text_size="14" custom_styles="true" custom_bg="rgba(10,10,10,0.5)" custom_color="#ffffff" href="/GreenHour/shop"][/vc_column][/vc_row]';
	return do_shortcode($return_content);
}

add_shortcode('greenhour_online_store', 'greenhour_online_store_func');

