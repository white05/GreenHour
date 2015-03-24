<?php


function ub_menus_hook() {

	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style('thickbox');
	wp_enqueue_script( 'ub-menus-scripts', get_template_directory_uri() . '/inc/admin/ub-menus-scripts.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'ub-icofonts', get_template_directory_uri() . '/inc/admin/capital-icofonts.css' );
	wp_enqueue_style( 'ub-menus-styles', get_template_directory_uri() . '/inc/admin/ub-menus-styles.css' );

}

if ( theme_is_menus() ) {
	add_action( 'admin_init', 'ub_menus_hook' );
	add_action( 'admin_head', 'ub_add_icons_html' );
}


function ub_add_icons_html() {

	$ub_icons_list = array(
        '' => '',
    "ub-icon-quote" => "",
    "ub-icon-tag" => "",
    "ub-icon-link" => "",
    "ub-icon-cabinet2" => "",
    "ub-icon-calendar" => "",
    "ub-icon-fileplus" => "",
    "ub-icon-fileminus" => "",
    "ub-icon-files" => "",
    "ub-icon-phone" => "",
    "ub-icon-tablet" => "",
    "ub-icon-window" => "",
    "ub-icon-monitor" => "",
    "ub-icon-ipod" => "",
    "ub-icon-tv" => "",
    "ub-icon-camera" => "",
    "ub-icon-film" => "",
    "ub-icon-microphone" => "",
    "ub-icon-drink" => "",
    "ub-icon-coffee" => "",
    "ub-icon-mug" => "",
    "ub-icon-ice-cream" => "",
    "ub-icon-cake" => "",
    "ub-icon-inbox" => "",
    "ub-icon-download" => "",
    "ub-icon-upload" => "",
    "ub-icon-inbox2" => "",
    "ub-icon-checkmark" => "",
    "ub-icon-checkmark2" => "",
    "ub-icon-cancel" => "",
    "ub-icon-cancel2" => "",
    "ub-icon-plus" => "",
    "ub-icon-plus2" => "",
    "ub-icon-minus" => "",
    "ub-icon-minus2" => "",
    "ub-icon-notice" => "",
    "ub-icon-notice2" => "",
    "ub-icon-cog" => "",
    "ub-icon-cogs" => "",
    "ub-icon-warning" => "",
    "ub-icon-health" => "",
    "ub-icon-suitcase" => "",
    "ub-icon-picture" => "",
    "ub-icon-pictures" => "",
    "ub-icon-android" => "",
    "ub-icon-marvin" => "",
    "ub-icon-pacman" => "",
    "ub-icon-cassette" => "",
    "ub-icon-watch" => "",
    "ub-icon-chronometer" => "",
    "ub-icon-alarm-clock" => "",
    "ub-icon-time" => "",
    "ub-icon-headphones" => "",
    "ub-icon-wallet" => "",
    "ub-icon-checkmark3" => "",
    "ub-icon-cancel3" => "",
    "ub-icon-eye" => "",
    "ub-icon-position" => "",
    "ub-icon-site-map" => "",
    "ub-icon-site-map2" => "",
    "ub-icon-cloud" => "",
    "ub-icon-upload2" => "",
    "ub-icon-chart" => "",
    "ub-icon-chart2" => "",
    "ub-icon-chart3" => "",
    "ub-icon-chart4" => "",
    "ub-icon-chart5" => "",
    "ub-icon-chart6" => "",
    "ub-icon-location" => "",
    "ub-icon-download2" => "",
    "ub-icon-basket" => "",
    "ub-icon-folder" => "",
    "ub-icon-gamepad" => "",
    "ub-icon-alarm" => "",
    "ub-icon-alarm-cancel" => "",
    "ub-icon-call" => "",
    "ub-icon-telephone" => "",
    "ub-icon-image" => "",
    "ub-icon-open" => "",
    "ub-icon-sale" => "",
    "ub-icon-direction" => "",
    "ub-icon-map" => "",
    "ub-icon-trashcan" => "",
    "ub-icon-vote" => "",
    "ub-icon-graduate" => "",
    "ub-icon-lab" => "",
    "ub-icon-tie" => "",
    "ub-icon-football" => "",
    "ub-icon-eight-ball" => "",
    "ub-icon-bowling" => "",
    "ub-icon-bowling-pin" => "",
    "ub-icon-baseball" => "",
    "ub-icon-soccer" => "",
    "ub-icon-3d-glasses" => "",
    "ub-icon-microwave" => "",
    "ub-icon-refrigerator" => "",
    "ub-icon-oven" => "",
    "ub-icon-washing-machine" => "",
    "ub-icon-mouse" => "",
    "ub-icon-smiley" => "",
    "ub-icon-sad" => "",
    "ub-icon-mute" => "",
    "ub-icon-hand" => "",
    "ub-icon-radio" => "",
    "ub-icon-satellite" => "",
    "ub-icon-medal" => "",
    "ub-icon-medal2" => "",
    "ub-icon-switch" => "",
    "ub-icon-key" => "",
    "ub-icon-cord" => "",
    "ub-icon-locked" => "",
    "ub-icon-unlocked" => "",
    "ub-icon-magnifier" => "",
    "ub-icon-zoom-in" => "",
    "ub-icon-zoom-out" => "",
    "ub-icon-stack" => "",
    "ub-icon-stack2" => "",
    "ub-icon-stack3" => "",
    "ub-icon-david-star" => "",
    "ub-icon-cross" => "",
    "ub-icon-moon-andstar" => "",
    "ub-icon-skeletor" => "",
    "ub-icon-lamp" => "",
    "ub-icon-lamp2" => "",
    "ub-icon-umbrella" => "",
    "ub-icon-street-light" => "",
    "ub-icon-bomb" => "",
    "ub-icon-archive" => "",
    "ub-icon-battery" => "",
    "ub-icon-battery2" => "",
    "ub-icon-battery3" => "",
    "ub-icon-battery4" => "",
    "ub-icon-battery5" => "",
    "ub-icon-megaphone" => "",
    "ub-icon-patch" => "",
    "ub-icon-pil" => "",
    "ub-icon-injection" => "",
    "ub-icon-thermometer" => "",
    "ub-icon-lampblack" => "",
    "ub-icon-cube" => "",
    "ub-icon-boxopen" => "",
    "ub-icon-boxclosed" => "",
    "ub-icon-diamond" => "",
    "ub-icon-bag" => "",
    "ub-icon-money-bag" => "",
    "ub-icon-grid" => "",
    "ub-icon-list" => "",
    "ub-icon-list2" => "",
    "ub-icon-ruler" => "",
    "ub-icon-rulertriangle" => "",
    "ub-icon-leftsidebar" => "",
    "ub-icon-rightsidebar" => "",
    "ub-icon-2cols" => "",
    "ub-icon-3cols" => "",
    "ub-icon-3rows" => "",
    "ub-icon-4cels" => "",
    "ub-icon-9cels" => "",
    "ub-icon-navbar" => "",
    "ub-icon-leftsidebar2" => "",
    "ub-icon-rightsidebar2" => "",
    "ub-icon-2sidebars" => "",
    "ub-icon-tools" => "",
    "ub-icon-screwdriver" => "",
    "ub-icon-paint" => "",
    "ub-icon-hammer" => "",
    "ub-icon-brush" => "",
    "ub-icon-pen" => "",
    "ub-icon-comments" => "",
    "ub-icon-chat2" => "",
    "ub-icon-volume" => "",
    "ub-icon-volume2" => "",
    "ub-icon-volume3" => "",
    "ub-icon-equalizer" => "",
    "ub-icon-resize" => "",
    "ub-icon-resizedown" => "",
    "ub-icon-stretch" => "",
    "ub-icon-narrow" => "",
    "ub-icon-resize3" => "",
    "ub-icon-download3" => "",
    "ub-icon-calculator" => "",
    "ub-icon-library" => "",
    "ub-icon-auction" => "",
    "ub-icon-justice" => "",
    "ub-icon-stats" => "",
    "ub-icon-stats2" => "",
    "ub-icon-attachment" => "",
    "ub-icon-hourglass" => "",
    "ub-icon-abacus" => "",
    "ub-icon-pencil" => "",
    "ub-icon-pin" => "",
    "ub-icon-discout" => "",
    "ub-icon-edit" => "",
    "ub-icon-scissors" => "",
    "ub-icon-profile" => "",
    "ub-icon-rotate" => "",
    "ub-icon-rotateright" => "",
    "ub-icon-reply" => "",
    "ub-icon-forward" => "",
    "ub-icon-retweet" => "",
    "ub-icon-shuffle" => "",
    "ub-icon-loop" => "",
    "ub-icon-crop" => "",
    "ub-icon-square" => "",
    "ub-icon-circle" => "",
    "ub-icon-dollar" => "",
    "ub-icon-dollars" => "",
    "ub-icon-coins" => "",
    "ub-icon-pig" => "",
    "ub-icon-bookmark" => "",
    "ub-icon-bookmark2" => "",
    "ub-icon-address-book" => "",
    "ub-icon-safe" => "",
    "ub-icon-envelope" => "",
    "ub-icon-envelope2" => "",
    "ub-icon-radio-active" => "",
    "ub-icon-music" => "",
    "ub-icon-presentation" => "",
    "ub-icon-male" => "",
    "ub-icon-female" => "",
    "ub-icon-aids" => "",
    "ub-icon-heart" => "",
    "ub-icon-info" => "",
    "ub-icon-inforound" => "",
    "ub-icon-piano" => "",
    "ub-icon-rain" => "",
    "ub-icon-snow" => "",
    "ub-icon-lightning" => "",
    "ub-icon-sun" => "",
    "ub-icon-moon" => "",
    "ub-icon-cloudy" => "",
    "ub-icon-cloudy2" => "",
    "ub-icon-car" => "",
    "ub-icon-bike" => "",
    "ub-icon-truck" => "",
    "ub-icon-bus" => "",
    "ub-icon-plane" => "",
    "ub-icon-paper-plane" => "",
    "ub-icon-rocket" => "",
    "ub-icon-book" => "",
    "ub-icon-barcode" => "",
    "ub-icon-expand" => "",
    "ub-icon-collapse" => "",
    "ub-icon-pop-out" => "",
    "ub-icon-pop-in" => "",
    "ub-icon-target" => "",
    "ub-icon-badge" => "",
    "ub-icon-ticket" => "",
    "ub-icon-cone" => "",
    "ub-icon-blocked" => "",
    "ub-icon-stop" => "",
    "ub-icon-keyboard" => "",
    "ub-icon-keyboard2" => "",
    "ub-icon-radio2" => "",
    "ub-icon-printer" => "",
    "ub-icon-checked" => "",
    "ub-icon-error" => "",
    "ub-icon-add" => "",
    "ub-icon-minus3" => "",
    "ub-icon-alert" => "",
    "ub-icon-pictures3" => "",
    "ub-icon-atom" => "",
    "ub-icon-eyedropper" => "",
    "ub-icon-globe" => "",
    "ub-icon-shipping" => "",
    "ub-icon-ying-yang" => "",
    "ub-icon-compass" => "",
    "ub-icon-zip" => "",
    "ub-icon-zip2" => "",
    "ub-icon-anchor" => "",
    "ub-icon-locked-heart" => "",
    "ub-icon-magnet" => "",
    "ub-icon-navigation" => "",
    "ub-icon-tags" => "",
    "ub-icon-heartplus" => "",
    "ub-icon-heartminus" => "",
    "ub-icon-usb" => "",
    "ub-icon-clipboard" => "",
    "ub-icon-switchoff" => "",
    "ub-icon-rulerpencil" => "",
    "ub-icon-file-settings" => "",
    "ub-icon-browser" => "",
    "ub-icon-windows" => "",
    "ub-icon-windowcancel" => "",
    "ub-icon-folder2" => "",
    "ub-icon-folder-add" => "",
    "ub-icon-folder-settings" => "",
    "ub-icon-folder-check" => "",
    "ub-icon-wifi-full" => "",
    "ub-icon-settings" => "",
    "ub-icon-arrow-left" => "",
    "ub-icon-arrow-up" => "",
    "ub-icon-arrow-down" => "",
    "ub-icon-arrow-right" => "",
    "ub-icon-reload" => "",
    "ub-icon-refresh" => "",
    "ub-icon-checkbox-checked" => "",
    "ub-icon-checkbox" => "",
    "ub-icon-paperclip" => "",
    "ub-icon-search" => "",
    "ub-icon-zoom-in2" => "",
    "ub-icon-zoom-out2" => "",
    "ub-icon-email2" => "",
    "ub-icon-heart4" => "",
    "ub-icon-enter" => "",
    "ub-icon-book4" => "",
    "ub-icon-star" => "",
    "ub-icon-clock" => "",
    "ub-icon-printer2" => "",
    "ub-icon-home" => "",
    "ub-icon-flag" => "",
    "ub-icon-meter" => "",
    "ub-icon-switch3" => "",
    "ub-icon-forbidden" => "",
    "ub-icon-lock" => "",
    "ub-icon-unlocked3" => "",
    "ub-icon-locked" => "",
    "ub-icon-users" => "",
    "ub-icon-user" => "",
    "ub-icon-laptop" => "",
    "ub-icon-camera4" => "",
    "ub-icon-credit-cards" => "",
    "ub-icon-bag2" => "",
    "ub-icon-diamond2" => "",
    "ub-icon-newspaper" => "",
    "ub-icon-map-marker" => "",
    "ub-icon-map2" => "",
    "ub-icon-support" => "",
    "ub-icon-barbell" => "",
    "ub-icon-stopwatch" => "",
    "ub-icon-atom2" => "",
    "ub-icon-syringe" => "",
    "ub-icon-bolt" => "",
    "ub-icon-lab2" => "",
    "ub-icon-select" => "",
    "ub-icon-graph" => "",
    "ub-icon-pencil2" => "",
    "ub-icon-directions" => "",
    "ub-icon-mail" => "",
    "ub-icon-paperplane" => "",
    "ub-icon-feather" => "",
    "ub-icon-user3" => "",
    "ub-icon-users3" => "",
    "ub-icon-user-add" => "",
    "ub-icon-export" => "",
    "ub-icon-location2" => "",
    "ub-icon-map3" => "",
    "ub-icon-compass2" => "",
    "ub-icon-location3" => "",
    "ub-icon-target2" => "",
    "ub-icon-share" => "",
    "ub-icon-sharable" => "",
    "ub-icon-heart5" => "",
    "ub-icon-heart6" => "",
    "ub-icon-star2" => "",
    "ub-icon-star3" => "",
    "ub-icon-thumbs-up" => "",
    "ub-icon-thumbs-down" => "",
    "ub-icon-quote3" => "",
    "ub-icon-house" => "",
    "ub-icon-popup" => "",
    "ub-icon-search2" => "",
    "ub-icon-flashlight" => "",
    "ub-icon-printer3" => "",
    "ub-icon-bell" => "",
    "ub-icon-link3" => "",
    "ub-icon-flag2" => "",
    "ub-icon-tools2" => "",
    "ub-icon-trophy" => "",
    "ub-icon-moon2" => "",
    "ub-icon-palette" => "",
    "ub-icon-leaf" => "",
    "ub-icon-musicnote" => "",
    "ub-icon-new" => "",
    "ub-icon-graduation" => "",
    "ub-icon-airplane" => "",
    "ub-icon-lifebuoy" => "",
    "ub-icon-eye2" => "",
    "ub-icon-bolt2" => "",
    "ub-icon-thunder" => "",
    "ub-icon-droplet" => "",
    "ub-icon-briefcase" => "",
    "ub-icon-air" => "",
    "ub-icon-hourglass2" => "",
    "ub-icon-gauge" => "",
    "ub-icon-language" => "",
    "ub-icon-network" => "",
    "ub-icon-key2" => "",
    "ub-icon-battery6" => "",
    "ub-icon-bucket2" => "",
    "ub-icon-magnet2" => "",
    "ub-icon-drive" => "",
    "ub-icon-cup" => "",
    "ub-icon-rocket2" => "",
    "ub-icon-brush2" => "",
    "ub-icon-earth" => "",
    "ub-icon-publish" => "",
    "ub-icon-sun2" => "",
    "ub-icon-code" => "",
    "ub-icon-infinity" => "",
    "ub-icon-light-bulb" => "",
    "ub-icon-credit-card" => "",
    "ub-icon-database" => "",
    "ub-icon-voicemail" => "",
    "ub-icon-cart" => "",
    "ub-icon-box4" => "",
    "ub-icon-ticket4" => "",
    "ub-icon-rss" => "",
    "ub-icon-signal" => "",
    "ub-icon-thermometer2" => "",
    "ub-icon-droplets" => "",
    "ub-icon-statistics" => "",
    "ub-icon-pie" => "",
    "ub-icon-lock2" => "",
    "ub-icon-lock-open" => "",
    "ub-icon-logout" => "",
    "ub-icon-login" => "",
    "ub-icon-cross2" => "",
    "ub-icon-minus4" => "",
    "ub-icon-plus3" => "",
    "ub-icon-cross3" => "",
    "ub-icon-minus5" => "",
    "ub-icon-plus4" => "",
    "ub-icon-cross4" => "",
    "ub-icon-minus6" => "",
    "ub-icon-plus5" => "",
    "ub-icon-erase" => "",
    "ub-icon-blocked2" => "",
    "ub-icon-info3" => "",
    "ub-icon-info4" => "",
    "ub-icon-question" => "",
    "ub-icon-help" => "",
    "ub-icon-warning2" => "",
    "ub-icon-cycle" => "",
    "ub-icon-cw" => "",
    "ub-icon-ccw" => "",
    "ub-icon-shuffle2" => "",
    "ub-icon-arrow" => "",
    "ub-icon-arrow2" => "",
    "ub-icon-retweet2" => "",
    "ub-icon-loop2" => "",
    "ub-icon-history" => "",
    "ub-icon-back" => "",
    "ub-icon-switch4" => "",
    "ub-icon-list4" => "",
    "ub-icon-add-to-list" => "",
    "ub-icon-layout15" => "",
    "ub-icon-list5" => "",
    "ub-icon-text" => "",
    "ub-icon-text2" => "",
    "ub-icon-document" => "",
    "ub-icon-docs" => "",
    "ub-icon-landscape" => "",
    "ub-icon-pictures4" => "",
    "ub-icon-video" => "",
    "ub-icon-music4" => "",
    "ub-icon-folder3" => "",
    "ub-icon-archive3" => "",
    "ub-icon-trash" => "",
    "ub-icon-upload3" => "",
    "ub-icon-download5" => "",
    "ub-icon-disk" => "",
    "ub-icon-install" => "",
    "ub-icon-cloud3" => "",
    "ub-icon-upload4" => "",
    "ub-icon-bookmark4" => "",
    "ub-icon-bookmarks" => "",
    "ub-icon-book6" => "",
    "ub-icon-play" => "",
    "ub-icon-pause" => "",
    "ub-icon-record" => "",
    "ub-icon-stop2" => "",
    "ub-icon-next" => "",
    "ub-icon-previous" => "",
    "ub-icon-first" => "",
    "ub-icon-last" => "",
    "ub-icon-resize-enlarge" => "",
    "ub-icon-resize-shrink" => "",
    "ub-icon-volume5" => "",
    "ub-icon-sound" => "",
    "ub-icon-mute3" => "",
    "ub-icon-flow-cascade" => "",
    "ub-icon-flow-branch" => "",
    "ub-icon-flow-tree" => "",
    "ub-icon-flow-line" => "",
    "ub-icon-flow-parallel" => "",
    "ub-icon-arrow-left2" => "",
    "ub-icon-arrow-down2" => "",
    "ub-icon-arrow-up--upload" => "",
    "ub-icon-arrow-right2" => "",
    "ub-icon-arrow-left3" => "",
    "ub-icon-arrow-down3" => "",
    "ub-icon-arrow-up2" => "",
    "ub-icon-arrow-right3" => "",
    "ub-icon-arrow-left4" => "",
    "ub-icon-arrow-down4" => "",
    "ub-icon-arrow-up3" => "",
    "ub-icon-arrow-right4" => "",
    "ub-icon-arrow-left5" => "",
    "ub-icon-arrow-down5" => "",
    "ub-icon-arrow-up4" => "",
    "ub-icon-arrow-right5" => "",
    "ub-icon-arrow-left6" => "",
    "ub-icon-arrow-down6" => "",
    "ub-icon-arrow-up5" => "",
    "ub-icon-arrow-right6" => "",
    "ub-icon-arrow-left7" => "",
    "ub-icon-arrow-down7" => "",
    "ub-icon-arrow-up6" => "",
    "ub-icon-arrow-right7" => "",
    "ub-icon-arrow-left8" => "",
    "ub-icon-arrow-down8" => "",
    "ub-icon-arrow-up7" => "",
    "ub-icon-uniE8C2" => "",
    "ub-icon-arrow-left9" => "",
    "ub-icon-arrow-down9" => "",
    "ub-icon-arrow-up8" => "",
    "ub-icon-arrow-right8" => "",
    "ub-icon-menu" => "",
    "ub-icon-ellipsis" => "",
    "ub-icon-dots" => "",
    "ub-icon-dot" => "",
    "ub-icon-cc" => "",
    "ub-icon-cc-by" => "",
    "ub-icon-cc-nc" => "",
    "ub-icon-cc-nc-eu" => "",
    "ub-icon-cc-nc-jp" => "",
    "ub-icon-cc-sa" => "",
    "ub-icon-cc-nd" => "",
    "ub-icon-cc-pd" => "",
    "ub-icon-cc-zero" => "",
    "ub-icon-cc-share" => "",
    "ub-icon-cc-share2" => "",
    "ub-icon-daniel-bruce" => "",
    "ub-icon-daniel-bruce2" => "",
    "ub-icon-github" => "",
    "ub-icon-github2" => "",
    "ub-icon-flickr" => "",
    "ub-icon-flickr2" => "",
    "ub-icon-vimeo" => "",
    "ub-icon-vimeo2" => "",
    "ub-icon-twitter" => "",
    "ub-icon-twitter2" => "",
    "ub-icon-facebook" => "",
    "ub-icon-facebook2" => "",
    "ub-icon-facebook3" => "",
    "ub-icon-googleplus" => "",
    "ub-icon-googleplus2" => "",
    "ub-icon-pinterest" => "",
    "ub-icon-pinterest2" => "",
    "ub-icon-tumblr" => "",
    "ub-icon-tumblr2" => "",
    "ub-icon-linkedin" => "",
    "ub-icon-linkedin2" => "",
    "ub-icon-dribbble" => "",
    "ub-icon-dribbble2" => "",
    "ub-icon-stumbleupon" => "",
    "ub-icon-stumbleupon2" => "",
    "ub-icon-lastfm" => "",
    "ub-icon-lastfm2" => "",
    "ub-icon-rdio" => "",
    "ub-icon-rdio2" => "",
    "ub-icon-spotify" => "",
    "ub-icon-spotify2" => "",
    "ub-icon-qq" => "",
    "ub-icon-instagram" => "",
    "ub-icon-dropbox" => "",
    "ub-icon-evernote" => "",
    "ub-icon-flattr" => "",
    "ub-icon-skype" => "",
    "ub-icon-skype2" => "",
    "ub-icon-renren" => "",
    "ub-icon-sina-weibo" => "",
    "ub-icon-paypal" => "",
    "ub-icon-picasa" => "",
    "ub-icon-soundcloud" => "",
    "ub-icon-mixi" => "",
    "ub-icon-behance" => "",
    "ub-icon-circles" => "",
    "ub-icon-vk" => "",
    "ub-icon-bag-short" => "",
	);

	echo '<div style="display:none;">
    <div id="ub-icon-holder-container">
     <input autocomplete="off" size="60" placeholder="Type Icon Name to Filter" type="text" class="page-composer-icon-filter" value="" name="icon-filter-by-name" />
     <div class="ub-visual-selector ub-font-icons-wrapper" style="height:90%;">';
     foreach ( $ub_icons_list as $key => $option ) {
		if ( $key ) {
			echo '<a href="#" title="Class Name : '.$key.'" rel="'.$key.'"><span>'.$key.'</span><i class="'.$key.'"></i></a>';
		} else {
			echo '<a class="ub-no-icon" href="#" rel="">r</a>';
		}
	}
        echo '<input name="ub-icon-value-holder" id="ub-icon-value-holder" type="hidden" value=""/>
     </div>
    </div>
    </div>';
}