<?php
$output = $title = $type = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $interval = $in_device = $device_type = $glare_effect = $slider_speed = $transition_effect = '';
extract(shortcode_atts(array(
    'title'               => '',
    'type'                => 'flexslider',
    'in_device'           => 'false',
    'device_type'         => 'imac',
    'glare_effect'        => '',
    'transition_effect'   => 'fade',
    'onclick'             => 'link_image',
    'custom_links'        => '',
    'custom_links_target' => '',
    'img_size'            => 'imac-size',
    'images'              => '',
    'el_class'            => '',
    'interval'            => '0',
), $atts));
$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$lightbox_script = '';

$el_class = $this->getExtraClass($el_class);
if ( $type == 'nivo' ) {
    $type = ' wpb_slider_nivo theme-default';
    wp_enqueue_script( 'nivo-slider' );
    wp_enqueue_style( 'nivo-slider-css' );
    wp_enqueue_style( 'nivo-slider-theme' );

    $slides_wrap_start = '<div class="nivoSlider">';
    $slides_wrap_end = '</div>';
} else if ( $type == 'flexslider' || $type == 'flexslider_fade' || $type == 'flexslider_slide' || $type == 'fading' ) {
    $el_start = '<li>';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="slides">';
    $slides_wrap_end = '</ul>';
    wp_enqueue_style('flexslider');
    wp_enqueue_script('flexslider');
} else if ( $type == 'image_grid' ) {
    wp_enqueue_script( 'isotope' );

    $el_start = '<li class="isotope-item">';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="wpb_image_grid_ul">';
    $slides_wrap_end = '</ul>';

} elseif ( $type == 'capital_touch_slider' ) {

    if ( $interval == 0 ) {
        $slider_speed = 'false';
    } else {
        $slider_speed = $interval .'000';
    }

    $uniqid = random_string(6);

    $slides_wrap_start = '<div id="capital_touch_slider-'.$uniqid.'" class="capital_touch_slider">';
    $slides_wrap_end = '</div>';
    $slides_wrap_end .= '<script>jQuery(document).ready(function($){"use strict";$("#capital_touch_slider-'.$uniqid.'").owlCarousel({navigation:true,stopOnHover:true,pagination:false,autoPlay:'.$slider_speed.',singleItem:true,autoHeight:false,transitionStyle:"'.$transition_effect.'",navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],});});</script>';
}

$flex_fx = '';
if ( $type == 'flexslider' || $type == 'flexslider_fade' || $type == 'fading' ) {
    $type = ' wpb_flexslider flexslider_fade flexslider';
    $flex_fx = ' data-flex_fx="fade"';
} else if ( $type == 'flexslider_slide' ) {
    $type = ' wpb_flexslider flexslider_slide flexslider';
    $flex_fx = ' data-flex_fx="slide"';
} else if ( $type == 'image_grid' ) {
    $type = ' wpb_image_grid';
}

if ( $images == '' ) $images = '-1,-2,-3';

if ( $onclick == 'custom_link' ) { $custom_links = explode( ',', $custom_links); }
$images = explode( ',', $images);
$i = -1;

// set image size for different devices
if ( $device_type == 'mac_book_pro' ) {
    $img_size = 'macbook-size';
}

foreach ( $images as $attach_id ) {
    $i++;
    if ($attach_id > 0) {
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ));
    }
    else {
        $different_kitten = 801 + $i;
        $post_thumbnail = array();
        $post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/426" />';
        $post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
    }

    $thumbnail = $post_thumbnail['thumbnail'];
    $p_img_large = $post_thumbnail['p_img_large'];
    $link_start = $link_end = '';

    if ( $onclick == 'link_image' ) {
        $link_start = '<a class="ilightbox" href="'.$p_img_large[0].'">';
        $link_end  = '</a>';
        $lightbox_script  = '<script>jQuery(document).ready(function($) {"use strict";$(\'.ilightbox\').iLightBox({path:\'horizontal\'});});</script>';
    }
    else if ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
        $link_start = '<a href="'.$custom_links[$i].'"' . (!empty($custom_links_target) ? ' target="'.$custom_links_target.'"' : '') . '>';
        $link_end = '</a>';
    }
    $gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
}
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_content_element'.$el_class.' clearfix', $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_gallery_heading'));

// if in device slider option is selected
if ( $in_device == 'true' ) {

    $output .= '<div class="in-device-slider" id="slider-in-'.$device_type.'">';

    if ( $device_type == 'imac' ) {

        $output .= '<img id="imac-bg" src="'.get_template_directory_uri().'/images/in-device-slider/imac-flat.png" alt="imac bg" width="1082" height="860">';

        if ( $glare_effect == 'true' ) {
            $output .= '<img id="imac-bg-glare" src="'.get_template_directory_uri().'/images/in-device-slider/imac-flat-glare.png" alt="imac bg" width="488" height="712">';
        }

        
    } elseif ( $device_type == 'mac_book_pro' ) {

        $output .= '<img id="macbook-bg" src="'.get_template_directory_uri().'/images/in-device-slider/macbook-flat.png" alt="imac bg" width="1082" height="560">';

        if ( $glare_effect == 'true' ) {
            $output .= '<img id="macbook-bg-glare" src="'.get_template_directory_uri().'/images/in-device-slider/macbook-flat-glare.png" alt="imac bg" width="399" height="502">';
        }

    }
}

$output .= '<div class="wpb_gallery_slides'.$type.'" data-interval="'.$interval.'"'.$flex_fx.'>'.$slides_wrap_start.$gal_images.$slides_wrap_end.'</div>';
$output .= $lightbox_script;
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gallery');

// if in device slider option is selected
if ( $in_device == 'true' ) {
    $output .= '</div>';
}

echo $output;