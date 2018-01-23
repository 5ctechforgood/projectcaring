<?php
/**
 * Custom admin related functions.
 *
 * @since   1.1.0
 * @package ramza
 */


if ( ! function_exists( 'ramza_add_theme_admin_bar_menu' ) ) :
/**
 * Adds a theme admin bar menu for theme related pages.
 *
 * @since  1.0.0
 */
function ramza_add_theme_admin_bar_menu( $wp_admin_bar ) {
  $menu_id = 'ramza';

  $icon    = '<span class="ab-icon"></span>';
  $label   = '<span class="ab-label">' . wp_get_theme()->get( 'Name' ) . ' - ' . wp_get_theme()->get( 'Version' ) . '</span>';

  $wp_admin_bar->add_menu( array(
    'id'    => $menu_id,
    'title' => $icon . $label,
    'href'  => '/'
  ) );


  $wp_admin_bar->add_menu( array(
    'parent' => $menu_id,
    'title'  => esc_html__( 'Theme Page', 'ramza' ),
    'id'     => 'ramza-theme',
    'href'   => 'https://made4wp.com/themes/ramza/',
    'meta'   => array('target' => '_blank')
  ) );
  $wp_admin_bar->add_menu( array(
    'parent' => $menu_id,
    'title'  => esc_html__( 'Documentation', 'ramza' ),
    'id'     => 'ramza-docs',
    'href'   => 'http://docs.made4wp.com/ramza/',
    'meta'   => array('target' => '_blank')
  ) );
  $wp_admin_bar->add_menu( array(
    'parent' => $menu_id,
    'title'  => esc_html__( 'Changelog', 'ramza' ),
    'id'     => 'ramza-changelog',
    'href'   => 'http://docs.made4wp.com/ramza/ramza-changelog/',
    'meta'   => array('target' => '_blank')
  ) );
  $wp_admin_bar->add_menu( array(
    'parent' => $menu_id,
    'title'  => esc_html__( 'Support', 'ramza' ),
    'id'     => 'ramza-support',
    'href'   => 'https://made4wp.com/support/',
    'meta'   => array('target' => '_blank')
  ) );

}
add_action( 'admin_bar_menu', 'ramza_add_theme_admin_bar_menu', 999);
endif;


function ramza_new_logo_feature_notice() {
  $message = sprintf(
      __( 'A new logo feature has been added in the Customizer in WordPress version 4.5. If you have been using the <strong>Current Header image</strong> option for your logo. Please reupload the logo using the <a target="_blank" href="%s">new Logo setting</a> found in the customizer.', 'ramza' ),
    admin_url( 'customize.php?autofocus[control]=custom_logo' )
  );
  printf( '<div class="notice notice-warning is-dismissible"><p>%s</p></div>', $message );
}
add_action( 'admin_notices', 'ramza_new_logo_feature_notice' );