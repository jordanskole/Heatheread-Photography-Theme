<?

/* 
* add our primary menu
*/

wp_nav_menu(
	array(
			'theme_location'=>'primary',
			'container'=>false,
			'menu_class'=>'nav nav-list',
			'fallback_cb'=>false,
		)
	);

?>
