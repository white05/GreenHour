<?php
if(!class_exists('Ultimate_Icon_Timeline'))
{
	class Ultimate_Icon_Timeline
	{
		function __construct()
		{
			add_action('admin_init', array($this, 'add_icon_timeline'));
			add_shortcode( 'icon_timeline', array($this, 'icon_timeline' ) );
			add_shortcode( 'icon_timeline_item', array($this, 'icon_timeline_item' ) );
			add_shortcode( 'icon_timeline_sep', array($this, 'icon_timeline_sep' ) );
			add_shortcode( 'icon_timeline_feat', array($this, 'icon_timeline_feat' ) );
		}
		function add_icon_timeline()
		{
			if(function_exists('vc_map'))
			{
				vc_map(
					array(
					   "name" => __("Timeline","smile"),
					   "base" => "icon_timeline",
					   "class" => "vc_timeline",
					   "icon" => "vc_timeline_icon",
					   "category" => __("Ultimate VC Addons","smile"),
					   "description" => __("Timeline of old memories and events.","smile"),
					   "as_parent" => array('only' => 'icon_timeline_item,icon_timeline_sep,icon_timeline_feat',),
					   "content_element" => true,
					   "show_settings_on_create" => false,					   
					   "params" => array(					   	
						   	array(
								 "type" => "dropdown",
								 "class" => "",
								 "heading" => __("Height","smile"),
								 "param_name" => "timeline_style",
								 "value" => array(
								 		'Non-optimized (CSS)' => 'csstime',
								 		'Optimized with JavaScript' => 'jstime',										
								 ),
								 "description" => __("How would you like the height of timeline.","smile")
							  ),
						   array(
							 "type" => "dropdown",
							 "class" => "",
							 "heading" => __("Connecter Line Style","smile"),
							 "param_name" => "timeline_line_style",
							 "value" => array(
							 		'Dotted' => 'dotted',
							 		'Solid ' => 'solid',									
									'Dashed ' => 'dashed',									
							 		),
							 "description" => __("Select the style of  line that connects timeline items.","smile")
						  ),					
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Color of Connecter Line:", "smile"),
								"param_name" => "timeline_line_color",
								"value" => "",
								"description" => __("Select the color for the line that connects timeline items.", "smile"),								
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Background color for timeline item block / container:", "smile"),
								"param_name" => "time_block_bg_color",
								"value" => "",
								"description" => __(" Give a background color to the timeline item block.", "smile"),								
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Select font color of items separator:", "smile"),
								"param_name" => "time_sep_color",
								"value" => "",
								"description" => __("Select font color of items separator.", "smile"),								
							),							
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Select background color for items separator:", "smile"),
								"param_name" => "time_sep_bg_color",
								"value" => "",
								"description" => __("Select the background color for item separator.", "smile"),								
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Timeline Layout:", "smile"),
								"param_name" => "timeline_layout",
								"value" => array(
									"Full Width " => "",
									//"Auto Width " => "timeline-auto-width",
									"Custom Width " => "timeline-custom-width",
								),
								"description" => __("Select Layout of Timeline.", "smile"),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Custom Width", "smile"),
								"param_name" => "custom_width",
								"value" => 200,								
								"suffix" => "px",
								"description" => __("Provide custom width for each block", "smile"),
								"dependency" => Array("element" => "timeline_layout","value" => array("timeline-custom-width")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Hover animation:", "smile"),
								"param_name" => "tl_animation",
								"value" => array(
									"None" => "",
									"Slide Out" => "tl-animation-slide-out",
									"Slide Up" => "tl-animation-slide-up",
									"Slide Down" => "tl-animation-slide-down",									
									"Shadow" => "tl-animation-shadow",
								),
								"description" => __("Hover animation can be given to the timeline item blocks.", "smile"),
							),
						),
						"js_view" => 'VcColumnView'
					));
				// Add list item
				vc_map(
					array(
					   "name" => __("Items Separator"),
					   "base" => "icon_timeline_sep",
					   "class" => "vc_timeline_sep",
					   "icon" => "vc_timeline_sep_icon",
					   "category" => __('Timeline','smile'),
					   "content_element" => true,
					   "as_child" => array('only' => 'icon_timeline'),					   
					   "params" => array(
						 	array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("separator Text", "smile"),
								"param_name" => "time_sep_title",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide the text for this timeline Separator.", "smile"),
							),	
							array(
								"type" => "colorpicker",
								"param_name" => "time_sep_color",
								"heading" => __("Color","smile")
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Border Style", "smile"),
								"param_name" => "line_style",
								"value" => array(
									"None" => "",
									"Solid"=> "solid",
									"Dashed" => "dashed",
									"Dotted" => "dotted",
									"Double" => "double",
									"Inset" => "inset",
									"Outset" => "outset",
								),
							),
							array(
								"type" => "colorpicker",
								"param_name" => "line_color",
								"heading" => __("Border color","smile"),
								"dependency" => Array("element" => "line_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"param_name" => "line_width",
								"heading" => "Border width",
								"value" => "1",
								"suffix" => "px",
								"dependency" => Array("element" => "line_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"param_name" => "line_radius",
								"heading" => "Border radius",
								"value" => "5",
								"suffix" => "px",
								"dependency" => Array("element" => "line_style", "not_empty" => true),
							),
							array(
								"type" => "ultimate_google_fonts",
								"param_name" => "seperator_title_font",
								"heading" => "Font Family",
								"value" => "",
								"dependency" => Array("element" => "time_sep_title", "not_empty" => true),
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts_style",
								"heading" => "Font Style",
								"param_name" => "seperator_title_font_style",
								"value" => "",
								"dependency" => Array("element" => "time_sep_title", "not_empty" => true),
								"group" => "Typography"
							),
							array(
								"type" => "number",
								"heading" => "Font size",
								"param_name" => "font_size",
								"value" => "",
								"suffix" => "px",
								"dependency" => Array("element" => "time_sep_title", "not_empty" => true),
								"group" => "Typography"
							),						
							// Customize everything
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Extra Class", "smile"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Add extra class name that will be applied to the timeline, and you can use this class for your customizations.", "smile"),
							),
					    )
					) 
				);
				vc_map(
					array(
					   "name" => __("Timeline Item"),
					   "base" => "icon_timeline_item",
					   "class" => "vc_timeline_item",
					   "icon" => "vc_timeline_item_icon",
					   "category" => __('Timeline','smile'),
					   "content_element" => true,
					   "as_child" => array('only' => 'icon_timeline'),					   
					   "params" => array(
						 	array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Title", "smile"),
								"param_name" => "time_title",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide the title for this timeline item.", "smile"),
							),
							array(
								"type" => "text",
								"param_name" => "title_text_typography",
								"heading" => __("<h2>Title settings</h2>"),
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts",
								"heading" => "Font Family",
								"param_name" => "title_font",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts_style",
								"heading" => "Font Style",
								"param_name" => "title_font_style",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "number",
								"param_name" => "title_font_size",
								"heading" => "Font size",
								"value" => "",
								"suffix" => "px",
								"group" => "Typography"
							),
							array(
								"type" => "colorpicker",
								"param_name" => "title_font_color",
								"heading" => "Color",
								"group" => "Typography"
							),
							array(
								"type" => "textarea_html",
								"class" => "",
								"heading" => __("Description", "smile"),
								"param_name" => "content",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide some description.", "smile"),
							),
							array(
								"type" => "text",
								"param_name" => "desc_text_typography",
								"heading" => __("<h2>Description settings</h2>"),
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts",
								"heading" => "Font Family",
								"param_name" => "desc_font",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts_style",
								"heading" => "Font Style",
								"param_name" => "desc_font_style",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "number",
								"param_name" => "desc_font_size",
								"heading" => "Font size",
								"value" => "",
								"suffix" => "px",
								"group" => "Typography"
							),
							array(
								"type" => "colorpicker",
								"param_name" => "desc_font_color",
								"heading" => "Color",
								"group" => "Typography"
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon to display:", "smile"),
								"param_name" => "icon_type",
								"value" => array(
									"No Icon" => 'noicon',
									"Font Icon Manager" => "selector",
									"Custom Image Icon" => "custom",									
								),
								"description" => __("Use an existing font icon</a> or upload a custom image.", "smile")
							),
							array(
								"type" => "icon_manager",
								"class" => "",
								"heading" => __("Select Icon ","smile"),
								"param_name" => "icon",
								"value" => "",
								"description" => __("Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='admin.php?page=AIO_Icon_Manager' target='_blank'>add new here</a>.", "flip-box"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),
							),
							array(
								"type" => "attach_image",
								"class" => "",
								"heading" => __("Upload Image Icon:", "smile"),
								"param_name" => "icon_img",
								"value" => "",
								"description" => __("Upload the custom image icon.", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("custom")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Image Width", "smile"),
								"param_name" => "img_width",
								"value" => 48,
								"min" => 16,
								"max" => 512,
								"suffix" => "px",
								"description" => __("Provide image width", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("custom")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Size of Icon", "smile"),
								"param_name" => "icon_size",
								"value" => 32,
								"min" => 12,
								"max" => 72,
								"suffix" => "px",
								"description" => __("How big would you like it?", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Color", "smile"),
								"param_name" => "icon_color",
								"value" => "#DE5034",
								"description" => __("Give it a nice paint!", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),						
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Style", "smile"),
								"param_name" => "icon_style",
								"value" => array(
									//"Simple" => "none",
									"Circle Background" => "circle",
									"Square Background" => "square",
									"Design your own" => "advanced",
								),
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
								"description" => __("We have given three quick preset if you are in a hurry. Otherwise, create your own with various options.", "smile"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Background Color", "smile"),
								"param_name" => "icon_color_bg",
								"value" => "#fff",
								"description" => __("Select background color for icon.", "smile"),										
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Border Style", "smile"),
								"param_name" => "icon_border_style",
								"value" => array(
									"None" => "",
									"Solid"=> "solid",
									"Dashed" => "dashed",
									"Dotted" => "dotted",
									"Double" => "double",
									"Inset" => "inset",
									"Outset" => "outset",
								),
								"description" => __("Select the border style for icon.","smile"),
								"dependency" => Array("element" => "icon_style", "value" => array("advanced")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Border Color", "smile"),
								"param_name" => "icon_color_border",
								"value" => "#dbdbdb",
								"description" => __("Select border color for icon.", "smile"),	
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Width", "smile"),
								"param_name" => "icon_border_size",
								"value" => 1,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the border.", "smile"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Radius", "smile"),
								"param_name" => "icon_border_radius",
								"value" => 500,
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("0 pixel value will create a square border. As you increase the value, the shape convert in circle slowly. (e.g 500 pixels).", "smile"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Background Size", "smile"),
								"param_name" => "icon_border_spacing",
								"value" => 50,
								"min" => 30,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Spacing from center of the icon till the boundary of border / background", "smile"),
								"dependency" => Array("element" => "icon_style", "value" => array("advanced")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Animation","smile"), 
								"param_name" => "icon_animation",
								"value" => array(
							 		__("No Animation","smile") => "",
									__("Swing","smile") => "swing",
									__("Pulse","smile") => "pulse",
									__("Fade In","smile") => "fadeIn",
									__("Fade In Up","smile") => "fadeInUp",
									__("Fade In Down","smile") => "fadeInDown",
									__("Fade In Left","smile") => "fadeInLeft",
									__("Fade In Right","smile") => "fadeInRight",
									__("Fade In Up Long","smile") => "fadeInUpBig",
									__("Fade In Down Long","smile") => "fadeInDownBig",
									__("Fade In Left Long","smile") => "fadeInLeftBig",
									__("Fade In Right Long","smile") => "fadeInRightBig",
									__("Slide In Down","smile") => "slideInDown",
									__("Slide In Left","smile") => "slideInLeft",
									__("Slide In Left","smile") => "slideInLeft",
									__("Bounce In","smile") => "bounceIn",
									__("Bounce In Up","smile") => "bounceInUp",
									__("Bounce In Down","smile") => "bounceInDown",
									__("Bounce In Left","smile") => "bounceInLeft",
									__("Bounce In Right","smile") => "bounceInRight",
									__("Rotate In","smile") => "rotateIn",
									__("Light Speed In","smile") => "lightSpeedIn",
									__("Roll In","smile") => "rollIn",
									),
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
								"description" => __("Like CSS3 Animations? We have several options for you!","smile")
						  	),
							/*array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Timeline Item Position", "smile"),
								"param_name" => "time_position",
								"admin_label" => true,
								"value" => array(
									"Auto" =>'auto',
									"Left" => "left",
									"Right" => "right",									
								),
								"description" => __("Alignment of timeline item with respect to the connecter line.", "smile"),
							),*/						
							array(
									"type" => "dropdown",
									"class" => "",
									"heading" => __("Apply link to:", "smile"),
									"param_name" => "time_link_apply",
									"value" => array(
										"None" => "",
										"Complete box" => "box",
										"Box Title" => "title",
										"Display Read More" => "more",
									),
									"description" => __("Select the element for link.", "icon-box")
								),	
								array(
									"type" => "vc_link",
									"class" => "",
									"heading" => __("Add Link", "smile"),
									"param_name" => "time_link",
									"value" => "",
									"dependency" => Array("element" => "time_link_apply","value" => array("more","title","box")),
									"description" => __("Provide the link that will be applied to this timeline.", "smile")
								),								
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Read More Text", "smile"),
								"param_name" => "time_read_text",
								"value" => "Read More",
								"description" => __("Customize the read more text.", "smile"),
								"dependency" => Array("element" => "time_link_apply","value" => array("more")),
							),						
							// Customize everything
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Extra Class", "smile"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Add extra class name that will be applied to the timeline, and you can use this class for your customizations.", "smile"),
							),
					    )
					) 
				);							
				vc_map(
					array(
					   "name" => __("Timeline Featured Item"),
					   "base" => "icon_timeline_feat",
					   "class" => "vc_timeline_feat",
					   "icon" => "vc_timeline_feat_icon",
					   "category" => __('Timeline','smile'),
					   "content_element" => true,
					   "as_child" => array('only' => 'icon_timeline'),					   
						 "params" => array(
						 	array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Title", "smile"),
								"param_name" => "time_title",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide the title for this timeline item.", "smile"),
							),
							array(
								"type" => "text",
								"param_name" => "title_text_typography",
								"heading" => __("<h2>Title settings</h2>"),
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts",
								"heading" => "Font Family",
								"param_name" => "title_font",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts_style",
								"heading" => "Font Style",
								"param_name" => "title_font_style",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "number",
								"param_name" => "title_font_size",
								"heading" => "Font size",
								"value" => "",
								"suffix" => "px",
								"group" => "Typography"
							),
							array(
								"type" => "colorpicker",
								"param_name" => "title_font_color",
								"heading" => "Color",
								"group" => "Typography"
							),
							array(
								"type" => "textarea_html",
								"class" => "",
								"heading" => __("Description", "smile"),
								"param_name" => "content",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide some description.", "smile"),
							),
							array(
								"type" => "text",
								"param_name" => "desc_text_typography",
								"heading" => __("<h2>Description settings</h2>"),
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts",
								"heading" => "Font Family",
								"param_name" => "desc_font",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "ultimate_google_fonts_style",
								"heading" => "Font Style",
								"param_name" => "desc_font_style",
								"value" => "",
								"group" => "Typography"
							),
							array(
								"type" => "number",
								"param_name" => "desc_font_size",
								"heading" => "Font size",
								"value" => "",
								"suffix" => "px",
								"group" => "Typography"
							),
							array(
								"type" => "colorpicker",
								"param_name" => "desc_font_color",
								"heading" => "Color",
								"group" => "Typography"
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon to display:", "smile"),
								"param_name" => "icon_type",
								"value" => array(
									"No Icon" => 'noicon',
									"Font Icon Manager" => "selector",
									"Custom Image Icon" => "custom",									
								),
								"description" => __("Use an existing font icon</a> or upload a custom image.", "smile")
							),
							array(
								"type" => "icon_manager",
								"class" => "",
								"heading" => __("Select Icon ","smile"),
								"param_name" => "icon",
								"value" => "",
								"description" => __("Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='admin.php?page=AIO_Icon_Manager' target='_blank'>add new here</a>.", "flip-box"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),
							),
							array(
								"type" => "attach_image",
								"class" => "",
								"heading" => __("Upload Image Icon:", "smile"),
								"param_name" => "icon_img",
								"value" => "",
								"description" => __("Upload the custom image icon.", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("custom")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Image Width", "smile"),
								"param_name" => "img_width",
								"value" => 48,
								"min" => 16,
								"max" => 512,
								"suffix" => "px",
								"description" => __("Provide image width", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("custom")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Size of Icon", "smile"),
								"param_name" => "icon_size",
								"value" => 32,
								"min" => 12,
								"max" => 72,
								"suffix" => "px",
								"description" => __("How big would you like it?", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Color", "smile"),
								"param_name" => "icon_color",
								"value" => "#DE5034",
								"description" => __("Give it a nice paint!", "smile"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),						
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Style", "smile"),
								"param_name" => "icon_style",
								"value" => array(
									//"Simple" => "none",
									"Circle Background" => "circle",
									"Square Background" => "square",
									"Design your own" => "advanced",
								),
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
								"description" => __("We have given three quick preset if you are in a hurry. Otherwise, create your own with various options.", "smile"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Background Color", "smile"),
								"param_name" => "icon_color_bg",
								"value" => "#fff",
								"description" => __("Select background color for icon.", "smile"),										
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Border Style", "smile"),
								"param_name" => "icon_border_style",
								"value" => array(
									"None" => "",
									"Solid"=> "solid",
									"Dashed" => "dashed",
									"Dotted" => "dotted",
									"Double" => "double",
									"Inset" => "inset",
									"Outset" => "outset",
								),
								"description" => __("Select the border style for icon.","smile"),
								"dependency" => Array("element" => "icon_style", "value" => array("advanced")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Border Color", "smile"),
								"param_name" => "icon_color_border",
								"value" => "#dbdbdb",
								"description" => __("Select border color for icon.", "smile"),	
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Width", "smile"),
								"param_name" => "icon_border_size",
								"value" => 1,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the border.", "smile"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Radius", "smile"),
								"param_name" => "icon_border_radius",
								"value" => 500,
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("0 pixel value will create a square border. As you increase the value, the shape convert in circle slowly. (e.g 500 pixels).", "smile"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Background Size", "smile"),
								"param_name" => "icon_border_spacing",
								"value" => 50,
								"min" => 30,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Spacing from center of the icon till the boundary of border / background", "smile"),
								"dependency" => Array("element" => "icon_style", "value" => array("advanced")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Animation","smile"), 
								"param_name" => "icon_animation",
								"value" => array(
							 		__("No Animation","smile") => "",
									__("Swing","smile") => "swing",
									__("Pulse","smile") => "pulse",
									__("Fade In","smile") => "fadeIn",
									__("Fade In Up","smile") => "fadeInUp",
									__("Fade In Down","smile") => "fadeInDown",
									__("Fade In Left","smile") => "fadeInLeft",
									__("Fade In Right","smile") => "fadeInRight",
									__("Fade In Up Long","smile") => "fadeInUpBig",
									__("Fade In Down Long","smile") => "fadeInDownBig",
									__("Fade In Left Long","smile") => "fadeInLeftBig",
									__("Fade In Right Long","smile") => "fadeInRightBig",
									__("Slide In Down","smile") => "slideInDown",
									__("Slide In Left","smile") => "slideInLeft",
									__("Slide In Left","smile") => "slideInLeft",
									__("Bounce In","smile") => "bounceIn",
									__("Bounce In Up","smile") => "bounceInUp",
									__("Bounce In Down","smile") => "bounceInDown",
									__("Bounce In Left","smile") => "bounceInLeft",
									__("Bounce In Right","smile") => "bounceInRight",
									__("Rotate In","smile") => "rotateIn",
									__("Light Speed In","smile") => "lightSpeedIn",
									__("Roll In","smile") => "rollIn",
									),
								"dependency" => Array("element" => "icon_type","value" => array("selector","custom")),
								"description" => __("Like CSS3 Animations? We have several options for you!","smile")
						  	),
							/*array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Timeline Item Position", "smile"),
								"param_name" => "time_position",
								"admin_label" => true,
								"value" => array(
									"Auto" =>'auto',
									"Left" => "left",
									"Right" => "right",									
								),
								"description" => __("Alignment of timeline item with respect to the connecter line.", "smile"),
							),*/						
							array(
									"type" => "dropdown",
									"class" => "",
									"heading" => __("Apply link to:", "smile"),
									"param_name" => "time_link_apply",
									"value" => array(
										"None" => "",
										"Complete box" => "box",
										"Box Title" => "title",
										"Display Read More" => "more",
									),
									"description" => __("Select the element for link.", "icon-box")
								),	
								array(
									"type" => "vc_link",
									"class" => "",
									"heading" => __("Add Link", "smile"),
									"param_name" => "time_link",
									"value" => "",
									"dependency" => Array("element" => "time_link_apply","value" => array("more","title","box")),
									"description" => __("Provide the link that will be applied to this timeline.", "smile")
								),								
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Read More Text", "smile"),
								"param_name" => "time_read_text",
								"value" => "Read More",
								"description" => __("Customize the read more text.", "smile"),
								"dependency" => Array("element" => "time_link_apply","value" => array("more")),
							),						
							// Customize everything
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Extra Class", "smile"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Add extra class name that will be applied to the timeline, and you can use this class for your customizations.", "smile"),
							),
							array(
								"type" => "dropdown",
								"heading" => "Arrow position",
								"param_name" => "arrow_position",
								"value" => array(
									"Top" => "top",
									"Bottom" => "bottom"
								)
							)
					    )
					) 
				);
			}//endif
		}
		function icon_timeline($atts, $content = null)
		{
			// enqueue js
			wp_enqueue_script('ultimate-appear');
			if(get_option('ultimate_row') == "enable"){
				wp_enqueue_script('ultimate-row-bg',plugins_url('../assets/js/',__FILE__).'ultimate_bg.js');
			}
			wp_enqueue_script('ultimate-custom');
			// enqueue css
			wp_enqueue_style('ultimate-animate');
			wp_enqueue_style('ultimate-style');
			wp_enqueue_script('masonry',plugins_url('../assets/js/',__FILE__).'masonry.js', array(), false, true);
			wp_enqueue_style('aio-timeline',plugins_url('../assets/css/',__FILE__).'timeline.css');
			$timeline_line_color = $timeline_line_style = '';
			extract(shortcode_atts(array(	
				'timeline_style'=>'',			
				'timeline_line_color' =>'',
				'timeline_line_style' =>'',
				'time_sep_bg_color'=>'',
				'time_sep_color' =>'',
				'time_block_bg_color'=>'',
				'timeline_layout' =>'',
				'tl_animation'=>'',
				'custom_width'=>'',
			), $atts));
			$data = $cw = $line_style = $output = '';
			if($timeline_layout=='timeline-custom-width'){
				$cw ='data-timeline-cutom-width="'.$custom_width.'"';
			}
			if($time_sep_color!=''){
				$time_sep_color='data-time_sep_color="'.$time_sep_color.'"';
			}
			if($time_sep_bg_color!=''){
				$time_sep_bg_color='data-time_sep_bg_color="'.$time_sep_bg_color.'"';
			}
			if($time_block_bg_color!=''){
				$time_block_bg_color='data-time_block_bg_color="'.$time_block_bg_color.'"';
			}
			if($timeline_line_color!=''){
				$line_style ='border-right-style:'.$timeline_line_style.';';
			}
			if($timeline_line_style!=''){
				$line_style .='border-right-color:'.$timeline_line_color.';';	
			}
			if($timeline_style=='jstime'){
				$output .= '<div class="'.$timeline_style.' timeline_preloader" style="opacity:0;width:35px;margin:auto;margin-top:30px;"><img style="box-shadow:none;"alt="timeline_pre_loader" src="'.plugins_url().'/Ultimate_VC_Addons/assets/img/timeline_pre-loader.gif" /></div>';	
				$output .= '<div class="smile-icon-timeline-wrap  '.$timeline_style.' '.$timeline_layout.' '.$tl_animation.'" '.$cw.' '.$time_sep_bg_color.' '.$time_block_bg_color.' '.$time_sep_color.' style="opacity:0">';
			}
			else{				
				$output .= '<div class="smile-icon-timeline-wrap  '.$timeline_style.' '.$timeline_layout.' '.$tl_animation.'" '.$cw.' '.$time_sep_bg_color.' '.$time_block_bg_color.' '.$time_sep_color.'>';
			}
			$output .= '<div class="timeline-line " style="'.$line_style.'"><z></z></div>';
			$output .='<div class="timeline-wrapper">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '</div>';						
			return $output ;
		}
		function icon_timeline_sep($atts, $content=null){
			$time_sep_title = $time_sep_color = $time_sep_bg_color = $animation = $el_class = $line_style = $line_color =  $icon_style = $seperator_style = '';
			extract(shortcode_atts(array(
				'time_sep_title' => '. . .',
				'time_sep_color' => '',
				'time_sep_bg_color' =>'',
				'line_style' =>'',
				'time_block_bg_color'=>'',
				'line_color' =>'',
				'line_width' =>'',
				'line_radius' => '',
				'el_class' =>'',
				'font_size'	=>'',
				'seperator_title_font' => '',
				'seperator_title_font_style' => ''
			), $atts));
			//$li_prefix = '<div class="timeline-block separator'.$el_class.'">';
			//$li_suffix = '</div>';	
			if($time_sep_color != '')
				$seperator_style .= 'color:'.$time_sep_color.';';
			if($line_style != '')
				$seperator_style .= 'border-style:'.$line_style.';';
			if($line_color != '')
				$seperator_style .= 'border-color:'.$line_color.';';
			if($line_width != '')
				$seperator_style .= 'border-width:'.$line_width.'px;';
			if($line_radius != '')
				$seperator_style .= 'border-radius:'.$line_radius.'px;';
			if($font_size != '')
				$seperator_style .= 'font-size:'.$font_size.'px;';
			if($seperator_title_font != '')
			{
				$font_family = get_ultimate_font_family($seperator_title_font);
				$seperator_style .= 'font-family:'.$font_family.';';
					$args = array(
					$seperator_title_font
				);
				enquque_ultimate_google_fonts($args);
				if($seperator_title_font_style != '')
				{
					$font_style = get_ultimate_font_family($seperator_title_font_style);
					$seperator_style .= $font_style;
				}
			}
			$output ='</div>';
			$output .= '
				<div class="timeline-separator-text '.$el_class.'" data-sep-col="'.$time_sep_color.'" data-sep-bg-col="'.$time_sep_bg_color.'"><span class="sep-text" style="'.$seperator_style.'">'.$time_sep_title.'</span></div><div class="timeline-wrapper ">';
			//$li_prefix = '<div class="timeline-block separator '.$el_class.'">';
			//$li_suffix = '</div>';			
			$style ='';
			//	$style .= $time_sep_bg_color!='' ?  'background:'.$time_sep_bg_color.';' : '';
			//	$style .= $time_sep_color!='' ?  'color:'.$time_sep_color.';' : '';
				//$output .='<div class="ult-timeline-title '.$el_class.' " style="'.$style.'">'.$time_sep_title.'</div>';
			return $output;
		}
		function icon_timeline_feat($atts,$content = null){
			$icon_type = $icon_img = $img_width = $icon = $icon_color = $icon_color_bg = $icon_size = $icon_style = $icon_border_style = $icon_border_radius = $icon_color_border = $icon_border_size = $icon_border_spacing = $icon_link = $el_class = $icon_animation = $time_title = $time_link = $time_link_apply = $time_read_text = $time_icon = $time_icon_color =  $time_icon_bg_color =  $time_position  = $font_size = $line_color = $animation = $icon_border_style = $icon_border_size = $border_color = $title_style = $desc_style = '' ;
			$font_args = array();
			extract(shortcode_atts(array(
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
				'icon_link' => '',
				'icon_animation' => '',
				'time_title'	  => '',
				'title_font' => '',
				'title_font_style' => '',
				'title_font_size' => '',
				'title_font_color' => '',
				'desc_font' => '',
				'desc_font_style' => '',
				'desc_font_size' => '',
				'desc_font_color' => '',			
				//'time_position' => '',
				'time_link'	   => '',				
				'time_link_apply'   => '',				
				'time_read_text' => '', 
				'el_class'	  => '',
				//parent atts				
				'font_size' => '',
				'line_color' => '',
				//SEp
				'time_sep_color' => '',
				'time_sep_bg_color' =>'',
				'line_style' =>'',
				'time_block_bg_color'=>'',
				'line_color' =>'',
				'arrow_position' => ''
				),$atts));
			$html = '';
			$line_style = $custom_style = $bg_cls = '';
			$box_icon = do_shortcode('[just_icon icon_type="'.$icon_type.'" icon="'.$icon.'" icon_img="'.$icon_img.'" img_width="'.$img_width.'" icon_size="'.$icon_size.'" icon_color="'.$icon_color.'" icon_style="'.$icon_style.'" icon_color_bg="'.$icon_color_bg.'" icon_color_border="'.$icon_color_border.'"  icon_border_style="'.$icon_border_style.'" icon_border_size="'.$icon_border_size.'" icon_border_radius="'.$icon_border_radius.'" icon_border_spacing="'.$icon_border_spacing.'" icon_link="'.$icon_link.'" icon_animation="'.$icon_animation.'"]');
			if($icon_color_bg == "")
				$bg_cls .= 'tl-icon-no-bg';
			if($line_color!='')
				$line_style = 'border-right-color:'.$line_color.';';
			if($font_size!=''){
				$line_style.='top:'.($font_size*2).'px;';
			}
			/* title */
			if($title_font != '')
			{
				$font_family = get_ultimate_font_family($title_font);
				$title_style .= 'font-family:'.$font_family.';';
				array_push($font_args, $title_font);
			}
			if($title_font_style != '')
				$title_style .= get_ultimate_font_style($title_font_style);
			if($title_font_size != '')
				$title_style .= 'font-size:'.$title_font_size.'px;';
			if($title_font_color != '')
				$title_style .= 'color:'.$title_font_color.';';
			/* description */
			if($desc_font != '')
			{
				$font_family = get_ultimate_font_family($desc_font);
				$desc_style .= 'font-family:'.$font_family.';';
				array_push($font_args, $desc_font);
			}
			if($desc_font_style != '')
				$desc_style .= get_ultimate_font_style($desc_font_style);
			if($desc_font_size != '')
				$desc_style .= 'font-size:'.$desc_font_size.'px;';
			if($desc_font_color != '')
				$desc_style .= 'color:'.$desc_font_color.';';
			enquque_ultimate_google_fonts($font_args);
			$li_prefix = '<div class="timeline-block '.$el_class.'"><div class="timeline-dot"></div><div class="ult-timeline-arrow"><s></s><l></l></div>';			
			$li_suffix ='</div>';
			$style = ($time_icon_color !== '') ? ' color:'.$time_icon_color.';' : ' ';
			$style .= ($time_icon_bg_color !== '') ? ' background:'.$time_icon_bg_color.';' : ' ';
			$style .= ($font_size !== '') ? ' font-size:'.$font_size.'px;' : ' ';
			$icon_pad = '';
			$header_block_style ='';			
			$icon = '<div class="timeline-icon-block"'.$icon_pad.'><div class="ult-timeline-icon '.$bg_cls.'" style="'.$style.'">';
			if($icon_type!='noicon')
				$icon .= $box_icon;//'<i  style="'.$icon_style.'" class="'.$time_icon.'" ></i>';
			$icon .= '</div> <!-- icon --></div>';	
			$link_sufix = $link_prefix = '';					
			if($time_link !=''){
				$href = vc_build_link($time_link);				
				$link_prefix = '<a href = '.$href['url'].'>';$link_sufix = '</a>';				
			}
			$vv_link ='';					
			if($time_link !=''){
				$href = vc_build_link($time_link);				
				$link_prefix = '<a class="tl-desc-a" href = '.$href['url'].'>';
				$vv_link = $href['url'];
				$link_sufix = '</a>';				
			}
			$header = '';	
			$header .= '<div class="timeline-header-block" '.$header_block_style.'>
							<div class="timeline-header" style="">';		
			$header .= '<h3 class="ult-timeline-title" style="'.$title_style.'">'.$time_title.'</h3>';
			if ($time_link_apply!='' && $time_link_apply == 'title') {
				$header = $link_prefix.$header.$link_sufix;
				//$header.='<a href="'.$vv_link.'" class="link-title"></a>';
			}
			$header .= '<p style="'.$desc_style.'">'.do_shortcode($content).'</p>';						
			if ($time_link_apply!='' && $time_link_apply == 'more') {
				$header = $header.'<p>'.$link_prefix.$time_read_text.$link_sufix.'</p>';
			}	
			$header .= '</div> <!-- header --></div>';
			$contt='';
			if($time_link_apply!='' && $time_link_apply == 'box'){
				$contt.='<a href="'.$vv_link.'" class="link-box"></a>';
				//$li_prefix = $link_prefix.$li_prefix;
				//$li_suffix = $link_sufix.$li_suffix;
			}
			$icon_wrap_preffix='<div class="timeline-icon-block">';
			$icon_wrap_suffix='</div>';
			$heading_preffix='<div class="timeline-header-block">';
			$heading_suffix='</div>';
			$html =  $icon . $header ;
			$feat_spl ='</div>';
			if($arrow_position == 'bottom') // featured item at top
				$ext_class = 'feat-top';
			else
				$ext_class = '';
			$feat_spl .= '<div class="timeline-feature-item feat-item '.$ext_class.'">';
			$contt.='<div class="feat-dot '.$ext_class.'"><div class="timeline-dot"></div></div><div class="ult-timeline-arrow '.$ext_class.'"><s></s><l></l></div>'.$html;
			$contt .='</div><div class="timeline-wrapper ">';
			$feat_spl .=$contt;
			return $feat_spl ;
		}
		function icon_timeline_item($atts,$content = null){
			$icon_type = $icon_img = $img_width = $icon = $icon_color = $icon_color_bg = $icon_size = $icon_style = $icon_border_style = $icon_border_radius = $icon_color_border = $icon_border_size = $icon_border_spacing = $icon_link = $el_class = $icon_animation = $time_title = $time_link = $time_link_apply = $time_read_text = $time_icon = $time_icon_color =  $time_icon_bg_color =  $time_position  = $font_size = $line_color = $animation = $icon_border_style = $icon_border_size = $border_color = $title_style = $desc_style = '' ;
			$font_args = array();
			extract(shortcode_atts(array(
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
				'icon_link' => '',
				'icon_animation' => '',
				'time_title'	  => '',
				'title_font' => '',
				'title_font_style' => '',
				'title_font_size' => '',
				'title_font_color' => '',
				'desc_font' => '',
				'desc_font_style' => '',
				'desc_font_size' => '',
				'desc_font_color' => '',					
				//'time_position' => '',
				'time_link'	   => '',				
				'time_link_apply'   => '',				
				'time_read_text' => '', 
				'el_class'	  => '',
				//parent atts				
				'font_size' => '',
				'line_color' => '',
				),$atts));
			$html = '';
			$line_style = $custom_style = $bg_cls = '';
			$box_icon = do_shortcode('[just_icon icon_type="'.$icon_type.'" icon="'.$icon.'" icon_img="'.$icon_img.'" img_width="'.$img_width.'" icon_size="'.$icon_size.'" icon_color="'.$icon_color.'" icon_style="'.$icon_style.'" icon_color_bg="'.$icon_color_bg.'" icon_color_border="'.$icon_color_border.'"  icon_border_style="'.$icon_border_style.'" icon_border_size="'.$icon_border_size.'" icon_border_radius="'.$icon_border_radius.'" icon_border_spacing="'.$icon_border_spacing.'" icon_link="'.$icon_link.'" icon_animation="'.$icon_animation.'"]');
			if($icon_color_bg == "")
				$bg_cls .= 'tl-icon-no-bg';
			if($line_color!='')
				$line_style = 'border-right-color:'.$line_color.';';
			if($font_size!=''){
				$line_style.='top:'.($font_size*2).'px;';
			}
			/* title */
			if($title_font != '')
			{
				$font_family = get_ultimate_font_family($title_font);
				$title_style .= 'font-family:'.$font_family.';';
				array_push($font_args, $title_font);
			}
			if($title_font_style != '')
				$title_style .= get_ultimate_font_style($title_font_style);
			if($title_font_size != '')
				$title_style .= 'font-size:'.$title_font_size.'px;';
			if($title_font_color != '')
				$title_style .= 'color:'.$title_font_color.';';
			/* description */
			if($desc_font != '')
			{
				$font_family = get_ultimate_font_family($desc_font);
				$desc_style .= 'font-family:'.$font_family.';';
				array_push($font_args, $desc_font);
			}
			if($desc_font_style != '')
				$desc_style .= get_ultimate_font_style($desc_font_style);
			if($desc_font_size != '')
				$desc_style .= 'font-size:'.$desc_font_size.'px;';
			if($desc_font_color != '')
				$desc_style .= 'color:'.$desc_font_color.';';
			enquque_ultimate_google_fonts($font_args);
			$li_prefix = '<div class="timeline-block '.$el_class.'"><div class="timeline-dot"></div><div class="ult-timeline-arrow"><s></s><l></l></div>';			
			$li_suffix ='</div>';
			$style = ($time_icon_color !== '') ? ' color:'.$time_icon_color.';' : ' ';
			$style .= ($time_icon_bg_color !== '') ? ' background:'.$time_icon_bg_color.';' : ' ';
			$style .= ($font_size !== '') ? ' font-size:'.$font_size.'px;' : ' ';
			$icon_pad = '';
			$header_block_style ='';
			$icon = '<div class="timeline-icon-block"><div class="ult-timeline-icon '.$bg_cls.'" style="'.$style.'">';
			if($icon_type!='noicon')
				$icon .= $box_icon;//'<i  style="'.$icon_style.'" class="'.$time_icon.'" ></i>';
			$icon .= '</div> <!-- icon --></div>';	
			$link_sufix = $link_prefix = '';
			$vv_link ='';					
			if($time_link !=''){
				$href = vc_build_link($time_link);				
				$link_prefix = '<a class="tl-desc-a" href = '.$href['url'].'>';
				$vv_link = $href['url'];
				$link_sufix = '</a>';				
			}
			$header = '';	
			$header .= '<div class="timeline-header-block" '.$header_block_style.'>
							<div class="timeline-header" style="">';		
			$header .= '<h3 class="ult-timeline-title" style="'.$title_style.'">'.$time_title.'</h3>';
			if ($time_link_apply!='' && $time_link_apply == 'title') {
				//$header = $link_prefix.$header.$link_sufix;
				$header.='<a href="'.$vv_link.'" class="link-title"></a>';
			}
			$header .= '<p style="'.$desc_style.'">'.do_shortcode($content).'</p>';						
			if ($time_link_apply!='' && $time_link_apply == 'more') {
				$header = $header.'<p>'.$link_prefix.$time_read_text.$link_sufix.'</p>';
			}	
			$header .= '</div> <!-- header --></div>';
			if($time_link_apply!='' && $time_link_apply == 'box'){
				$header.='<a href="'.$vv_link.'" class="link-box"></a>';
				//$li_prefix = $link_prefix.$li_prefix;
				//$li_suffix = $link_sufix.$li_suffix;
			}
			$icon_wrap_preffix='<div class="timeline-icon-block">';
			$icon_wrap_suffix='</div>';
			$heading_preffix='<div class="timeline-header-block">';
			$heading_suffix='</div>';
			$html = $li_prefix . $icon . $header .  $li_suffix ;
			return $html ;
		}
	}
}
if(class_exists('WPBakeryShortCodesContainer'))
{
	class WPBakeryShortCode_icon_timeline extends WPBakeryShortCodesContainer {
	}
	class WPBakeryShortCode_icon_timeline_item extends WPBakeryShortCode {
	}
}
if(class_exists('Ultimate_Icon_Timeline'))
{
	$Ultimate_Icon_Timeline = new Ultimate_Icon_Timeline();
}