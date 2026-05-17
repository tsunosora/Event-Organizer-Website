<?php
/**
 * Brand Customizer — identitas perusahaan (reusable theme).
 * Akses di: Appearance → Customize → Identitas Brand
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', function ( $wp_customize ) {

    $wp_customize->add_panel( 'eo_brand_panel', array(
        'title'       => 'Identitas Brand',
        'description' => 'Edit nama perusahaan, kontak, alamat, dan info brand lainnya.',
        'priority'    => 10,
    ) );

    $add_text = function ( $id, $label, $default, $section, $type = 'text', $desc = '' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $label,
            'description' => $desc,
            'section'     => $section,
            'type'        => $type,
        ) );
    };
    $add_textarea = function ( $id, $label, $default, $section, $desc = '' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $label,
            'description' => $desc,
            'section'     => $section,
            'type'        => 'textarea',
        ) );
    };

    // ============ COMPANY INFO ============
    $wp_customize->add_section( 'eo_brand_company', array(
        'title'    => 'Informasi Perusahaan',
        'panel'    => 'eo_brand_panel',
        'priority' => 10,
    ) );
    $add_text( 'eo_company_name',        'Nama Perusahaan',        'Abadi Event',                                        'eo_brand_company', 'text', 'Ditampilkan di logo navbar, footer, dan seluruh referensi brand di website.' );
    $add_text( 'eo_company_tagline',     'Tagline / Slogan',       'Kontraktor Pameran & Event Organizer',               'eo_brand_company', 'text', 'Sub-judul singkat di footer.' );
    $add_textarea( 'eo_company_about_short', 'Deskripsi Singkat (footer)', 'Kontraktor pameran, booth, interior & event organizer profesional di Yogyakarta.', 'eo_brand_company', 'Muncul di footer kolom pertama, di bawah nama perusahaan.' );
    $add_text( 'eo_company_year',        'Tahun Berdiri',          '2013',                                                'eo_brand_company' );
    $add_text( 'eo_company_city',        'Kota Operasi',           'Yogyakarta',                                          'eo_brand_company' );

    // ============ CONTACT ============
    $wp_customize->add_section( 'eo_brand_contact', array(
        'title'    => 'Kontak',
        'panel'    => 'eo_brand_panel',
        'priority' => 20,
    ) );
    $add_text( 'eo_contact_wa',          'Nomor WhatsApp (format internasional)',  '6281227447888', 'eo_brand_contact', 'text', 'Tanpa tanda + dan tanpa 0 di depan. Contoh: 6281227447888' );
    $add_text( 'eo_contact_wa_display',  'Nomor WA tampilan',      '0812-2744-7888',                                       'eo_brand_contact', 'text', 'Format untuk ditampilkan di website.' );
    $add_text( 'eo_contact_email',       'Email',                   'info@abadievent.id',                                  'eo_brand_contact' );
    $add_text( 'eo_contact_wa_message',  'Pesan default WA',        'Halo, saya mau tanya soal layanan Anda.',             'eo_brand_contact', 'text', 'Teks pesan otomatis saat klik tombol WhatsApp.' );

    // ============ ADDRESS ============
    $wp_customize->add_section( 'eo_brand_address', array(
        'title'    => 'Alamat & Jam Buka',
        'panel'    => 'eo_brand_panel',
        'priority' => 30,
    ) );
    $add_textarea( 'eo_address_full', 'Alamat Lengkap', 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta 55162', 'eo_brand_address' );
    $add_text(     'eo_address_city', 'Kota (untuk badge / sub-text)', 'Sorosutan, Yogyakarta', 'eo_brand_address' );
    $add_textarea( 'eo_address_map_query', 'Query untuk Google Maps embed', 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta', 'eo_brand_address', 'Teks yang akan dimasukkan ke URL Google Maps. Bisa berupa alamat atau koordinat.' );
    $add_text(     'eo_hours_short', 'Jam Buka (singkat)',      'Senin – Sabtu, 08.00 – 17.00 WIB', 'eo_brand_address' );
    $add_textarea( 'eo_hours_long',  'Jam Buka (multibaris)',   "Senin – Sabtu\n08.00 – 17.00 WIB", 'eo_brand_address' );

    // ============ SOCIAL & RATING ============
    $wp_customize->add_section( 'eo_brand_social', array(
        'title'    => 'Sosial Media & Rating',
        'panel'    => 'eo_brand_panel',
        'priority' => 40,
    ) );
    $add_text( 'eo_social_instagram', 'URL Instagram',  '',                              'eo_brand_social' );
    $add_text( 'eo_social_facebook',  'URL Facebook',   '',                              'eo_brand_social' );
    $add_text( 'eo_social_google',    'URL Google Reviews', '',                          'eo_brand_social' );
    $add_text( 'eo_rating_score',     'Skor Google',    '5.0',                           'eo_brand_social' );
    $add_text( 'eo_rating_count',     'Jumlah ulasan',  '6',                             'eo_brand_social' );

    // ============ STATS (Home & Portfolio) ============
    $wp_customize->add_section( 'eo_brand_stats', array(
        'title'    => 'Statistik Perusahaan',
        'panel'    => 'eo_brand_panel',
        'priority' => 50,
    ) );
    $add_text( 'eo_stat_projects', 'Jumlah Proyek',       '200+', 'eo_brand_stats' );
    $add_text( 'eo_stat_clients',  'Jumlah Klien',        '150+', 'eo_brand_stats' );
    $add_text( 'eo_stat_cities',   'Kota Terjangkau',     '25+',  'eo_brand_stats' );
    $add_text( 'eo_stat_years',    'Tahun Pengalaman',    '10+',  'eo_brand_stats' );

}, 10 );

/**
 * Helper utama: ambil setting brand.
 */
function eo_brand( $key, $default = '' ) {
    return get_theme_mod( 'eo_' . $key, $default );
}

/**
 * Helper khusus: nama perusahaan (fallback ke bloginfo).
 */
function eo_company_name() {
    $name = get_theme_mod( 'eo_company_name', '' );
    return $name ?: get_bloginfo( 'name' );
}

/**
 * Helper: nomor WhatsApp bersih (digit only).
 */
function eo_wa_number() {
    return preg_replace( '/\D/', '', get_theme_mod( 'eo_contact_wa', '6281227447888' ) );
}

/**
 * Helper: link wa.me dengan pesan custom (atau default).
 */
function eo_wa_link( $message = null ) {
    if ( $message === null ) {
        $message = get_theme_mod( 'eo_contact_wa_message', 'Halo, saya mau tanya soal layanan Anda.' );
    }
    return 'https://wa.me/' . eo_wa_number() . '?text=' . rawurlencode( $message );
}

/**
 * Helper: URL Google Maps embed dari address query.
 */
function eo_map_embed_url() {
    $query = get_theme_mod( 'eo_address_map_query', 'Yogyakarta' );
    return 'https://www.google.com/maps?q=' . urlencode( $query ) . '&output=embed';
}

/**
 * Helper render: ganti newline jadi <br>.
 */
function eo_nl2br( $text ) {
    return nl2br( wp_kses_post( $text ) );
}
