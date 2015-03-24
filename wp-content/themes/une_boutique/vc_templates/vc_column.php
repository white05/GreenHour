<?php
$output = $el_class = $width = $empty_space = $show_hide = $text_center = $css = $bg_position = $match_height = $style = $data_match_height = $text_align = $column_mask = $overlay_link = $overlay_bg = $overlay_style = $column_mask_class = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'empty_space'     => '',
    'text_center'     => '',
    'bg_position'     => '',
    'width'           => '1/1',
    'show_hide'       => '',
    'css'             => '',
    'match_height'    => '',
    'text_align'      => '',
    'column_mask'     => '',
    'overlay_link'    => '',
    'overlay_bg'      => '',
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);

$el_class .= ' wpb_column column_container';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);

if ( $bg_position ) {
	$style = 'style="background-position:'.$bg_position.' !important;"';
}

if ( $match_height == 'true' ) {
	$data_match_height = 'data-mh="matching-height"';
}

if ( $column_mask == 'true' ) {
	$column_mask_class = 'has-mask';
}

$output .= "\n\t".'<div '.$style.' class="relative columns '.$column_mask_class.' '.$text_align.' '.$show_hide.' '.$empty_space.' '.$css_class.' '.$text_center.'" '.$data_match_height.'>';

$output .= "\n\t\t".'<div class="wpb_wrapper">';

// Column Masking if set to true
if ( $column_mask == 'true' ) {
	if ( $overlay_bg ) {
		$overlay_style = 'style="background-color:'.$overlay_bg.';"';
	}
	$output .= "\n\t".'<div '.$overlay_style.' class="wpb_column_mask absolute">';

		if ($overlay_link) {
			$href = vc_build_link($overlay_link);
			if(isset($href['target'])){
				$target = 'target="'.$href['target'].'"';
			}
			$output .= "\n\t".'<a '.$target.' href="'.$href['url'].'" class="wpb_column_mask_link absolute">';
		}
		
				$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		
		if ($overlay_link) {
			$output .= "\n\t".'</a>';
		}

	$output .= "\n\t".'</div>';
}

if ( $column_mask !== 'true' ) { //this makes the content appear only once
	$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
}
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;