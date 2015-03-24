<?php
function ub_google_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'ub-all-fonts', "$protocol://fonts.googleapis.com/css?family=Questrial|Lekton|Yellowtail|Lato:300,400,700|Arvo:400,700|Cabin:400,600|Neuton|PT+Sans|Maiden+Orange|Tinos|Noto+Serif|Ubuntu:300,400,500,700|Bitter:400,700|Kameron|Copse|IM+Fell+Great+Primer|Merriweather:400,700,400italic|Open+Sans:400italic,400,600,700,300|Cuprum|Special+Elite|Dancing+Script|Pacifico|Goudy+Bookletter+1911|Raleway:400,700,600,300|Shanti|Varela+Round|Oswald|Lobster+Two|Crimson+Text|Molengo|Vollkorn|Roboto:400,300,500,700|Roboto+Condensed:400,700&subset=latin,cyrillic,greek");
}
add_action( 'wp_enqueue_scripts', 'ub_google_fonts' );
	function filter_ot_recognized_font_families( $array, $field_id ) {
		/* only run the filter when the field ID is NOT enable_google_webfonts */
		$array = array(
			'Open Sans'              => '"Open Sans", sans-serif',
			'Raleway'                => '"Raleway", sans-serif',
			'Lato'                   => '"Lato", sans-serif',
			'Arvo'                   => '"Arvo", serif',
			'Ubuntu'                 => '"Ubuntu", sans-serif',
			'Bitter'                 => '"Bitter", serif',
			'Merriweather'           => '"Merriweather", serif',
			'Roboto'                 => '"Roboto", sans-serif',
			'Roboto Condensed'       => '"Roboto Condensed", sans-serif',
			'Questrial'              => '"Questrial", sans-serif',
			'Lekton'                 => '"Lekton", sans-serif',
			'Yellowtail'             => '"Yellowtail", cursive',
			'Cabin'                  => '"Cabin", sans-serif',
			'Neuton'                 => '"Neuton", serif',
			'PT Sans'                => '"PT Sans", sans-serif',
			'Maiden Orange'          => '"Maiden Orange", cursive',
			'Tinos'                  => '"Tinos", serif',
			'Noto Serif'             => '"Noto Serif", serif',
			'Kameron'                => '"Kameron", serif',
			'Copse'                  => '"Copse", serif',
			'IM Fell Great Primer'   => '"IM Fell Great Primer", serif',
			'Cuprum'                 => '"Cuprum", sans-serif',
			'Special Elite'          => '"Special Elite", cursive',
			'Dancing Script'         => '"Dancing Script", cursive',
			'Pacifico'               => '"Pacifico", cursive',
			'Goudy Bookletter 1911'  => '"Goudy Bookletter 1911", serif',
			'Shanti'                 => '"Shanti", sans-serif',
			'Varela Round'           => '"Varela Round", sans-serif',
			'Oswald'                 => '"Oswald", sans-serif',
			'Lobster Two'            => '"Lobster Two", cursive',
			'Crimson Text'           => '"Crimson Text", serif',
			'Molengo'                => '"Molengo", sans-serif',
			'Vollkorn'               => '"Vollkorn", serif',
			// 'FiraSans'               => '"Fira Sans", sans-serif',
			'arial'                  => 'Arial, sans-serif',
			'georgia'                => 'Georgia, serif',
			'helvetica'              => 'Helvetica, sans-serif',
			'palatino'               => 'Palatino, serif',
			'tahoma'                 => 'Tahoma, sans-serif',
			'times'                  => '"Times New Roman", sans-serif',
			'trebuchet'              => 'Trebuchet, sans-serif',
			'verdana'                => 'Verdana, sans-serif',
		);
			return $array;
	}
add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );