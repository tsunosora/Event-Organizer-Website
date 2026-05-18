<?php
/**
 * Customizer hanya untuk teks Hero halaman Portfolio.
 * Daftar proyek dikelola di wp-admin → Portofolio (CPT 'project').
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', function ( $wp_customize ) {

    $wp_customize->add_panel( 'eo_portfolio_panel', array(
        'title'       => 'Halaman Portfolio',
        'description' => 'Edit teks hero halaman portfolio. Daftar proyek dikelola di menu Portofolio.',
        'priority'    => 40,
    ) );

    $add_text = function ( $id, $label, $default, $section, $type = 'text', $desc = '' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_textarea_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $label,
            'description' => $desc,
            'section'     => $section,
            'type'        => $type,
        ) );
    };

    $wp_customize->add_section( 'eo_pf_hero', array(
        'title'    => 'Hero Portfolio',
        'panel'    => 'eo_portfolio_panel',
        'priority' => 5,
    ) );
    $add_text( 'eo_pf_hero_eyebrow', 'Eyebrow', 'PORTFOLIO PROYEK', 'eo_pf_hero' );
    $add_text( 'eo_pf_hero_title',   'Headline', "Rekam Jejak Pameran, Booth,\nInterior & Event di Yogyakarta", 'eo_pf_hero', 'textarea' );
    $add_text( 'eo_pf_hero_subtitle','Subjudul', 'Lebih dari 200 proyek telah kami eksekusi untuk klien korporat di Yogyakarta dan kota-kota besar di Indonesia.', 'eo_pf_hero', 'textarea' );

}, 40 );

/**
 * Helper kategori label (untuk display di template).
 * Pakai data dari taxonomy project_category.
 */
function eo_pf_category_label( $term_slug_or_name ) {
    $term = get_term_by( 'slug', $term_slug_or_name, 'project_category' );
    if ( $term ) return $term->name;
    return $term_slug_or_name;
}
