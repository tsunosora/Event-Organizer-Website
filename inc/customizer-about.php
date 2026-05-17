<?php
/**
 * WP Customizer settings untuk halaman About.
 * Diakses di: Appearance → Customize → Halaman About
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'customize_register', function ( $wp_customize ) {

    // ============ PANEL ============
    $wp_customize->add_panel( 'ae_about_panel', array(
        'title'       => __( 'Halaman About', 'abadi-event' ),
        'description' => 'Edit teks &amp; gambar di halaman About',
        'priority'    => 30,
    ) );

    // Helper untuk daftarkan setting + control text/textarea
    $add_text = function ( $id, $label, $default, $section, $type = 'text' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( $id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => $type,
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

    // ============ SECTION: HERO ============
    $wp_customize->add_section( 'ae_about_hero', array(
        'title'    => 'Hero About',
        'panel'    => 'ae_about_panel',
        'priority' => 10,
    ) );
    $add_text( 'ae_about_hero_eyebrow', 'Eyebrow (label kecil di atas)', 'TENTANG PERUSAHAAN', 'ae_about_hero' );
    $add_text( 'ae_about_hero_title', 'Headline besar', "Mitra Strategis Pameran & Event\ndi Yogyakarta Sejak 2013", 'ae_about_hero', 'textarea' );
    $add_text( 'ae_about_hero_subtitle', 'Subjudul', 'Lebih dari satu dekade memberikan solusi konstruksi pameran, booth, interior, dan event organizer untuk klien korporat di seluruh Indonesia.', 'ae_about_hero', 'textarea' );

    // ============ SECTION: PROFIL ============
    $wp_customize->add_section( 'ae_about_profile', array(
        'title'    => 'Profil Perusahaan',
        'panel'    => 'ae_about_panel',
        'priority' => 20,
    ) );
    $add_text( 'ae_about_profile_title', 'Judul section', 'Tentang Abadi Event', 'ae_about_profile' );
    $add_text( 'ae_about_profile_p1', 'Paragraf 1', '<strong>Abadi Event</strong> adalah perusahaan kontraktor pameran dan event organizer yang berbasis di Yogyakarta. Berdiri sejak 2013, kami fokus melayani kebutuhan brand korporat dalam membangun kehadiran fisik yang berdampak — mulai dari booth pameran, konstruksi event, interior ruang komersial, hingga eksekusi acara perusahaan.', 'ae_about_profile', 'textarea' );
    $add_text( 'ae_about_profile_p2', 'Paragraf 2', 'Dengan tim in-house yang menangani seluruh tahapan proyek — perencanaan, desain 3D, produksi, instalasi, hingga bongkar pasca event — kami menjamin kualitas dan ketepatan waktu setiap pekerjaan.', 'ae_about_profile', 'textarea' );
    $add_text( 'ae_about_profile_p3', 'Paragraf 3', 'Hingga hari ini, kami telah menyelesaikan lebih dari 200 proyek dengan rating sempurna 5,0 di Google Business Profile.', 'ae_about_profile', 'textarea' );
    $add_image( 'ae_about_profile_image', 'Gambar Profil', 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80', 'ae_about_profile' );
    $add_text( 'ae_about_badge_number', 'Badge Angka (cth: 10+)', '10+', 'ae_about_profile' );
    $add_text( 'ae_about_badge_label', 'Badge Label', "Tahun\nPengalaman", 'ae_about_profile', 'textarea' );

    // ============ SECTION: VISI MISI ============
    $wp_customize->add_section( 'ae_about_vm', array(
        'title'    => 'Visi & Misi',
        'panel'    => 'ae_about_panel',
        'priority' => 30,
    ) );
    $add_text( 'ae_about_visi', 'Isi Visi', 'Menjadi kontraktor pameran dan event organizer terdepan di Daerah Istimewa Yogyakarta yang dipercaya oleh klien korporat melalui kualitas pekerjaan, ketepatan waktu, dan harga yang adil.', 'ae_about_vm', 'textarea' );
    $add_text( 'ae_about_misi_1', 'Misi 1', 'Memberikan desain booth dan event yang merepresentasikan identitas klien.', 'ae_about_vm', 'textarea' );
    $add_text( 'ae_about_misi_2', 'Misi 2', 'Menjaga standar kualitas konstruksi dan finishing pada setiap proyek.', 'ae_about_vm', 'textarea' );
    $add_text( 'ae_about_misi_3', 'Misi 3', 'Membangun kemitraan jangka panjang berbasis kepercayaan dan transparansi.', 'ae_about_vm', 'textarea' );
    $add_text( 'ae_about_misi_4', 'Misi 4', 'Memberdayakan tenaga kerja kreatif lokal Yogyakarta.', 'ae_about_vm', 'textarea' );

    // ============ SECTION: TIM ============
    $wp_customize->add_section( 'ae_about_team', array(
        'title'    => 'Tim Kami',
        'panel'    => 'ae_about_panel',
        'priority' => 40,
    ) );
    $add_text( 'ae_about_team_title', 'Judul section', 'Dipimpin oleh Profesional Berpengalaman', 'ae_about_team' );
    $add_text( 'ae_about_team_subtitle', 'Subjudul', 'Tim Abadi Event terdiri dari spesialis desain, produksi, dan manajemen proyek dengan rekam jejak di industri pameran.', 'ae_about_team', 'textarea' );

    $team_defaults = array(
        1 => array( 'Direktur Utama',     'Founder & CEO',           'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&q=80' ),
        2 => array( 'Project Director',   'Operasional & Produksi',  'https://images.unsplash.com/photo-1573497019418-b400bb3ab074?w=600&q=80' ),
        3 => array( 'Creative Director',  'Desain & Konsep',         'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=600&q=80' ),
        4 => array( 'Account Manager',    'Klien & Kemitraan',       'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600&q=80' ),
    );
    foreach ( $team_defaults as $i => $d ) {
        $add_text(  "ae_about_team_{$i}_name",     "Anggota {$i} — Nama",     $d[0], 'ae_about_team' );
        $add_text(  "ae_about_team_{$i}_position", "Anggota {$i} — Jabatan",  $d[1], 'ae_about_team' );
        $add_image( "ae_about_team_{$i}_photo",    "Anggota {$i} — Foto",     $d[2], 'ae_about_team' );
    }

    // ============ SECTION: LOKASI ============
    $wp_customize->add_section( 'ae_about_location', array(
        'title'    => 'Lokasi Kantor',
        'panel'    => 'ae_about_panel',
        'priority' => 50,
    ) );
    $add_text( 'ae_about_location_address', 'Alamat lengkap', 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta 55162', 'ae_about_location', 'textarea' );
    $add_text( 'ae_about_location_map_query', 'Query untuk Google Maps embed', 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta', 'ae_about_location', 'textarea' );

}, 20 );

/**
 * Helper untuk get nilai customizer dengan fallback default.
 */
function ae_mod( $id, $default = '' ) {
    return get_theme_mod( $id, $default );
}

/**
 * Helper untuk render text yang mengandung newline → ganti jadi <br>.
 */
function ae_nl2br( $text ) {
    return nl2br( wp_kses_post( $text ) );
}
