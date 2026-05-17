<?php
/**
 * Demo Content Importer untuk Event Organize Theme.
 * Akses di: wp-admin → Appearance → Demo Setup
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Tambah submenu di Appearance.
 */
add_action( 'admin_menu', function () {
    add_theme_page(
        'Demo Setup',
        'Demo Setup',
        'manage_options',
        'eo-demo-setup',
        'eo_demo_render_page'
    );
} );

/**
 * Render halaman admin demo importer.
 */
function eo_demo_render_page() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }

    $imported = isset( $_GET['imported'] ) && $_GET['imported'] === '1';
    $cleared  = isset( $_GET['cleared'] ) && $_GET['cleared'] === '1';
    ?>
    <div class="wrap">
        <h1>Event Organize — Demo Setup</h1>

        <?php if ( $imported ) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Demo berhasil di-import!</strong> Cek halaman beranda Anda di <a href="<?php echo esc_url( home_url('/') ); ?>" target="_blank"><?php echo esc_html( home_url('/') ); ?></a></p>
            </div>
        <?php endif; ?>

        <?php if ( $cleared ) : ?>
            <div class="notice notice-warning is-dismissible">
                <p>Demo content sudah dihapus. Customizer settings tidak ikut dihapus.</p>
            </div>
        <?php endif; ?>

        <div style="background:#fff;padding:24px;border:1px solid #ddd;border-radius:4px;max-width:880px;margin-top:20px;">
            <h2 style="margin-top:0;">Setup Website dengan 1 Klik</h2>
            <p>Tool ini akan secara otomatis melakukan setup awal website Anda:</p>

            <table class="widefat" style="margin-bottom:20px;">
                <thead>
                    <tr><th>Yang Akan Dibuat</th><th>Detail</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>5 Halaman utama</strong></td>
                        <td>Home, About, Portfolio, Blog, Contact (dengan slug yang benar)</td>
                    </tr>
                    <tr>
                        <td><strong>Settings → Reading</strong></td>
                        <td>Beranda = Home, Halaman Pos = Blog</td>
                    </tr>
                    <tr>
                        <td><strong>Primary Menu</strong></td>
                        <td>Menu dengan 5 link halaman utama</td>
                    </tr>
                    <tr>
                        <td><strong>5 Blog Post Dummy</strong></td>
                        <td>Artikel sample dengan kategori &amp; konten siap pakai</td>
                    </tr>
                    <tr>
                        <td><strong>Customizer — Identitas Brand</strong></td>
                        <td>Isi default dengan data Abadi Event (nama, WA, alamat, dll.) — bisa Anda edit kapan saja</td>
                    </tr>
                    <tr>
                        <td><strong>Customizer — Halaman About</strong></td>
                        <td>Isi default konten halaman About</td>
                    </tr>
                    <tr>
                        <td><strong>Pengaturan Permalink</strong></td>
                        <td>Set ke "Nama Posting" (untuk URL bersih /about/, /blog/, dll.)</td>
                    </tr>
                </tbody>
            </table>

            <p style="color:#666;font-size:13px;background:#fff8e5;padding:12px;border-left:3px solid #f0b849;">
                <strong>⚠ Aman:</strong> Tool ini <em>tidak akan membuat duplikat</em> kalau halaman dengan slug sama sudah ada. Konten yang sudah ada di Customizer tidak akan ditimpa.
            </p>

            <form method="post" action="">
                <?php wp_nonce_field( 'eo_import_demo', '_eo_nonce' ); ?>
                <input type="hidden" name="eo_action" value="import">
                <p>
                    <button type="submit" class="button button-primary button-hero">
                        🚀 Import Demo Sekarang
                    </button>
                </p>
            </form>
        </div>

        <div style="background:#fff;padding:24px;border:1px solid #ddd;border-radius:4px;max-width:880px;margin-top:20px;">
            <h2 style="margin-top:0;color:#a00;">Reset Demo</h2>
            <p>Hapus semua halaman & blog post yang dibuat oleh demo importer ini. Customizer settings <strong>tidak</strong> dihapus.</p>
            <form method="post" action="" onsubmit="return confirm('Yakin mau hapus semua halaman & post demo? Konten yang Anda edit manual akan ikut terhapus.');">
                <?php wp_nonce_field( 'eo_clear_demo', '_eo_nonce' ); ?>
                <input type="hidden" name="eo_action" value="clear">
                <p>
                    <button type="submit" class="button">Hapus Demo Content</button>
                </p>
            </form>
        </div>

        <div style="background:#fff;padding:24px;border:1px solid #ddd;border-radius:4px;max-width:880px;margin-top:20px;">
            <h2 style="margin-top:0;">Setelah Import — Langkah Selanjutnya</h2>
            <ol>
                <li>Cek tampilan website di <a href="<?php echo esc_url( home_url('/') ); ?>" target="_blank">homepage</a></li>
                <li>Edit identitas brand klien di <a href="<?php echo esc_url( admin_url('customize.php') ); ?>"><strong>Tampilan → Sesuaikan → Identitas Brand</strong></a></li>
                <li>Edit konten halaman About di <strong>Tampilan → Sesuaikan → Halaman About</strong></li>
                <li>Upload logo di <strong>Tampilan → Sesuaikan → Identitas Situs → Logo</strong></li>
                <li>Edit/ganti foto gallery & testimoni dengan foto asli klien</li>
            </ol>
        </div>
    </div>
    <?php
}

