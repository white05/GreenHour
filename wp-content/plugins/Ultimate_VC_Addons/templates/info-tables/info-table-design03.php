<?php
/*
* Add-on Name: Info Tables for Visual Composer
* Template : Design layout 03
*/
if(class_exists("Ultimate_Info_Table")){
	class Info_Design03 extends Ultimate_Info_Table{
		public static function generate_design($atts,$content = null){
			$icon_type = $icon_img = $img_width = $icon = $icon_color = $icon_color_bg = $icon_size = $icon_style = $icon_border_style = $icon_border_radius = $icon_color_border = $icon_border_size = $icon_border_spacing = $el_class = $package_heading = $package_sub_heading = $package_price = $package_unit = $package_btn_text = $package_link = $package_featured = $color_bg_main = $color_txt_main = $color_bg_highlight = $color_txt_highlight = $color_scheme = $use_cta_btn = '';
			extract(shortcode_atts(array(
				'color_scheme' => '',
				'package_heading' => '',
				'package_sub_heading' => '',
				'icon_type' => '',
				'icon' => '',
				'icon_img' => '',
				'img_width' => '',
				'icon_size' => '',				
				'icon_color' => '',
				'icon_style' => '',
				'icon_color_bg' => '',
				'icon_color_border' => '',			
				'icon_border_style' => '',
				'icon_border_size' => '',
				'icon_border_radius' => '',
				'icon_border_spacing' => '',
				'use_cta_btn' => '',
				'package_btn_text' => '',
				'package_link' => '',
				'package_featured' => '',
				'color_bg_main' => '',
				'color_txt_main' => '',
				'color_bg_highlight' => '',
				'color_txt_highlight' => '',
			),$atts));
			$output = $link = $target = $featured = $featured_style = $normal_style = $dynamic_style = $box_icon = '';
			if($icon_type !== "none"){
				$box_icon = do_shortcode('[just_icon icon_type="'.$icon_type.'" icon="'.$icon.'" icon_img="'.$icon_img.'" img_width="'.$img_width.'" icon_size="'.$icon_size.'" icon_color="'.$icon_color.'" icon_style="'.$icon_style.'" icon_color_bg="'.$icon_color_bg.'" icon_color_border="'.$icon_color_border.'"  icon_border_style="'.$icon_border_style.'" icon_border_size="'.$icon_border_size.'" icon_border_radius="'.$icon_border_radius.'" icon_border_spacing="'.$icon_border_spacing.'"]');
			}
			if($color_scheme == "custom"){
				if($color_bg_main !== ""){
					$normal_style .= 'background:'.$color_bg_main.';';
				}
				if($color_txt_main !== ""){
					$normal_style .= 'color:'.$color_txt_main.';';
				}
				if($color_bg_highlight!== ""){
					$featured_style .= 'background:'.$color_bg_highlight.';';
				}
				if($color_txt_highlight !== ""){
					$featured_style .= 'color:'.$color_txt_highlight.';';
				}
			}
			if($package_link !== ""){
				$link = vc_build_link($package_link);
				if(isset($link['target'])){
					$target = 'target="'.$link['target'].'"';
				} else {
					$target = '';
				}
				$link = $link['url'];
			} else {
				$link = "#";
			}
			if($package_featured !== ""){
				$featured = "ult_featured";
			}
			if($use_cta_btn == "box"){
				$output .= '<a href="'.$link.'" '.$target.' class="ult_price_action_button" style="'.$featured_style.'">'.$package_btn_text;
			}
			$output .= '<div class="ult_pricing_table_wrap ult_info_table ult_design_3 '.$featured.' ult-cs-'.$color_scheme.' '.$el_class.'">
						<div class="ult_pricing_table" style="'.$normal_style.'">';
				$output .= '<div class="ult_pricing_heading">
								<h3>'.$package_heading.'</h3>';
							if($package_sub_heading !== ''){
								$output .= '<h5>'.$package_sub_heading.'</h5>';
							}
				$output .= '</div><!--ult_pricing_heading-->';
				if(isset($box_icon) && $box_icon != '') :
				$output .= '<div class="ult_price_body_block" style="'.$featured_style.'">
								<div class="ult_price_body">
									<div class="ult_price">
										'.$box_icon.'
									</div>
								</div>
							</div><!--ult_price_body_block-->';
				endif;
				$output .= '<div class="ult_price_features">
								'.wpb_js_remove_wpautop(do_shortcode($content), true).'
							</div><!--ult_price_features-->';
				if($use_cta_btn == "true"){
					$output .= '<div class="ult_price_link" style="'.$normal_style.'">
								<a href="'.$link.'" '.$target.' class="ult_price_action_button" style="'.$featured_style.'">'.$package_btn_text.'</a>
							</div><!--ult_price_link-->';
				}
				$output .= '<div class="ult_clr"></div>
				</div><!--pricing_table-->
			</div><!--pricing_table_wrap-->';
			if($use_cta_btn == "box"){
				$output .= '</a>';
			}
			return $output;
		}
	}
}