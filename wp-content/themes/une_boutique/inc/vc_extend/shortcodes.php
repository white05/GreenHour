<?php

/*-------------------------------------------------------------------------------------------*/
/*   Adds new image sizes
/*-------------------------------------------------------------------------------------------*/

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'imac-size', 983, 514, true );
    add_image_size( 'macbook-size', 801, 426, true );
}

/*==============================================*/
/*  Updating the existing VC elements
/*==============================================*/

/*-------------------------------------------------------------------------------------------*/
/*    Customizing the Image Carousel
/*-------------------------------------------------------------------------------------------*/

vc_remove_param("vc_images_carousel", "mode");
vc_remove_param("vc_images_carousel", "partial_view");
vc_remove_param("vc_images_carousel", "wrap");

/*-------------------------------------------------------------------------------------------*/
/*    removes some vc elements
/*-------------------------------------------------------------------------------------------*/

vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button2");

/*-------------------------------------------------------------------------------------------*/
/*  Customizes Gallery Shortcode params
/*-------------------------------------------------------------------------------------------*/

$setting = array (
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "une_boutique"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "une_boutique")
        ),
        array(
            "type" => "attach_images",
            "heading" => __("Images", "une_boutique"),
            "param_name" => "images",
            "value" => "",
            "description" => __("Select images from media library.", "une_boutique")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Gallery Type", "une_boutique"),
            "param_name" => "type",
            "value" => array(__("Capital Touch Slider", "une_boutique") => "capital_touch_slider", __("Flex slider fade", "une_boutique") => "flexslider_fade", __("Flex slider slide", "une_boutique") => "flexslider_slide", __("Nivo slider", "une_boutique") => "nivo", __("Image grid", "une_boutique") => "image_grid"),
            "description" => __("Select gallery type.", "une_boutique")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Transition Effect", "une_boutique"),
            "param_name" => "transition_effect",
            "value" => array("fade", "backSlide", "goDown", "fadeUp"),
            "description" => __("Select gallery type.", "une_boutique"),
            "dependency" => Array( 'element' => "type", 'value' => array('capital_touch_slider') ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("In Device Slider?", "une_boutique"),
            "param_name" => "in_device",
            "description" => __("Do you want to put your slider in a device, like a laptop or an iPhone? Check this option and then select your device.", "une_boutique"),
            "value" => Array(__("Yes, please", "une_boutique") => 'true'),
            "dependency" => Array('element' => "type", 'value' => array('capital_touch_slider', 'flexslider_fade', 'flexslider_slide', 'nivo')),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Device Type", "une_boutique"),
            "param_name" => "device_type",
            "value" => array( __("iMac", "une_boutique") => "imac", __("MacBook Pro", "une_boutique") => "mac_book_pro"),
            "description" => __("Choose your device type.", "une_boutique"),
            "dependency" => Array('element' => "type", 'value' => array('capital_touch_slider', 'flexslider_fade', 'flexslider_slide', 'nivo'), 'element' => 'in_device', 'not_empty' => true ),
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Glare Effect?", "une_boutique"),
            "param_name" => "glare_effect",
            "description" => __("Use the glare effect on the deives?", "une_boutique"),
            "value" => Array(__("Yes, please", "une_boutique") => 'true'),
            "dependency" => Array('element' => "type", 'value' => array('capital_touch_slider', 'flexslider_fade', 'flexslider_slide', 'nivo'), 'element' => 'in_device', 'not_empty' => true ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Auto rotate slides", "une_boutique"),
            "param_name" => "interval",
            "value" => 0,
            "description" => __("Auto rotate slides each X seconds.", "une_boutique"),
            "dependency" => Array('element' => "type", 'value' => array('capital_touch_slider', 'flexslider_fade', 'flexslider_slide', 'nivo'))
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image size", "une_boutique"),
            "param_name" => "img_size",
            "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "une_boutique")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("On click", "une_boutique"),
            "param_name" => "onclick",
            "value" => array(__("Open LightBox", "une_boutique") => "link_image", __("Do nothing", "une_boutique") => "link_no", __("Open custom link", "une_boutique") => "custom_link"),
            "description" => __("What to do when slide is clicked?", "une_boutique")
        ),
        array(
            "type" => "exploded_textarea",
            "heading" => __("Custom links", "une_boutique"),
            "param_name" => "custom_links",
            "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'une_boutique'),
            "dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Custom link target", "une_boutique"),
            "param_name" => "custom_links_target",
            "description" => __('Select where to open  custom links.', 'une_boutique'),
            "dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
            'value' => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank"),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "une_boutique"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "une_boutique")
        ),
    ),
);
vc_map_update('vc_gallery', $setting);

/*-------------------------------------------------------------------------------------------*/
/*     adds icons to vc tabs and tours
/*-------------------------------------------------------------------------------------------*/

$setting = array (
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "une_boutique"),
            "param_name" => "title",
            "description" => __("Tab title.", "une_boutique")
        ),
        array(
            "type" => "icon_manager",
            "class" => "",
            "heading" => __("Select Icon:", "une_boutique"),
            "param_name" => "title_icon",
            "admin_label" => false,
            "value" => "",
            "description" => __("Select the icon from the tab/tour-section title.", "une_boutique"),
        ),
        array(
            "type" => "tab_id",
            "heading" => __("Tab ID", "une_boutique"),
            "param_name" => "tab_id"
        ),
    ),
);
vc_map_update('vc_tab', $setting);

