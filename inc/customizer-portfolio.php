<?php
/**
 * WP Customizer untuk Halaman Portfolio.
 * Akses: Appearance → Customize → Halaman Portfolio
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', function ( $wp_customize ) {

    $wp_customize->add_panel( 'eo_portfolio_panel', array(
        'title'       => 'Halaman Portfolio',
        'description' => 'Edit featured project & 12 proyek di halaman portfolio.',
        'priority'    => 40,
    ) );

    $add_text = function ( $id, $label, $default, $section, $type = 'text', $desc = '' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $label,
            'description' => $desc,
            'section'     => $section,
            'type'        => $type,
        ) );
    };
    $add_image = function ( $id, $label, $default, $section ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize, $id, array(
                'label'   => $label,
                'section' => $section,
            )
        ) );
    };
    $add_select = function ( $id, $label, $default, $section, $choices ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => 'select',
            'choices' => $choices,
        ) );
    };

    $category_choices = array(
        'booth'    => 'Booth Pameran',
        'pameran'  => 'Konstruksi Pameran',
        'interior' => 'Interior Desain',
        'event'    => 'Event Organizer',
    );

    // ============ HERO PORTFOLIO ============
    $wp_customize->add_section( 'eo_pf_hero', array(
        'title'    => 'Hero Portfolio',
        'panel'    => 'eo_portfolio_panel',
        'priority' => 5,
    ) );
    $add_text( 'eo_pf_hero_eyebrow', 'Eyebrow', 'PORTFOLIO PROYEK', 'eo_pf_hero' );
    $add_text( 'eo_pf_hero_title',   'Headline', "Rekam Jejak Pameran, Booth,\nInterior & Event di Yogyakarta", 'eo_pf_hero', 'textarea' );
    $add_text( 'eo_pf_hero_subtitle','Subjudul', 'Lebih dari 200 proyek telah kami eksekusi untuk klien korporat di Yogyakarta dan kota-kota besar di Indonesia.', 'eo_pf_hero', 'textarea' );

    // ============ FEATURED PROJECT ============
    $wp_customize->add_section( 'eo_pf_featured', array(
        'title'    => 'Featured Project (Unggulan)',
        'panel'    => 'eo_portfolio_panel',
        'priority' => 10,
    ) );
    $add_text(   'eo_pf_featured_title',    'Judul Proyek',           'Booth Pameran Otomotif Nasional',    'eo_pf_featured' );
    $add_text(   'eo_pf_featured_client',   'Klien',                  'PT Otomotif Nasional',                'eo_pf_featured' );
    $add_text(   'eo_pf_featured_location', 'Lokasi',                 'JEC Yogyakarta',                      'eo_pf_featured' );
    $add_text(   'eo_pf_featured_year',     'Tahun',                  '2025',                                'eo_pf_featured' );
    $add_select( 'eo_pf_featured_category', 'Kategori',               'booth',                               'eo_pf_featured', $category_choices );
    $add_image(  'eo_pf_featured_image',    'Gambar Featured',        'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=1200&q=80', 'eo_pf_featured' );
    $add_text(   'eo_pf_featured_desc',     'Deskripsi Proyek',
        'Booth dua lantai seluas 12×8 meter dengan konsep modern industrial untuk menampilkan lini produk terbaru klien. Pengerjaan diselesaikan dalam 21 hari kerja, mulai dari konsultasi, render 3D, produksi material, hingga instalasi on-site.',
        'eo_pf_featured', 'textarea' );
    $add_text(   'eo_pf_featured_point_1',  'Highlight Point 1',      'Konstruksi dua lantai dengan tangga akses pengunjung VIP', 'eo_pf_featured', 'textarea' );
    $add_text(   'eo_pf_featured_point_2',  'Highlight Point 2',      'Lighting LED custom dengan kontrol intensitas otomatis',    'eo_pf_featured', 'textarea' );
    $add_text(   'eo_pf_featured_point_3',  'Highlight Point 3',      'Branding cetak digital high-resolution di seluruh panel',   'eo_pf_featured', 'textarea' );
    $add_text(   'eo_pf_featured_point_4',  'Highlight Point 4',      'Area diskusi tertutup berkapasitas 8 orang',                'eo_pf_featured', 'textarea' );

    // ============ JUMLAH ITEM ============
    $wp_customize->add_section( 'eo_pf_items_settings', array(
        'title'    => 'Pengaturan Grid Proyek',
        'panel'    => 'eo_portfolio_panel',
        'priority' => 15,
    ) );
    $wp_customize->add_setting( 'eo_pf_items_count', array(
        'default'           => 12,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'eo_pf_items_count', array(
        'label'       => 'Jumlah proyek yang ditampilkan',
        'description' => 'Maksimal 12. Set 0 untuk sembunyikan section grid.',
        'section'     => 'eo_pf_items_settings',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 12 ),
    ) );

    // ============ 12 PROJECT ITEMS ============
    $item_defaults = array(
        1  => array( 'booth',    'Booth Pameran Otomotif',     'PT Otomotif Nasional',     '2025', 'JEC Yogyakarta',    'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=900&q=80' ),
        2  => array( 'pameran',  'Pameran UMKM Yogyakarta',    'Disperindag DIY',          '2025', 'Jogja Expo Center', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&q=80' ),
        3  => array( 'interior', 'Showroom Furniture Premium', 'PT Furnitur Jaya',         '2024', 'Jl. Magelang KM 7', 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80' ),
        4  => array( 'event',    'Corporate Gathering 500 Pax','PLN UID Yogyakarta',       '2024', 'Hotel Tentrem',     'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=900&q=80' ),
        5  => array( 'booth',    'Booth Trade Show Properti',  'Asosiasi Properti DIY',    '2025', 'Sahid Raya Hotel',  'https://images.unsplash.com/photo-1531058020387-3be344556be6?w=900&q=80' ),
        6  => array( 'event',    'Launching Produk Smartphone','Brand Nasional',           '2024', 'Plaza Ambarrukmo',  'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=900&q=80' ),
        7  => array( 'pameran',  'Pameran Pendidikan UGM',     'UGM Expo',                 '2024', 'Grha Sabha Pramana','https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&q=80' ),
        8  => array( 'interior', 'Kantor Co-Working Modern',   'Startup Yogyakarta',       '2024', 'Sleman City Hall',  'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=80' ),
        9  => array( 'booth',    'Booth Aktivasi Brand FMCG',  'Mall Jogja',               '2025', 'Hartono Mall',      'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=900&q=80' ),
        10 => array( 'event',    'Seminar Nasional Konstruksi','Asosiasi Kontraktor',      '2024', 'Royal Ambarrukmo',  'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=900&q=80' ),
        11 => array( 'interior', 'Cafe & Resto Boutique',      'Klien Pribadi',            '2024', 'Jl. Kaliurang KM 6','https://images.unsplash.com/photo-1521017432531-fbd92d768814?w=900&q=80' ),
        12 => array( 'pameran',  'Pameran Kerajinan Lokal',    'Dinas Pariwisata DIY',     '2025', 'JEC Yogyakarta',    'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=900&q=80' ),
    );

    foreach ( $item_defaults as $i => $d ) {
        $section_id = "eo_pf_item_{$i}";
        $wp_customize->add_section( $section_id, array(
            'title'    => "Proyek {$i}",
            'panel'    => 'eo_portfolio_panel',
            'priority' => 20 + $i,
        ) );

        $add_select( "eo_pf_item_{$i}_category", 'Kategori',          $d[0], $section_id, $category_choices );
        $add_text(   "eo_pf_item_{$i}_title",    'Judul Proyek',      $d[1], $section_id );
        $add_text(   "eo_pf_item_{$i}_client",   'Klien',             $d[2], $section_id );
        $add_text(   "eo_pf_item_{$i}_year",     'Tahun',             $d[3], $section_id );
        $add_text(   "eo_pf_item_{$i}_location", 'Lokasi / Venue',    $d[4], $section_id );
        $add_image(  "eo_pf_item_{$i}_image",    'Gambar Proyek',     $d[5], $section_id );
    }

}, 40 );

/**
 * Helper: ambil label kategori dari slug.
 */
function eo_pf_category_label( $slug ) {
    $map = array(
        'booth'    => 'Booth Pameran',
        'pameran'  => 'Konstruksi Pameran',
        'interior' => 'Interior Desain',
        'event'    => 'Event Organizer',
    );
    return $map[ $slug ] ?? ucfirst( $slug );
}
