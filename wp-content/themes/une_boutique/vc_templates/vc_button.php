<?php
$output = $color = $size = $fa_icon = $target = $href = $el_class = $title = $text_size = $position = $icon_position = $button_type = $styles = $custom_bg = $custom_color = $border_radius = $border_width = $custom_styles = '';
extract(shortcode_atts(array(
    'color'           => 'wpb_button',
    'size'            => '',
    'fa_icon'         => 'none',
    'icon_position'   => 'right',
    'button_type'     => 'flat',
    'target'          => '_self',
    'href'            => '',
    'title'           => __('Text on the button', "js_composer"),
    'text_size'       => '',
    'position'        => '',
    'custom_styles'   => '',
    'custom_bg'       => '',
    'custom_color'    => '',
    'border_radius'   => '',
    'border_width'    => '',
    'border_color'    => '',
    'el_class'        => '',
), $atts));
$a_class = '';

if ( $el_class !== '' ) {
    $tmp_class = explode(" ", strtolower($el_class));
    $tmp_class = str_replace(".", "", $tmp_class);
    if ( in_array("prettyphoto", $tmp_class) ) {
        wp_enqueue_script( 'prettyphoto' );
        wp_enqueue_style( 'prettyphoto' );
        $a_class .= ' prettyphoto';
        $el_class = str_ireplace("prettyphoto", "", $el_class);
    }
    if ( in_array("pull-right", $tmp_class) && $href !== '' ) { $a_class .= ' pull-right'; $el_class = str_ireplace("pull-right", "", $el_class); }
    if ( in_array("pull-left", $tmp_class) && $href !== '' ) { $a_class .= ' pull-left'; $el_class = str_ireplace("pull-left", "", $el_class); }
}

if ( $custom_styles == 'true' ) {
    $styles .= ($custom_bg !== '') ? ' background-color:'.$custom_bg.';' : ' ';
    $styles .= ($custom_color !== '') ? ' color:'.$custom_color.';' : ' ';
    $styles .= ($border_color !== '') ? ' border-color:'.$border_color.';' : ' ';
    $styles .= ($border_radius !== '') ? ' border-radius:'.$border_radius.'px !important;' : ' ';
    $styles .= ($border_width !== '') ? ' border-width:'.$border_width.'px !important;' : ' ';
    $styles .= ($text_size !== '') ? ' font-size:'.$text_size.'px !important;' : ' ';
}

if ( $target == 'same' || $target == '_self' ) { $target = ''; }
$target = ( $target != '' ) ? ' target="'.$target.'"' : '';

$color = ( $color != '' ) ? ' wpb_'.$color : '';
$size = ( $size != '' && $size != 'wpb_regularsize' ) ? ' wpb_'.$size : ' '.$size;
$fa_icon = ( $fa_icon != '' && $fa_icon != 'none' ) ? ''.$fa_icon : '';
$the_icon = ( $fa_icon != '' ) ? ' <i class="'.$fa_icon.'"></i> ' : '';
$position = ( $position != '' ) ? ' '.$position.'-button-position' : '';
$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_button '.$color.$size.$el_class.$position, $this->settings['base']);

if ( $icon_position == "right" ) {
    if ( $href != '' ) {
        $output .= '<span style="'.$styles.'" class="ub-btn-type-'.$button_type.' button-icon-'.$icon_position.' '.$css_class.'">'.$title.$the_icon.'</span>';
        $output = '<a class="wpb_button_a'.$a_class.'" title="'.$title.'" href="'.$href.'"'.$target.'>' . $output . '</a>';
    } else {
        $output .= '<button style="'.$styles.'" class="ub-btn-type-'.$button_type.' button-icon-'.$icon_position.' '.$css_class.'">'.$title.$the_icon.'</button>';
    }
} else {
    if ( $href != '' ) {
        $output .= '<span style="'.$styles.'" class="ub-btn-type-'.$button_type.' button-icon-'.$icon_position.' '.$css_class.'">'.$the_icon.$title.'</span>';
        $output = '<a class="wpb_button_a'.$a_class.'" title="'.$title.'" href="'.$href.'"'.$target.'>' . $output . '</a>';
    } else {
        $output .= '<button style="'.$styles.'" class="ub-btn-type-'.$button_type.' button-icon-'.$icon_position.' '.$css_class.'">'.$the_icon.$title.'</button>';
    }
}

echo $output . $this->endBlockComment('button') . "\n";