/*-------------------------------------------------------------------------------------------*/
/*     adds more options to rows
/*-------------------------------------------------------------------------------------------*/

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Full-Width row?", "une_boutique"),
    "param_name" => "row_layout",
    "description" => __("Check this option if you want to make your row full width (you can give it a background color/image to go full width and then insert another row inside it).", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'full'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Anything Slider?", "une_boutique"),
    "param_name" => "anything_slider",
    "description" => __("By checking this option you will turn this row as a container for an anything slider, any inner rows added to this parent row would turn into a slide, you can then add your ellements inside the inner row. You can also columnize the inner rows(which are now your slides).", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'anything-slider'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Auto Play?", "une_boutique"),
    "param_name" => "autoplay",
    "description" => __("Anything Slider Autoplay (every 7 seconds)", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => '-autoplay'),
    "group" => __('Extra Options', 'une_boutique'),
    "dependency" => Array( 'element' => 'anything_slider', 'not_empty' => true ),
);
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Show Pagination?", "une_boutique"),
    "param_name" => "show_pagination",
    "description" => __("Check this option to display pagination bullets. You might need some extera padding on top of your inner row(slide) to make it look better.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'show-pagination'),
    "group" => __('Extra Options', 'une_boutique'),
    "dependency" => Array( 'element' => 'anything_slider', 'not_empty' => true ),
);
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Row Separator Style', 'une_boutique'),
    "param_name" => "row_separator",
    "value" => array(
        __("--NONE--", 'une_boutique') => '',
        __("Simple Transparent Trianle", 'une_boutique') => 'sep-simple-transparent-triangle',
        __("Open Brackets", 'une_boutique') => 'sep-open-brackets',
        ),
    "description" => __("Choose the separator style for the row. It will appear at the bottom of the row, and only works with outer rows.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);

vc_add_param('vc_row', $attributes);
$attributes = array(
        'type' => 'colorpicker',
        'heading' => __( 'Separator Color', 'une_boutique' ),
        'param_name' => 'row_sep_color',
        'description' => __( 'Select border color for row separator. This should usually be the same as the background color of the next row. Leave empty if the next row has it\'s default background color.' , 'une_boutique' ),
        "group" => __('Extra Options', 'une_boutique'),
        "dependency" => Array( 'element' => "row_separator", 'not_empty' => true )
      );
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Show/Hide Elements for Mobile Devices', 'une_boutique'),
    "param_name" => "show_hide",
    "value" => array(
        __("--always show--", 'une_boutique') => '',
        __("VISIBLE for mobile only", 'une_boutique') => 'show-for-small',
        __("VISIBLE for tablets and smaller", 'une_boutique') => 'show-for-medium-down',
        __("VISIBLE for tablets only", 'une_boutique') => 'show-for-medium',
        __("VISIBLE for tablet and larger", 'une_boutique') => 'show-for-medium-up',
        __("VISIBLE for reqular screens and smaller", 'une_boutique') => 'show-for-large-down',
        __("VISIBLE for reqular screens only", 'une_boutique') => 'show-for-large',
        __("VISIBLE for reqular screens and larger", 'une_boutique') => 'show-for-large-up',
        __("VISIBLE for super large screens", 'une_boutique') => 'show-for-xlarge',
        __("HIDDEN for mobile only", 'une_boutique') => 'hide-for-small',
        __("HIDDEN for tablets and smaller", 'une_boutique') => 'hide-for-medium-down',
        __("HIDDEN for tablets only", 'une_boutique') => 'hide-for-medium',
        __("HIDDEN for tablet and larger", 'une_boutique') => 'hide-for-medium-up',
        __("HIDDEN for reqular screens and smaller", 'une_boutique') => 'hide-for-large-down',
        __("HIDDEN for reqular screens only", 'une_boutique') => 'hide-for-large',
        __("HIDDEN for reqular screens and larger", 'une_boutique') => 'hide-for-large-up',
        __("HIDDEN for super large screens", 'une_boutique') => 'hide-for-xlarge',
        __("VISIBLE for landscape orientation", 'une_boutique') => 'show-for-landscape',
        __("VISIBLE for portrait orientation", 'une_boutique') => 'show-for-portrait',
        __("HIDDEN for landscape orientation", 'une_boutique') => 'hide-for-landscape',
        __("HIDDEN for portrait orientation", 'une_boutique') => 'hide-for-portrait',
        __("VISIBLE for touch enabled devices", 'une_boutique') => 'show-for-touch',
        __("HIDDEN for touch enabled devices", 'une_boutique') => 'hide-for-touch',
        __("HIDE Background only for mobile only", 'une_boutique') => 'hide-bg-for-small',
        __("HIDE Background for tablets and smaller", 'une_boutique') => 'hide-bg-for-medium',
        ),
    "description" => __("Select which devices you want your row to be shown or hidden in.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row', $attributes);

$attributes = array(
    "type" => "textfield",
    "heading" => __('Data Attribute', 'une_boutique'),
    "param_name" => "data_attribute",
    "description" => __("Working with a jQuery plugin that needs custom data attribute? your are in luck paste them here.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row', $attributes);

/*-------------------------------------------------------------------------------------------*/
/*     adds more options to Inner rows
/*-------------------------------------------------------------------------------------------*/

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Full-Width row?", "une_boutique"),
    "param_name" => "row_layout",
    "description" => __("Check this option if you want to make your row full width (you can give it a background color/image to go full width and then insert another row inside it).", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'full'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row_inner', $attributes);

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Show/Hide Elements for Mobile Devices', 'une_boutique'),
    "param_name" => "show_hide",
    "value" => array(
        __("--always show--", 'une_boutique') => '',
        __("VISIBLE for mobile only", 'une_boutique') => 'show-for-small',
        __("VISIBLE for tablets and smaller", 'une_boutique') => 'show-for-medium-down',
        __("VISIBLE for tablets only", 'une_boutique') => 'show-for-medium',
        __("VISIBLE for tablet and larger", 'une_boutique') => 'show-for-medium-up',
        __("VISIBLE for reqular screens and smaller", 'une_boutique') => 'show-for-large-down',
        __("VISIBLE for reqular screens only", 'une_boutique') => 'show-for-large',
        __("VISIBLE for reqular screens and larger", 'une_boutique') => 'show-for-large-up',
        __("VISIBLE for super large screens", 'une_boutique') => 'show-for-xlarge',
        __("HIDDEN for mobile only", 'une_boutique') => 'hide-for-small',
        __("HIDDEN for tablets and smaller", 'une_boutique') => 'hide-for-medium-down',
        __("HIDDEN for tablets only", 'une_boutique') => 'hide-for-medium',
        __("HIDDEN for tablet and larger", 'une_boutique') => 'hide-for-medium-up',
        __("HIDDEN for reqular screens and smaller", 'une_boutique') => 'hide-for-large-down',
        __("HIDDEN for reqular screens only", 'une_boutique') => 'hide-for-large',
        __("HIDDEN for reqular screens and larger", 'une_boutique') => 'hide-for-large-up',
        __("HIDDEN for super large screens", 'une_boutique') => 'hide-for-xlarge',
        __("VISIBLE for landscape orientation", 'une_boutique') => 'show-for-landscape',
        __("VISIBLE for portrait orientation", 'une_boutique') => 'show-for-portrait',
        __("HIDDEN for landscape orientation", 'une_boutique') => 'hide-for-landscape',
        __("HIDDEN for portrait orientation", 'une_boutique') => 'hide-for-portrait',
        __("VISIBLE for touch enabled devices", 'une_boutique') => 'show-for-touch',
        __("HIDDEN for touch enabled devices", 'une_boutique') => 'hide-for-touch',
        __("HIDE Background only for mobile only", 'une_boutique') => 'hide-bg-for-small',
        __("HIDE Background for tablets and smaller", 'une_boutique') => 'hide-bg-for-medium',
        ),
    "description" => __("Select which devices you want your row to be shown or hidden in.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row_inner', $attributes);

$attributes = array(
    "type" => "textfield",
    "heading" => __('Data Attribute', 'une_boutique'),
    "param_name" => "data_attribute",
    "description" => __("Working with a jQuery plugin that needs custom data attribute? your are in luck paste them here.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_row_inner', $attributes);

/*-------------------------------------------------------------------------------------------*/
/*     adds more options to Columns
/*-------------------------------------------------------------------------------------------*/

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Align Text', 'une_boutique'),
    "param_name" => "text_align",
    "value" => array(
                    __("Align Left", 'une_boutique') => '',
                    __("Align Center", 'une_boutique') => 'text-center',
                    __("Align Right", 'une_boutique') => 'text-right',
                  ),
    "description" => __("Choose the text alignment in the column (this also affects the button alignment in the column.)", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Empty Space?", "une_boutique"),
    "param_name" => "empty_space",
    "description" => __("Checkmark this option if you are using this column as an empty space.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'empty-space'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Match Heights?", "une_boutique"),
    "param_name" => "match_height",
    "description" => __("Checkmark this option in this column and the rest of the columns that you want their heights to be identical.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'true'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column', $attributes);

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Show/Hide Elements for Mobile Devices', 'une_boutique'),
    "param_name" => "show_hide",
    "value" => array(
                    __("--always show--", 'une_boutique') => '',
                    __("VISIBLE for mobile only", 'une_boutique') => 'show-for-small',
                    __("VISIBLE for tablets and smaller", 'une_boutique') => 'show-for-medium-down',
                    __("VISIBLE for tablets only", 'une_boutique') => 'show-for-medium',
                    __("VISIBLE for tablet and larger", 'une_boutique') => 'show-for-medium-up',
                    __("VISIBLE for reqular screens and smaller", 'une_boutique') => 'show-for-large-down',
                    __("VISIBLE for reqular screens only", 'une_boutique') => 'show-for-large',
                    __("VISIBLE for reqular screens and larger", 'une_boutique') => 'show-for-large-up',
                    __("VISIBLE for super large screens", 'une_boutique') => 'show-for-xlarge',
                    __("HIDDEN for mobile only", 'une_boutique') => 'hide-for-small',
                    __("HIDDEN for tablets and smaller", 'une_boutique') => 'hide-for-medium-down',
                    __("HIDDEN for tablets only", 'une_boutique') => 'hide-for-medium',
                    __("HIDDEN for tablet and larger", 'une_boutique') => 'hide-for-medium-up',
                    __("HIDDEN for reqular screens and smaller", 'une_boutique') => 'hide-for-large-down',
                    __("HIDDEN for reqular screens only", 'une_boutique') => 'hide-for-large',
                    __("HIDDEN for reqular screens and larger", 'une_boutique') => 'hide-for-large-up',
                    __("HIDDEN for super large screens", 'une_boutique') => 'hide-for-xlarge',
                    __("VISIBLE for landscape orientation", 'une_boutique') => 'show-for-landscape',
                    __("VISIBLE for portrait orientation", 'une_boutique') => 'show-for-portrait',
                    __("HIDDEN for landscape orientation", 'une_boutique') => 'hide-for-landscape',
                    __("HIDDEN for portrait orientation", 'une_boutique') => 'hide-for-portrait',
                    __("VISIBLE for touch enabled devices", 'une_boutique') => 'show-for-touch',
                    __("HIDDEN for touch enabled devices", 'une_boutique') => 'hide-for-touch',
                    __("HIDE Background only for mobile only", 'une_boutique') => 'hide-bg-for-small',
                    __("HIDE Background for tablets and smaller", 'une_boutique') => 'hide-bg-for-medium',
                  ),
    "description" => __("Select which devices you want your row to be shown or hidden in.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column', $attributes);

$attributes = array(
            "type" => "textfield",
            "heading" => __("Background Position", "une_boutique"),
            "param_name" => "bg_position",
            "value" => __("", "une_boutique"),
            "description" => __("Set the position of the column background. eg center left or 530px -120px", "une_boutique"),
            "group" => __('Design options', 'une_boutique'),
        );
vc_add_param('vc_column', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Column Mask?", "une_boutique"),
    "param_name" => "column_mask",
    "description" => __("Checkmark this option if you want to have mask overlay over your column when the column is hovered over.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'true'),
    "group" => __('Column Overlay', 'une_boutique'),
);
vc_add_param('vc_column', $attributes);

$attributes = array(
    'type' => 'vc_link',
    'heading' => __( 'URL (Link)', 'une_boutique' ),
    'param_name' => 'overlay_link',
    'description' => __( 'Overlay Link (optional).', 'une_boutique' ),
    "group" => __('Column Overlay', 'une_boutique'),
    "dependency" => Array( 'element' => "column_mask", 'not_empty' => true )
);
vc_add_param('vc_column', $attributes);

$attributes = array(
        'type' => 'colorpicker',
        'heading' => __( 'Custom Overlay color', 'une_boutique' ),
        'param_name' => 'overlay_bg',
        'description' => __( 'Select border color for columns overlay.', 'une_boutique' ),
        "group" => __('Column Overlay', 'une_boutique'),
        "dependency" => Array( 'element' => "column_mask", 'not_empty' => true )
      );
vc_add_param('vc_column', $attributes);

/*-------------------------------------------------------------------------------------------*/
/*     adds more options to Inner Columns
/*-------------------------------------------------------------------------------------------*/

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Align Text', 'une_boutique'),
    "param_name" => "text_align",
    "value" => array(
                    __("Align Left", 'une_boutique') => '',
                    __("Align Center", 'une_boutique') => 'text-center',
                    __("Align Right", 'une_boutique') => 'text-right',
                  ),
    "description" => __("Choose the text alignment in the column (this also affects the button alignment in the column.)", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Empty Space?", "une_boutique"),
    "param_name" => "empty_space",
    "description" => __("Checkmark this option if you are using this column as an empty space.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'empty-space'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Match Heights?", "une_boutique"),
    "param_name" => "match_height",
    "description" => __("Checkmark this option in this column and the rest of the columns that you want their heights to be identical.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'true'),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
    "type" => "dropdown",
    "heading" => __('Show/Hide Elements for Mobile Devices', 'une_boutique'),
    "param_name" => "show_hide",
    "value" => array(
                    __("--always show--", 'une_boutique') => '',
                    __("VISIBLE for mobile only", 'une_boutique') => 'show-for-small',
                    __("VISIBLE for tablets and smaller", 'une_boutique') => 'show-for-medium-down',
                    __("VISIBLE for tablets only", 'une_boutique') => 'show-for-medium',
                    __("VISIBLE for tablet and larger", 'une_boutique') => 'show-for-medium-up',
                    __("VISIBLE for reqular screens and smaller", 'une_boutique') => 'show-for-large-down',
                    __("VISIBLE for reqular screens only", 'une_boutique') => 'show-for-large',
                    __("VISIBLE for reqular screens and larger", 'une_boutique') => 'show-for-large-up',
                    __("VISIBLE for super large screens", 'une_boutique') => 'show-for-xlarge',
                    __("HIDDEN for mobile only", 'une_boutique') => 'hide-for-small',
                    __("HIDDEN for tablets and smaller", 'une_boutique') => 'hide-for-medium-down',
                    __("HIDDEN for tablets only", 'une_boutique') => 'hide-for-medium',
                    __("HIDDEN for tablet and larger", 'une_boutique') => 'hide-for-medium-up',
                    __("HIDDEN for reqular screens and smaller", 'une_boutique') => 'hide-for-large-down',
                    __("HIDDEN for reqular screens only", 'une_boutique') => 'hide-for-large',
                    __("HIDDEN for reqular screens and larger", 'une_boutique') => 'hide-for-large-up',
                    __("HIDDEN for super large screens", 'une_boutique') => 'hide-for-xlarge',
                    __("VISIBLE for landscape orientation", 'une_boutique') => 'show-for-landscape',
                    __("VISIBLE for portrait orientation", 'une_boutique') => 'show-for-portrait',
                    __("HIDDEN for landscape orientation", 'une_boutique') => 'hide-for-landscape',
                    __("HIDDEN for portrait orientation", 'une_boutique') => 'hide-for-portrait',
                    __("VISIBLE for touch enabled devices", 'une_boutique') => 'show-for-touch',
                    __("HIDDEN for touch enabled devices", 'une_boutique') => 'hide-for-touch',
                    __("HIDE Background only for mobile only", 'une_boutique') => 'hide-bg-for-small',
                    __("HIDE Background for tablets and smaller", 'une_boutique') => 'hide-bg-for-medium',
                  ),
    "description" => __("Select which devices you want your row to be shown or hidden in.", "une_boutique"),
    "group" => __('Extra Options', 'une_boutique'),
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
            "type" => "textfield",
            "heading" => __("Background Position", "une_boutique"),
            "param_name" => "bg_position",
            "value" => __("", "une_boutique"),
            "description" => __("Set the position of the column background. eg center left or 530px -120px", "une_boutique"),
            "group" => __('Design options', 'une_boutique'),
        );
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
    "type" => 'checkbox',
    "heading" => __("Column Mask?", "une_boutique"),
    "param_name" => "column_mask",
    "description" => __("Checkmark this option if you want to have mask overlay over your column when the column is hovered over.", "une_boutique"),
    "value" => Array(__("Yes, please", "une_boutique") => 'true'),
    "group" => __('Column Overlay', 'une_boutique'),
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
    'type' => 'vc_link',
    'heading' => __( 'URL (Link)', 'une_boutique' ),
    'param_name' => 'overlay_link',
    'description' => __( 'Overlay Link (optional).', 'une_boutique' ),
    "group" => __('Column Overlay', 'une_boutique'),
    "dependency" => Array( 'element' => "column_mask", 'not_empty' => true )
);
vc_add_param('vc_column_inner', $attributes);

$attributes = array(
        'type' => 'colorpicker',
        'heading' => __( 'Custom Overlay color', 'une_boutique' ),
        'param_name' => 'overlay_bg',
        'description' => __( 'Select border color for columns overlay.', 'une_boutique' ),
        "group" => __('Column Overlay', 'une_boutique'),
        "dependency" => Array( 'element' => "column_mask", 'not_empty' => true )
      );
vc_add_param('vc_column_inner', $attributes);

/*-------------------------------------------------------------------------------------------*/
/*  adds new params to the buttons
/*-------------------------------------------------------------------------------------------*/

$setting = array (
    "params" => array(
        array(
            "type"          => "dropdown",
            "heading"       => __("Button Type", "une_boutique"),
            "param_name"    => "button_type",
            "value"         => array("flat", "3d", "border", "classic"),
            "description"   => __("Select the button style type.", "une_boutique")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Text on the button", "une_boutique"),
            "holder" => "button",
            "class" => "wpb_button",
            "param_name" => "title",
            "value" => __("Text on the button", "une_boutique"),
            "description" => __("Text on the button.", "une_boutique")
        ),
        array(
            "type" => "textfield",
            "heading" => __("URL (Link)", "une_boutique"),
            "param_name" => "href",
            "description" => __("Button link.", "une_boutique")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Target", "une_boutique"),
            "param_name" => "target",
            "value" => array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank"),
            "dependency" => Array('element' => "href", 'not_empty' => true)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Color", "une_boutique"),
            "param_name" => "color",
            "value" => array(__("Grey", "js_composer") => "wpb_button", __("Blue", "js_composer") => "btn-primary", __("Turquoise", "js_composer") => "btn-info", __("Green", "js_composer") => "btn-success", __("Orange", "js_composer") => "btn-warning", __("Red", "js_composer") => "btn-danger", __("Black", "js_composer") => "btn-inverse"),
            "description" => __("Button color.", "une_boutique")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Size", "une_boutique"),
            "param_name" => "size",
            "value" => array(__("Regular size", "js_composer") => "wpb_regularsize", __("Large", "js_composer") => "btn-large", __("Small", "js_composer") => "btn-small", __("Mini", "js_composer") => "btn-mini"),
            "description" => __("Button size.", "une_boutique")
        ),
        array(
            "type" => "icon_manager",
            "class" => "",
            "heading" => __("Select Icon:", "une_boutique"),
            "param_name" => "fa_icon",
            "value" => "",
            "description" => __("Select the icon from the button", "une_boutique"),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => __("Icon Position", "une_boutique"),
            "param_name"    => "icon_position",
            "value"         => array("right", "left"),
            "description"   => __("Select the position of the icon.", "une_boutique")
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Custom Styles", "une_boutique"),
            "param_name" => "custom_styles",
            "description" => __("You want custom styles?", "une_boutique"),
            "value" => Array(__("Yes, please", "une_boutique") => 'true')
        ),
        array(
            "type" => "number",
            "class" => "",
            "heading" => __("Choose Border Radius", "une_boutique"),
            "param_name" => "border_radius",
            "value" => '',
            "min" => 0,
            "max" => '',
            "suffix" => "px",
            "description" => __("Customize the border radius of the button", "une_boutique"),
            "dependency" => Array( 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "number",
            "class" => "",
            "heading" => __("Choose Border Width", "une_boutique"),
            "param_name" => "border_width",
            "value" => '',
            "min" => 0,
            "max" => '',
            "suffix" => "px",
            "description" => __("Customize the border width of the button", "une_boutique"),
            "dependency" => Array( 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "number",
            "class" => "",
            "heading" => __("Choose Text Size", "une_boutique"),
            "param_name" => "text_size",
            "value" => '14',
            "min" => 10,
            "max" => '',
            "suffix" => "px",
            "description" => __("Customize the text size of the button", "une_boutique"),
            "dependency" => Array( 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Custom background color:", "une_boutique"),
            "param_name" => "custom_bg",
            "value" => "",
            "description" => __("Choose a custom background color.", "une_boutique"),
            "dependency" => Array('element' => 'button_type', 'value' => array('flat', '3d'), 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Custom text color:", "une_boutique"),
            "param_name" => "custom_color",
            "value" => "",
            "description" => __("Choose a custom text color.", "une_boutique"),
            "dependency" => Array( 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Custom border color:", "une_boutique"),
            "param_name" => "border_color",
            "value" => "",
            "description" => __("Choose a custom border color. (works only for border button type)", "une_boutique"),
            "dependency" => Array('element' => 'button_type', 'value' => array('border'), 'element' => 'custom_styles', 'not_empty' => true ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "une_boutique"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "une_boutique")
        )
    ),
);
vc_map_update('vc_button', $setting);

/*-------------------------------------------------------------------------------------------*/
/*  random string genrator (this is not a shortcode, but it's used in carousel shortcodes)
/*-------------------------------------------------------------------------------------------*/

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9));

for ($i = 0; $i < $length; $i++) {
    $key .= $keys[array_rand($keys)];
}
    return $key;
}

/*-------------------------------------------------------------------------------------------*/
/*  Product Categories Slider
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'product_categories_slider', 'vc_categories_slider_shortcode' );

function vc_categories_slider_shortcode ($atts) {
extract(shortcode_atts(array(
    'limit'             =>  '12',
    'orderby'           =>  'name',
    'order'             =>  'asc',
    'slide_speed'       =>  '800',
    'items'             =>  '4',
    'auto_play'         =>  'false',
    'navigation'        =>  'true',
    'pagination'        =>  'false',
    'scroll_per_page'   =>  'false',
    'category_id'       =>  '',
    'parent_only'       =>  '',
), $atts));
    
    $uniqid = random_string(6);
    $return = '<div id="categories_slides" class="categories-slides_'.$uniqid.'">';
    $return .= do_shortcode('[product_categories ids="'. $category_id .'" parent="'. $parent_only .'" number="'. $limit .'" columns="99999" order="'.$order.'" orderby="'.$orderby.'"]');
    $return .= '</div>';
    $return .= '<script>jQuery(document).ready(function($){"use strict";$(".categories-slides_'.$uniqid.' .woocommerce .products").owlCarousel({items:'.$items.',autoPlay:'.$auto_play.',itemsTablet:[768,3],paginationSpeed:500,rewindSpeed:'.$slide_speed.',slideSpeed:'.$slide_speed.',navigation:'.$navigation.',navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],scrollPerPage:'.$scroll_per_page.',pagination:'.$pagination.',addClassActive:true,lazyLoad:true,lazyEffect:"fade",});});</script>';

    return $return;
}

vc_map( array(
   "name"              => __("Product Category Silder", 'une_boutique'),
   "base"              => "product_categories_slider",
   "class"             => "",
   "category"          => __('Capital Shortcodes', 'une_boutique'),
   "icon"              => "icon-wpb-products_carousel",
   "params"            => array(
        array(
            "type"        => "textfield",
            "class"       => "",
            "heading"     => __("Number of visible items", 'une_boutique'),
            "param_name"  => "items",
            "admin_label"   => true,
            "value"       => __("4", 'une_boutique'),
            "description" => __("Enter The number of items visible at the same time", 'une_boutique'),
        ),
        array(
            "type"        => "textfield",
            "class"       => "",
            "heading"     => __("Limit", 'une_boutique'),
            "param_name"  => "limit",
            "admin_label"   => true,
            "value"       => __("12", 'une_boutique'),
            "description" => __("Limit The Number of catgeories to include in the carousel", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Items Ordered By", "une_boutique"),
            "param_name"    => "orderby",
            "value"         => array(__("Title", "une_boutique") => "name", __("Date", "une_boutique") => "date"),
            "description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Items Ordered By", "une_boutique"),
            "param_name"    => "order",
            "value"         => array(__("Ascending", "une_boutique") => "asc", __("Descending", "une_boutique") => "desc"),
            "description"   => __("choose the default orderign of the items, (asc)ening or (desc)ending.", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Slide Speed", 'une_boutique'),
            "param_name"    => "slide_speed",
            "admin_label"   => true,
            "value"         => __("800", 'une_boutique'),
            "description"   => __("change carousel sliding speed", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Auto Play", 'une_boutique'),
            "param_name"    => "auto_play",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("add a number here to both enable auto play and give a timeout, for example 5000 to make autopaly slide evey 5 seconds. <strong>Leave empty to disable autoplay.</strong>", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Scroll Per Page", "une_boutique"),
            "param_name"    => "scroll_per_page",
            "value"         => array("true", "false"),
            "description"   => __("choose whether you want the items to scroll per page(TRUE) or per item(FALSE)", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Navigation", "une_boutique"),
            "param_name"    => "navigation",
            "value"         => array("true", "false"),
            "description"   => __("show or hide carousel navigation.", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Pagination", "une_boutique"),
            "param_name"    => "pagination",
            "value"         => array("false", "true"),
            "description"   => __("show or hide carousel pagination.", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Category IDs", 'une_boutique'),
            "param_name"    => "category_id",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("enter a comma separated list of IDs to display only some specific categories, eg. 170, 145, 1789", 'une_boutique'),
        ),
        array(
            "type" => 'checkbox',
            "heading" => __("Display only parent categories?", "une_boutique"),
            "param_name" => "parent_only",
            "description" => __("Check this option if you want to only display parent categories.", "une_boutique"),
            "value" => Array(__("Yes, please", "une_boutique") => '0'),
        ),
    )
));

/*-------------------------------------------------------------------------------------------*/
/*  Recent Product Slider
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'vc_products_slider', 'vc_recent_products_slider_shortcode' );

function vc_recent_products_slider_shortcode ($atts) {
extract(shortcode_atts(array(
    'per_page'          => '12',
    'orderby'           => 'date',
    'order'             => 'desc',
    'slide_speed'       => '800',
    'items'             => '4',
    'auto_play'         => 'false',
    'navigation'        => 'true',
    'pagination'        => 'false',
    'scroll_per_page'   => 'false',
    'carousel_type'     => 'recent_products'
), $atts));
    
    $uniqid = random_string(6);
    $return = '<div id="recent_products_slides" class="'.$carousel_type.'-slides_'.$uniqid.'">';
    $return .= do_shortcode('['.$carousel_type.' per_page="'. $per_page .'" columns="99999" order="'.$order.'" orderby="'.$orderby.'"]');
    $return .= '</div>';
    $return .= '<script>jQuery(document).ready(function($){"use strict";$(".'.$carousel_type.'-slides_'.$uniqid.' .woocommerce .products").owlCarousel({items:'.$items.',autoPlay:'.$auto_play.',itemsTablet:[768,3],paginationSpeed:500,goToFirstSpeed:'.$slide_speed.',slideSpeed:'.$slide_speed.',navigation:'.$navigation.',navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],scrollPerPage:'.$scroll_per_page.',pagination:'.$pagination.',addClassActive:true,stopOnHover:true,lazyEffect:"fade",});});</script>';

    return $return;
}

vc_map( array(
   "name"                   => __("Products Silder", 'une_boutique'),
   "base"                   => "vc_products_slider",
   "class"                  => "",
   "category"               => __('Capital Shortcodes', 'une_boutique'),
   "icon"                   => "icon-wpb-products_carousel",
   "params"                 => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Carousel Type", "une_boutique"),
            "param_name"    => "carousel_type",
            "value"         => array(__("Recent Products", "une_boutique") => "recent_products", __("Featured Products", "une_boutique") => "featured_products", __("Sale Products", "une_boutique") => "sale_products", __("Best Selling Products", "une_boutique") => "best_selling_products", __("Top Rated Products", "une_boutique") => "top_rated_products"),
            "description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Number of visible items", 'une_boutique'),
            "param_name"    => "items",
            "admin_label"   => true,
            "value"         => __("4", 'une_boutique'),
            "description"   => __("Enter The number of items visible at the same time", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Limit", 'une_boutique'),
            "param_name"    => "per_page",
            "admin_label"   => true,
            "value"         => __("12", 'une_boutique'),
            "description"   => __("Limit The Number of catgeories to include in the carousel", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Items Ordered By", "une_boutique"),
            "param_name"    => "orderby",
            "value"         => array(__("Date", "une_boutique") => "date", __("Title", "une_boutique") => "title", __("Random", "une_boutique") => "rand"),
            "description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Items Order", "une_boutique"),
            "param_name"    => "order",
            "value"         => array(__("Ascending", "une_boutique") => "asc", __("Descending", "une_boutique") => "desc"),
            "description"   => __("choose the default orderign of the items, (asc)ening or (desc)ending", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Slide Speed", 'une_boutique'),
            "param_name"    => "slide_speed",
            "admin_label"   => true,
            "value"         => __("800", 'une_boutique'),
            "description"   => __("change carousel sliding speed", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Auto Play", 'une_boutique'),
            "param_name"    => "auto_play",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("add a number here to both enable auto play and give a timeout, for example 5000 to make autopaly slide evey 5 seconds. <strong>Leave empty to disable autoplay.</strong>", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Scroll Per Page", "une_boutique"),
            "param_name"    => "scroll_per_page",
            "value"         => array("true", "false"),
            "description"   => __("choose whether you want the items to scroll per page(TRUE) or per item(FALSE)", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Navigation", "une_boutique"),
            "param_name"    => "navigation",
            "value"         => array("true", "false"),
            "description"   => __("show or hide carousel navigation.", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Pagination", "une_boutique"),
            "param_name"    => "pagination",
            "value"         => array("false", "true"),
            "description"   => __("show or hide carousel pagination.", "une_boutique")
        ),
    )
));

/*-------------------------------------------------------------------------------------------*/
/*  advanced separator line
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'advanced_separator', 'vc_advanced_separator' );

function vc_advanced_separator ($atts) {
extract(shortcode_atts(array(
    'class'    => '',
    'position' => 'aligncenter',
    'size'     => 'sep-small',
    'color'    => 'sep-dark',
), $atts));

    $return = '<span class="clear"></span><div class="relative advanced-separator '. $class . ' ' . $position .' '. $size . ' '. $color . '"></div><span class="clear"></span>';

    return $return;
}

vc_map( array(
   "name"      => __("Separator Advanced", 'une_boutique'),
   "base"      => "advanced_separator",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   'icon'      => 'icon-wpb-ui-separator',
   "params"    => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Separator Type", "une_boutique"),
            "param_name"    => "position",
            "value"         => array(__("Center", "une_boutique") => "aligncenter", __("Left", "une_boutique") => "alignleft", __("Right", "une_boutique") => "alignright"),
            "description"   => __("Choose the type of the separator alignment", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Separator Size", "une_boutique"),
            "param_name"    => "size",
            "value"         => array(__("Small", "une_boutique") => "sep-small", __("Medium", "une_boutique") => "sep-medium", __("Large", "une_boutique") => "sep-large"),
            "description"   => __("Choose the size of the separator", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Separator Color", "une_boutique"),
            "param_name"    => "color",
            "value"         => array(__("Dark", "une_boutique") => "sep-dark", __("Light", "une_boutique") => "sep-light"),
            "description"   => __("Choose the color echeme of the separator", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Additional Classes", 'une_boutique'),
            "param_name"    => "class",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("Separator Line Class", 'une_boutique'),
        ),
    )
));

/*-----------------------------------------------------------------------------------*/
/*  Capital Testimonials Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode( 'capital-testimonials', 'testimonial_shortcode' );
/**
 * Shortcode to display testimonials
 *
 * [capital-testimonials limit="" orderby="none"]
 */
function testimonial_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'limit'          => '4',
        'orderby'        => 'none',
        'testimonial_id' => '',
        'type'           => 'static',
        'text_color'     => '',
    ), $atts ) );
    return ub_get_testimonials( $limit, $orderby, $testimonial_id, $type );
}

/*-----------------------------------------------------------------------------------*/
/*  Capital Testimonials vc map
/*-----------------------------------------------------------------------------------*/

vc_map( array(
   "name"              => __("Capital Testimonials", 'une_boutique'),
   "base"              => "capital-testimonials",
   "category"          => __('Capital Shortcodes', 'une_boutique'),
   "icon"              => "icon-wpb-testimonials",
   'admin_enqueue_css' => array(get_template_directory_uri().'/inc/vc_extend/css/capital-shortcodes-admin.css'),
   "params"    => array(
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Limit", 'une_boutique'),
            "param_name"    => "limit",
            "admin_label"   => true,
            "value"         => __("4", 'une_boutique'),
            "description"   => __("Enter The number of testimonials to be displayed.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Testiminia ID", 'une_boutique'),
            "param_name"    => "testimonial_id",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("Enter The the testimonial post ID to display a single one.", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Ordered By", "une_boutique"),
            "param_name"    => "orderby",
            "value"         => array(__("Date", "une_boutique") => "date", __("Title", "une_boutique") => "title", __("Random", "une_boutique") => "rand"),
            "description"   => __("choose how the items are ordered by, date, title or random.", "une_boutique")
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Testimonial Type", "une_boutique"),
            "param_name"    => "type",
            "value"         => array(__("Static Grid", "une_boutique") => "static", __("Slider", "une_boutique") => "slider"),
            "description"   => __("Choose the testimonial display type, a grid or a slider.", "une_boutique")
        ),
    )
));

/*-------------------------------------------------------------------------------------------*/
/*  Special Box Shortcode
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'special-box', 'vc_special_box' );

function vc_special_box ( $atts, $content = null ) {
extract(shortcode_atts(array(
    'class'             => '',
    'alignment'         => 'center',
    'title'             => '',
    'box_url'           => 'javascript:void(0)',
    'box_padding'       => '25px 25px',
    'margin_bottom'     => '20px',
    'background_color'  => '',
    'background_image'  => '',
    'text_color'        => '',
), $atts));


$img_id = preg_replace('/[^\d]/', '', $background_image);
$image_attributes = wp_get_attachment_image_src( $img_id, 'full' );
    
    $return  = '<div id="vc_special_box_wrapper" class="'.$class.' display-table text-'.$alignment.'" style="background-color:'.$background_color.'; background-image:url('.$image_attributes[0].');color:'.$text_color.';margin-bottom:'.$margin_bottom.';">';
    $return .= '<a style="display:block;" href="'.$box_url.'">';
    $return .= '<div class="vc-special-box" style="padding:'.$box_padding.';">';
    $return .= '<div class="special-box-title"><h3 class="no-margin">'.$title.'</h3></div>';
    $return .= '<span class="clear"></span><div class="relative advanced-separator align'.$alignment.' sep-small sep-light"></div><span class="clear"></span>';
    $return .= '<div class="special-box-content"><p class="no-margin">'.$content.'</p></div>';
    $return .= '</div>';
    $return .= '</a>';
    $return .= '</div>';
    return $return;
}

vc_map( array(
   "name"      => __("Special Box", 'une_boutique'),
   "base"      => "special-box",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   "icon"      => "icon-wpb-special-box",
   "params"    => array(
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Box Title", 'une_boutique'),
            "param_name"    => "title",
            "admin_label"   => true,
            "value"         => __("Enter the box title here", 'une_boutique'),
            "description"   => __("Enter the box title here.", 'une_boutique'),
        ),
        array(
            "type"          => "textarea",
            "admin_label"   => false,
            "holder"        => "div",
            "class"         => "",
            "heading"       => __("Content", "une_boutique"),
            "param_name"    => "content",
            "value"         => __("I am test text block. Click edit button to change this text."),
            "description"   => __("Enter your content here.", "une_boutique"),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Box URL", 'une_boutique'),
            "param_name"    => "box_url",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("Add a url if you want the box to be linked", 'une_boutique'),
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => __("Text Alignment", "une_boutique"),
            "param_name"    => "alignment",
            "value"         => array(__("Center", "une_boutique") => "center", __("Left", "une_boutique") => "left", __("Right", "une_boutique") => "right"),
            "description"   => __("change the default text alingment, which is centered.", "une_boutique")
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Box Padding", 'une_boutique'),
            "param_name"    => "box_padding",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("You should use px, em, %, etc.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Margin Bottom", 'une_boutique'),
            "param_name"    => "margin_bottom",
            "admin_label"   => true,
            "value"         => __("", 'une_boutique'),
            "description"   => __("You should use px, em, %, etc.", 'une_boutique'),
        ),
        array(
            "type"          => "colorpicker",
            "class"         => "",
            "heading"       => __("Background Color", 'une_boutique'),
            "param_name"    => "background_color",
            "admin_label"   => true,
            "value"         => __("#525252", 'une_boutique'),
            "description"   => __("Please choose a background color to give your box a solid background.", 'une_boutique'),
        ),
        array(
            "type"          => "colorpicker",
            "class"         => "",
            "heading"       => __("Text Color", 'une_boutique'),
            "param_name"    => "text_color",
            "admin_label"   => true,
            "value"         => __("#fefefe", 'une_boutique'),
            "description"   => __("Please choose a color for the text appearing on the special box.", 'une_boutique'),
        ),
        array(
            "type"          => "attach_image",
            "class"         => "",
            "heading"       => __("Background Image", 'une_boutique'),
            "param_name"    => "background_image",
            "description"   => __("Select image from media library.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Additional Classes", 'une_boutique'),
            "param_name"    => "class",
            "value"         => __("", 'une_boutique'),
            "description"   => __("Add any additional css classes here.", 'une_boutique'),
        ),
    )
));

/*-------------------------------------------------------------------------------------------*/
/*  Flipping Circle
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'vc-flipping-circle', 'vc_flipping_circle_shortcode' );

function vc_flipping_circle_shortcode ($atts) {
extract(shortcode_atts(array(
      'class'              => '',
      'background_image'   => '',
      'background_color'   => '',
      'title'              => '',
      'link_url'           => '#',
      'link_text'          => 'View More',
      'description'        => '',
), $atts));

$img_id = preg_replace('/[^\d]/', '', $background_image);
$image_url = wp_get_attachment_image_src( $img_id, 'thumbnail' );

    $return  =  '<div class="vc_flipper-wrapper"><div class="vc_flipping-circle-item" style="background-color:'.$background_color.';background-image:url('. $image_url[0] .');" ontouchstart="this.classList.toggle(\'hover\');">';
    $return .=  '<div class="vc_flipping-circle-info-wrap">';
    $return .=  '<div class="vc_flipping-circle-info">';
    $return .=  '<div class="vc_flipping-circle-info-front" style="background-color:'.$background_color.';background-image:url('. $image_url[0] .');" ></div>';
    $return .=  '<div class="vc_flipping-circle-info-back">';
    $return .=  '<h3>'. $title .'</h3>';
    $return .=  '<p>'. $description .' <a href="'. $link_url .'">'. $link_text .'</a></p>';
    $return .=  '</div></div></div></div></div>';

    return $return;
}

vc_map( array(
   "name"      => __("Flipping Circle", 'une_boutique'),
   "base"      => "vc-flipping-circle",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   "icon"      => "icon-wpb-fillping-circle",
   "params"    => array(
        array(
            "type"          => "colorpicker",
            "class"         => "",
            "heading"       => __("Background Color", 'une_boutique'),
            "param_name"    => "background_color",
            "admin_label"   => true,
            "value"         => __("#525252", 'une_boutique'),
            "description"   => __("Please choose a background color to give your box a solid background.", 'une_boutique'),
        ),
        array(
            "type"          => "attach_image",
            "class"         => "",
            "heading"       => __("Background Image", 'une_boutique'),
            "param_name"    => "background_image",
            "description"   => __("Select image from media library.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Circle Title", 'une_boutique'),
            "param_name"    => "title",
            "admin_label"   => true,
            "value"         => __("The Title", 'une_boutique'),
            "description"   => __("Enter the circle title here.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Circle Description", 'une_boutique'),
            "param_name"    => "description",
            "admin_label"   => true,
            "value"         => __("Description Here", 'une_boutique'),
            "description"   => __("Enter the circle short description here.", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Link URL", 'une_boutique'),
            "param_name"    => "link_url",
            "admin_label"   => true,
            "value"         => __("#", 'une_boutique'),
            "description"   => __("Enter the url for the circle link", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Link Title", 'une_boutique'),
            "param_name"    => "link_text",
            "admin_label"   => true,
            "value"         => __("View More", 'une_boutique'),
            "description"   => __("Enter the text for the circle link", 'une_boutique'),
        ),
        array(
            "type"          => "textfield",
            "class"         => "",
            "heading"       => __("Additional Classes", 'une_boutique'),
            "param_name"    => "class",
            "value"         => __("", 'une_boutique'),
            "description"   => __("Add any additional css classes here.", 'une_boutique'),
        ),
    )
));

//  Adding more values to text separator style dropdown

function add_vc_text_separator_style() {
  $param = WPBMap::getParam('vc_text_separator', 'style');

  $param['value'][__('Quadruple', 'une_boutique')] = 'quadruple';

  WPBMap::mutateParam('vc_text_separator', $param);
}
add_action('init', 'add_vc_text_separator_style');

//  Adding more values to separator style dropdown

function add_vc_separator_style() {
  $param = WPBMap::getParam('vc_separator', 'style');

  $param['value'][__('Quadruple', 'une_boutique')] = 'quadruple';

  WPBMap::mutateParam('vc_separator', $param);
}
add_action('init', 'add_vc_separator_style');