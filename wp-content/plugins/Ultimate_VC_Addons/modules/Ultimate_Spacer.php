<?php
/*
* Add-on Name: Adjustable Spacer for Visual Composer
* Add-on URI: http://dev.brainstormforce.com
*/
if(!class_exists("Ultimate_Spacer")){
	class Ultimate_Spacer{
		function __construct(){
			add_action("admin_init",array($this,"ultimate_spacer_init"));
			add_shortcode("ultimate_spacer",array($this,"ultimate_spacer_shortcode"));
		}
		function ultimate_spacer_init(){
			if(function_exists("vc_map")){
				vc_map(
					array(
					   "name" => __("Spacer / Gap"),
					   "base" => "ultimate_spacer",
					   "class" => "vc_ultimate_spacer",
					   "icon" => "vc_ultimate_spacer",
					   "category" => __("Ultimate VC Addons",'smile'),
					   "description" => __("Adjust space between components.","smile"),
					   "params" => array(
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Spacer Height - On Desktop", "smile"),
								"param_name" => "height",
								"admin_label" => true,
								"value" => 10,
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Enter value in pixels", "smile"),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Spacer Height - On Tabs", "smile"),
								"param_name" => "height_on_tabs",
								"admin_label" => true,
								"value" => '',
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Enter value in pixels", "smile"),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Spacer Height - On Mobile", "smile"),
								"param_name" => "height_on_mob",
								"admin_label" => true,
								"value" => '',
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Enter value in pixels", "smile"),
							),
						)
					)
				);
			}
		}
		function ultimate_spacer_shortcode($atts){
			wp_enqueue_style('ultimate-style');
			$height = $output = $height_on_tabs = $height_on_mob = '';
			extract(shortcode_atts(array(
				"height" => "",
				"height_on_tabs" => "",
				"height_on_mob" => ""
			),$atts));
			if($height_on_mob == "" && $height_on_tabs == "")
				$height_on_mob = $height_on_tabs = $height;
			$style = 'clear:both;';
			$style .= 'display:block;';
			$uid = uniqid();
			$output .= '<div class="ult-spacer spacer-'.$uid.'" style="'.$style.'"></div>';
			$output .= '<script type="text/javascript">';
			$output .= 'jQuery(document).ready(function(){
					var body_width = jQuery("body").width();
					var height_on_mob = "'.$height_on_mob.'";
					var height_on_tabs = "'.$height_on_tabs.'";
					var height = "'.$height.'";
					if(body_width <= 640){
						jQuery(".spacer-'.$uid.'").height(height_on_mob);
					} else if (body_width >= 640 && body_width <= 960){
						jQuery(".spacer-'.$uid.'").height(height_on_tabs);
					} else if (body_width >= 960){
						jQuery(".spacer-'.$uid.'").height(height);
					}
				});';
			$output .= '</script>';
			return $output;
		}
	} // end class
	new Ultimate_Spacer;
}