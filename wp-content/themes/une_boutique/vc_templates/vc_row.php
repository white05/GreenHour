<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $row_layout = $data_attribute = $show_hide = $anything_slider = $autoplay = $show_pagination = $css = $row_separator = $row_sep_color = '';
extract(shortcode_atts(array(
    'el_class'            => '',
    'bg_image'            => '',
    'bg_color'            => '',
    'bg_image_repeat'     => '',
    'font_color'          => '',
    'padding'             => '',
    'margin_bottom'       => '',
    'row_layout'          => '',
    'anything_slider'     => '',
    'show_pagination'     => '',
    'autoplay'            => '',
    'show_hide'           => '',
    'data_attribute'      => '',
    'row_separator'       => '',
    'row_sep_color'       => '',
    'css'                 => '',
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);

if ($row_layout) {
    $css_class .= ' '.$row_layout;
}
if ($anything_slider) {
    $css_class .= ' '.$anything_slider;
}
if ($autoplay) {
    $css_class .= $autoplay;
}
if ($show_pagination) {
    $css_class .= ' '.$show_pagination;
}
if ($show_hide) {
    $css_class .= ' '.$show_hide;
}

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
$output .= '<div '.$data_attribute.' class="'.$css_class.'"'.$style.'>';
$output .= wpb_js_remove_wpautop($content);
if ($row_separator){
$uniqueClass = random_string(5);
$output .= '<span class="absolute row-separator '.$row_separator.' sep-'.$uniqueClass.'">
<style scoped><!--
.'.$row_separator.'.sep-'.$uniqueClass.':before,
.'.$row_separator.'.sep-'.$uniqueClass.':after {border-bottom-color: '.$row_sep_color.';}
--></style>
</span>';}
$output .= '</div>'.$this->endBlockComment('row');

echo $output;