/**
 * Handler form submit.
 */
add_action( 'admin_init', function () {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    if ( empty( $_POST['eo_action'] ) ) { return; }

    if ( $_POST['eo_action'] === 'import' ) {
        check_admin_referer( 'eo_import_demo', '_eo_nonce' );
        eo_demo_import();
        wp_safe_redirect( add_query_arg( 'imported', '1', menu_page_url( 'eo-demo-setup', false ) ) );
        exit;
    }

    if ( $_POST['eo_action'] === 'clear' ) {
        check_admin_referer( 'eo_clear_demo', '_eo_nonce' );
        eo_demo_clear();
        wp_safe_redirect( add_query_arg( 'cleared', '1', menu_page_url( 'eo-demo-setup', false ) ) );
        exit;
    }
} );

/**
 * MAIN IMPORTER — Eksekusi seluruh setup.
 */
function eo_demo_import() {

    // ============ 1. Buat 5 halaman ============
    $pages = array(
        'home'      => 'Home',
        'about'     => 'About',
        'portfolio' => 'Portfolio',
        'blog'      => 'Blog',
        'contact'   => 'Contact',
    );
    $page_ids = array();
    foreach ( $pages as $slug => $title ) {
        $existing = get_page_by_path( $slug );
        if ( $existing ) {
            $page_ids[ $slug ] = $existing->ID;
            update_post_meta( $existing->ID, '_eo_demo_imported', '1' );
            continue;
        }
        $page_ids[ $slug ] = wp_insert_post( array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
            'meta_input'   => array( '_eo_demo_imported' => '1' ),
        ) );
    }

    // ============ 2. Settings Reading ============
    if ( ! empty( $page_ids['home'] ) && ! empty( $page_ids['blog'] ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids['home'] );
        update_option( 'page_for_posts', $page_ids['blog'] );
    }

    // ============ 3. Permalink ke "Nama Posting" ============
    if ( get_option( 'permalink_structure' ) === '' ) {
        update_option( 'permalink_structure', '/%postname%/' );
        flush_rewrite_rules();
    }

    // ============ 4. Buat Primary Menu ============
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        foreach ( $pages as $slug => $title ) {
            if ( empty( $page_ids[ $slug ] ) ) continue;
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => $title,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page_ids[ $slug ],
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ) );
        }
        // Set sebagai primary
        $locations = get_theme_mod( 'nav_menu_locations', array() );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // ============ 5. Set Customizer — Identitas Brand (kalau belum di-set) ============
    $brand_defaults = array(
        'eo_company_name'        => 'Abadi Event',
        'eo_company_tagline'     => 'Kontraktor Pameran & Event Organizer',
        'eo_company_about_short' => 'Kontraktor pameran, booth, interior & event organizer profesional di Yogyakarta.',
        'eo_company_year'        => '2013',
        'eo_company_city'        => 'Yogyakarta',
        'eo_contact_wa'          => '6281227447888',
        'eo_contact_wa_display'  => '0812-2744-7888',
        'eo_contact_email'       => 'info@abadievent.id',
        'eo_contact_wa_message'  => 'Halo Abadi Event, saya mau tanya soal layanan Anda.',
        'eo_address_full'        => 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta 55162',
        'eo_address_city'        => 'Sorosutan, Yogyakarta',
        'eo_address_map_query'   => 'Jl. Godo Inten UH VI No.50E, Sorosutan, Umbulharjo, Yogyakarta',
        'eo_hours_short'         => 'Senin – Sabtu, 08.00 – 17.00 WIB',
        'eo_hours_long'          => "Senin – Sabtu\n08.00 – 17.00 WIB",
        'eo_rating_score'        => '5.0',
        'eo_rating_count'        => '6',
        'eo_stat_projects'       => '200+',
        'eo_stat_clients'        => '150+',
        'eo_stat_cities'         => '25+',
        'eo_stat_years'          => '10+',
    );
    foreach ( $brand_defaults as $key => $value ) {
        if ( get_theme_mod( $key ) === false || get_theme_mod( $key ) === '' ) {
            set_theme_mod( $key, $value );
        }
    }

    // ============ 6. Set Customizer — Halaman About ============
    $about_defaults = array(
        'ae_about_hero_eyebrow'    => 'TENTANG PERUSAHAAN',
        'ae_about_hero_title'      => "Mitra Strategis Pameran & Event\ndi Yogyakarta Sejak 2013",
        'ae_about_hero_subtitle'   => 'Lebih dari satu dekade memberikan solusi konstruksi pameran, booth, interior, dan event organizer untuk klien korporat di seluruh Indonesia.',
        'ae_about_profile_title'   => 'Tentang Abadi Event',
        'ae_about_profile_p1'      => '<strong>Abadi Event</strong> adalah perusahaan kontraktor pameran dan event organizer yang berbasis di Yogyakarta. Berdiri sejak 2013, kami fokus melayani kebutuhan brand korporat dalam membangun kehadiran fisik yang berdampak — mulai dari booth pameran, konstruksi event, interior ruang komersial, hingga eksekusi acara perusahaan.',
        'ae_about_profile_p2'      => 'Dengan tim in-house yang menangani seluruh tahapan proyek — perencanaan, desain 3D, produksi, instalasi, hingga bongkar pasca event — kami menjamin kualitas dan ketepatan waktu setiap pekerjaan.',
        'ae_about_profile_p3'      => 'Hingga hari ini, kami telah menyelesaikan lebih dari 200 proyek dengan rating sempurna 5,0 di Google Business Profile.',
        'ae_about_badge_number'    => '10+',
        'ae_about_badge_label'     => "Tahun\nPengalaman",
        'ae_about_visi'            => 'Menjadi kontraktor pameran dan event organizer terdepan di Daerah Istimewa Yogyakarta yang dipercaya oleh klien korporat melalui kualitas pekerjaan, ketepatan waktu, dan harga yang adil.',
        'ae_about_misi_1'          => 'Memberikan desain booth dan event yang merepresentasikan identitas klien.',
        'ae_about_misi_2'          => 'Menjaga standar kualitas konstruksi dan finishing pada setiap proyek.',
        'ae_about_misi_3'          => 'Membangun kemitraan jangka panjang berbasis kepercayaan dan transparansi.',
        'ae_about_misi_4'          => 'Memberdayakan tenaga kerja kreatif lokal Yogyakarta.',
        'ae_about_team_title'      => 'Dipimpin oleh Profesional Berpengalaman',
        'ae_about_team_subtitle'   => 'Tim Abadi Event terdiri dari spesialis desain, produksi, dan manajemen proyek dengan rekam jejak di industri pameran.',
        'ae_about_team_1_name'     => 'Direktur Utama',
        'ae_about_team_1_position' => 'Founder & CEO',
        'ae_about_team_2_name'     => 'Project Director',
        'ae_about_team_2_position' => 'Operasional & Produksi',
        'ae_about_team_3_name'     => 'Creative Director',
        'ae_about_team_3_position' => 'Desain & Konsep',
        'ae_about_team_4_name'     => 'Account Manager',
        'ae_about_team_4_position' => 'Klien & Kemitraan',
    );
    foreach ( $about_defaults as $key => $value ) {
        if ( get_theme_mod( $key ) === false || get_theme_mod( $key ) === '' ) {
            set_theme_mod( $key, $value );
        }
    }

    // ============ 7. Buat 5 Blog Post Dummy ============
    $posts = array(
        array(
            'title'    => 'Tips Memilih Kontraktor Booth Pameran Profesional',
            'category' => 'Panduan',
            'content'  => "<p>Memilih kontraktor booth pameran yang tepat menjadi salah satu kunci kesuksesan partisipasi brand Anda di event B2B. Berikut beberapa pertimbangan penting yang harus diperhatikan sebelum menandatangani kontrak dengan kontraktor.</p>\n\n<h2>1. Portofolio dan Pengalaman</h2>\n<p>Pastikan kontraktor memiliki portofolio yang relevan dengan industri Anda. Minta referensi proyek serupa dan, jika memungkinkan, kunjungi langsung salah satu booth yang sudah mereka kerjakan.</p>\n\n<h2>2. Tim In-House vs Outsourcing</h2>\n<p>Kontraktor dengan tim in-house (desainer, tukang, instalasi) cenderung lebih dapat menjaga kualitas dan timeline. Outsourcing ke pihak ketiga sering kali membuat kontrol kualitas sulit dijaga.</p>\n\n<h2>3. Transparansi RAB</h2>\n<p>RAB yang baik harus terperinci per item — bukan harga gelondongan. Ini menghindari biaya tambahan di tengah proyek.</p>\n\n<h2>4. Garansi Pekerjaan</h2>\n<p>Pastikan ada klausul garansi selama event berlangsung. Booth bisa saja mengalami kerusakan teknis yang harus segera diperbaiki tanpa biaya tambahan.</p>",
        ),
        array(
            'title'    => 'Checklist Persiapan Pameran B2B Skala Nasional',
            'category' => 'Tips Pameran',
            'content'  => "<p>Pameran B2B berskala nasional membutuhkan persiapan matang minimal 2-3 bulan sebelum hari H. Berikut checklist yang sering kami berikan kepada klien.</p>\n\n<h2>3 Bulan Sebelum H</h2>\n<ul>\n<li>Konfirmasi booking booth dan dapatkan denah hall</li>\n<li>Tentukan tujuan partisipasi: branding, lead generation, atau penjualan</li>\n<li>Siapkan anggaran detail (booth, brosur, merchandise, akomodasi tim)</li>\n</ul>\n\n<h2>2 Bulan Sebelum H</h2>\n<ul>\n<li>Mulai desain booth dengan kontraktor</li>\n<li>Approval render 3D dan technical drawing</li>\n<li>Pesan merchandise dan brosur</li>\n</ul>\n\n<h2>1 Bulan Sebelum H</h2>\n<ul>\n<li>Konfirmasi jadwal instalasi dengan event organizer</li>\n<li>Brief tim sales yang akan jaga booth</li>\n<li>Latihan demo produk</li>\n</ul>",
        ),
        array(
            'title'    => '5 Inspirasi Desain Booth yang Mencuri Perhatian Pengunjung',
            'category' => 'Inspirasi',
            'content'  => "<p>Booth yang menarik perhatian tidak harus mahal — tapi harus punya konsep yang kuat. Berikut 5 inspirasi yang bisa Anda terapkan.</p>\n\n<h2>1. Open Concept dengan Sentuhan Industrial</h2>\n<p>Konsep terbuka tanpa dinding pembatas membuat pengunjung merasa welcome. Tambahkan elemen kayu dan logam untuk nuansa industrial yang trendi.</p>\n\n<h2>2. Interactive Wall</h2>\n<p>Dinding dengan layar interaktif atau permainan branded menjadi magnet pengunjung.</p>\n\n<h2>3. Booth Dua Lantai</h2>\n<p>Memanfaatkan ruang vertikal untuk area diskusi VIP atau gudang stok.</p>\n\n<h2>4. Hidden Bar / Cafe Corner</h2>\n<p>Tawarkan kopi atau snack gratis di pojok booth — pengunjung akan stay lebih lama.</p>\n\n<h2>5. Lighting Drama</h2>\n<p>Pencahayaan yang tepat membuat produk terlihat lebih premium dibanding lampu hall standar.</p>",
        ),
        array(
            'title'    => 'Berapa Biaya Sewa Kontraktor Pameran? Panduan 2026',
            'category' => 'Insight',
            'content'  => "<p>Pertanyaan paling sering kami terima dari klien baru adalah soal biaya. Jawaban detail tergantung beberapa faktor, tapi berikut gambaran range pasaran untuk 2026.</p>\n\n<h2>Booth Standard 3x3 meter</h2>\n<p>Range: <strong>Rp 8 - 18 juta</strong>. Sudah termasuk partisi, karpet, lampu spot, meja, dan kursi standar.</p>\n\n<h2>Booth Custom 6x3 meter (1 lantai)</h2>\n<p>Range: <strong>Rp 35 - 75 juta</strong>. Termasuk desain custom, lighting LED, branding digital print, dan furniture custom.</p>\n\n<h2>Booth Custom 6x6 meter (2 lantai)</h2>\n<p>Range: <strong>Rp 120 - 250 juta</strong>. Untuk klien yang ingin tampil dominan dengan area VIP.</p>\n\n<h2>Faktor yang Mempengaruhi Harga</h2>\n<ul>\n<li>Kompleksitas desain</li>\n<li>Pemilihan material (multipleks vs MDF vs metal)</li>\n<li>Lokasi pameran (luar kota = ada biaya logistik)</li>\n<li>Timeline (rush job ada surcharge)</li>\n</ul>",
        ),
        array(
            'title'    => 'Perbedaan Booth Standard, Custom, dan Modular',
            'category' => 'Edukasi',
            'content'  => "<p>Sebelum memesan booth, pahami dulu 3 jenis booth utama yang umum dipakai di pameran.</p>\n\n<h2>Booth Standard</h2>\n<p>Booth bawaan dari event organizer. Biasanya berupa partisi 2.5m tinggi, karpet, 1 meja, 2 kursi, dan 2 lampu. <strong>Cocok untuk:</strong> Booth UMKM, pameran skala kecil, anggaran terbatas.</p>\n\n<h2>Booth Custom</h2>\n<p>Booth yang dirancang spesifik untuk brand Anda, dengan material, layout, dan branding sesuai brief. <strong>Cocok untuk:</strong> Brand korporat, launching produk, ingin tampil beda.</p>\n\n<h2>Booth Modular</h2>\n<p>Booth dengan komponen knock-down yang bisa dirakit ulang. Investasi awal lebih mahal, tapi bisa dipakai berkali-kali. <strong>Cocok untuk:</strong> Brand yang rutin pameran (3+ event per tahun).</p>",
        ),
    );

    foreach ( $posts as $p ) {
        // Skip kalau post dengan judul sama sudah ada
        $existing_query = new WP_Query( array(
            'post_type' => 'post',
            'title'     => $p['title'],
            'post_status' => 'any',
            'posts_per_page' => 1,
        ) );
        if ( $existing_query->have_posts() ) { continue; }

        $post_id = wp_insert_post( array(
            'post_title'   => $p['title'],
            'post_content' => $p['content'],
            'post_excerpt' => wp_trim_words( wp_strip_all_tags( $p['content'] ), 30 ),
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'meta_input'   => array( '_eo_demo_imported' => '1' ),
        ) );

        // Set kategori
        if ( $post_id && ! is_wp_error( $post_id ) ) {
            $cat_id = wp_create_category( $p['category'] );
            wp_set_post_categories( $post_id, array( $cat_id ) );
        }
    }
}

/**
 * Clear demo content — hapus halaman & post yang dibuat importer.
 */
function eo_demo_clear() {
    $args = array(
        'post_type'   => array( 'page', 'post' ),
        'post_status' => 'any',
        'numberposts' => -1,
        'meta_key'    => '_eo_demo_imported',
        'meta_value'  => '1',
    );
    $items = get_posts( $args );
    foreach ( $items as $item ) {
        wp_delete_post( $item->ID, true );
    }

    // Hapus menu yang dibuat
    $menu = wp_get_nav_menu_object( 'Primary Menu' );
    if ( $menu ) {
        wp_delete_nav_menu( $menu->term_id );
    }
}
