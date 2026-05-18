<?php
/**
 * WP Customizer untuk Halaman Home — Hero Slider.
 * Akses: Appearance → Customize → Halaman Home
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', function ( $wp_customize ) {

    $wp_customize->add_panel( 'eo_home_panel', array(
        'title'       => 'Halaman Home',
        'description' => 'Edit hero slider dan section halaman beranda.',
        'priority'    => 35,
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

    // ============ HERO SLIDER GLOBAL ============
    $wp_customize->add_section( 'eo_home_hero_global', array(
        'title'    => 'Hero Slider — Pengaturan',
        'panel'    => 'eo_home_panel',
        'priority' => 5,
    ) );
    $wp_customize->add_setting( 'eo_home_hero_autoplay', array(
        'default'           => 5000,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'eo_home_hero_autoplay', array(
        'label'       => 'Autoplay delay (milidetik)',
        'description' => '5000 = 5 detik. Set 0 untuk matikan autoplay.',
        'section'     => 'eo_home_hero_global',
        'type'        => 'number',
    ) );
    $wp_customize->add_setting( 'eo_home_hero_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'eo_home_hero_count', array(
        'label'       => 'Jumlah slide yang ditampilkan',
        'description' => 'Tersedia maksimal 3 slide. Set 1, 2, atau 3.',
        'section'     => 'eo_home_hero_global',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 3 ),
    ) );

    // ============ DEFAULT DATA TIAP SLIDE ============
    $slide_defaults = array(
        1 => array(
            'image'    => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1600&q=80',
            'eyebrow'  => 'KONTRAKTOR PAMERAN YOGYAKARTA',
            'title1'   => 'Bawa Brand Anda',
            'accent'   => 'Tampil Maksimal',
            'title2'   => 'di Setiap Pameran',
            'subtitle' => 'Desain custom, eksekusi rapi, deadline tepat waktu. Lebih dari 200 event sukses di Yogyakarta.',
            'btn1'     => 'Chat WhatsApp',
            'btn1_url' => 'wa',
            'btn2'     => 'Lihat Portfolio',
            'btn2_url' => '/portfolio/',
        ),
        2 => array(
            'image'    => 'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=1600&q=80',
            'eyebrow'  => 'BOOTH CUSTOM PREMIUM',
            'title1'   => 'Booth yang',
            'accent'   => 'Mencuri Perhatian',
            'title2'   => 'Pengunjung Pameran',
            'subtitle' => 'Material premium, branding tajam, instalasi cepat. Booth Anda jadi magnet di hall pameran.',
            'btn1'     => 'Konsultasi Gratis',
            'btn1_url' => 'wa',
            'btn2'     => 'Galeri Booth',
            'btn2_url' => '/portfolio/',
        ),
        3 => array(
            'image'    => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1600&q=80',
            'eyebrow'  => 'EVENT ORGANIZER PROFESIONAL',
            'title1'   => 'Event Korporat',
            'accent'   => 'Berkesan',
            'title2'   => 'dari Konsep ke Eksekusi',
            'subtitle' => 'Gathering, launching, seminar — kami tangani satu pintu, Anda tinggal hadir.',
            'btn1'     => 'Diskusi Event',
            'btn1_url' => 'wa',
            'btn2'     => 'Tentang Kami',
            'btn2_url' => '/about/',
        ),
    );

    foreach ( $slide_defaults as $i => $d ) {
        $section_id = "eo_home_hero_slide_{$i}";
        $wp_customize->add_section( $section_id, array(
            'title'    => "Hero Slide {$i}",
            'panel'    => 'eo_home_panel',
            'priority' => 10 + $i,
        ) );

        $add_image( "eo_home_hero_{$i}_image",    'Gambar Background',                      $d['image'],    $section_id );
        $add_text(  "eo_home_hero_{$i}_eyebrow",  'Eyebrow (label kecil di atas, UPPERCASE)', $d['eyebrow'],  $section_id );
        $add_text(  "eo_home_hero_{$i}_title1",   'Headline Bagian 1 (sebelum aksen)',      $d['title1'],   $section_id );
        $add_text(  "eo_home_hero_{$i}_accent",   'Kata Aksen (di-highlight merah)',         $d['accent'],   $section_id, 'text', 'Bagian dari headline yang ditampilkan warna merah terang.' );
        $add_text(  "eo_home_hero_{$i}_title2",   'Headline Bagian 2 (setelah aksen)',      $d['title2'],   $section_id, 'textarea' );
        $add_text(  "eo_home_hero_{$i}_subtitle", 'Subjudul / Deskripsi',                    $d['subtitle'], $section_id, 'textarea' );
        $add_text(  "eo_home_hero_{$i}_btn1",     'Tombol 1 — Teks',                         $d['btn1'],     $section_id );
        $add_text(  "eo_home_hero_{$i}_btn1_url", 'Tombol 1 — URL',                          $d['btn1_url'], $section_id, 'text', 'Ketik "wa" untuk link ke WhatsApp (dari Identitas Brand), atau ketik URL lengkap (cth: /portfolio/).' );
        $add_text(  "eo_home_hero_{$i}_btn2",     'Tombol 2 — Teks',                         $d['btn2'],     $section_id );
        $add_text(  "eo_home_hero_{$i}_btn2_url", 'Tombol 2 — URL',                          $d['btn2_url'], $section_id, 'text', 'Ketik "wa" untuk WhatsApp, atau URL lengkap.' );
    }

    // ============ ABOUT INTRO IMAGE ============
    $wp_customize->add_section( 'eo_home_about_intro', array(
        'title'    => 'Section "Tentang Kami" (intro)',
        'panel'    => 'eo_home_panel',
        'priority' => 30,
    ) );
    $add_image( 'eo_home_about_intro_image', 'Gambar tim/kantor', 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=800&q=80', 'eo_home_about_intro' );

}, 30 );

/**
 * Helper: resolve URL tombol hero — "wa" jadi link WhatsApp, lainnya jadi URL biasa.
 */
function eo_resolve_url( $url ) {
    if ( $url === 'wa' || $url === 'whatsapp' ) {
        return eo_wa_link();
    }
    if ( strpos( $url, 'http' ) === 0 ) {
        return $url;
    }
    return home_url( $url );
}
