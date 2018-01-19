<?php
/**
 * Customizer site content settings.
 *
 * @package ramza
 * @since   1.0.0
 */


if ( ! function_exists( 'ramza_customizer_register_content' ) ) :
/**
 * Register content settings.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ramza_customizer_register_content( $wp_customize ) {

  // Section
  $wp_customize->add_section(
    'ramza_content',
    array(
      'priority'    => 20,
      'title'       => esc_html__( 'Content', 'ramza' ),
      'description' => esc_html__( 'Content options.', 'ramza' ),
      // 'panel'       => ''
    )
  );

  // content Copyright
  $wp_customize->add_setting(
    'ramza_options[content_b-sidebar-area_pos]',
    array(
      'default'           => 'right',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'ramza_sanitize_options',
    )
  );
  $wp_customize->add_control(
    'ramza_options[content_b-sidebar-area_pos]',
    array(
      'label'       => esc_html__( 'Sidebar Position', 'ramza' ),
      // 'description' => esc_html__( '', 'ramza' ),
      'section'     => 'ramza_content',
      'type'        => 'select',
      'choices'     => array(
        'left'  => esc_html__( 'Left', 'ramza' ),
        'right' => esc_html__( 'Right', 'ramza' )
      )
    )
  );

  // show post author
  $wp_customize->add_setting(
    'ramza_options[content_display_c-post-author]',
    array(
      'default'           => 1,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'ramza_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'ramza_options[content_display_c-post-author]',
    array(
      'label'       => esc_html__( 'Show Post Author?', 'ramza' ),
      'description' => esc_html__( 'Appears in single blog post page below post.', 'ramza' ),
      'section'     => 'ramza_content',
      'type'        => 'checkbox'
    )
  );

  // show post date
  $wp_customize->add_setting(
    'ramza_options[content_display_c-posted-on]',
    array(
      'default'           => 1,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'ramza_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'ramza_options[content_display_c-posted-on]',
    array(
      'label'       => esc_html__( 'Show post meta Date?', 'ramza' ),
      'description' => esc_html__( 'Appears below post title.', 'ramza' ),
      'section'     => 'ramza_content',
      'type'        => 'checkbox'
    )
  );

  // show post meta author
  $wp_customize->add_setting(
    'ramza_options[content_display_c-author]',
    array(
      'default'           => 1,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'ramza_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'ramza_options[content_display_c-author]',
    array(
      'label'       => esc_html__( 'Show post meta Author?', 'ramza' ),
      'description' => esc_html__( 'Appears below post title.', 'ramza' ),
      'section'     => 'ramza_content',
      'type'        => 'checkbox'
    )
  );

  // show post meta comments
  $wp_customize->add_setting(
    'ramza_options[content_display_c-post__comments-link]',
    array(
      'default'           => 1,
      'transport'         => 'postMessage',
      'sanitize_callback' => 'ramza_sanitize_checkbox',
    )
  );
  $wp_customize->add_control(
    'ramza_options[content_display_c-post__comments-link]',
    array(
      'label'       => esc_html__( 'Show post meta Comments?', 'ramza' ),
      'description' => esc_html__( 'Appears below post title.', 'ramza' ),
      'section'     => 'ramza_content',
      'type'        => 'checkbox'
    )
  );
}
add_action( 'ramza_register_customizer_settings', 'ramza_customizer_register_content' );
endif;


if ( ! function_exists( 'ramza_set_content_settings_defaults' ) ) :
/**
 * Set default values.
 *
 * @since 1.0.0
 */
function ramza_set_content_settings_defaults( $defaults ) {
  $defaults = array_merge( $defaults, array(
    'content_b-sidebar-area_pos'            => 'right',
    'content_display_c-posted-on'           => 1,
    'content_display_c-post-author'         => 1,
    'content_display_c-author'              => 1,
    'content_display_c-post__comments-link' => 1
  ) );

  return $defaults;
}
add_filter( 'ramza_option_defaults', 'ramza_set_content_settings_defaults' );
endif;
