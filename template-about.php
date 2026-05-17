<?php
/**
 * Template Name: Event Organize - About
 * Konten dapat diedit di: Appearance → Customize → Halaman About
 */
require get_stylesheet_directory() . '/header-ae.php';
$company = eo_company_name();
$city    = eo_brand( 'company_city', 'Yogyakarta' );
$year    = eo_brand( 'company_year', '2013' );
?>

<!-- HERO -->
<section class="ae-page-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> <span>/</span> <span>About</span></nav>
        <span class="ae-eyebrow"><?php echo esc_html( ae_mod( 'ae_about_hero_eyebrow', 'TENTANG PERUSAHAAN' ) ); ?></span>
        <h1><?php echo ae_nl2br( ae_mod( 'ae_about_hero_title', "Mitra Strategis Pameran & Event\ndi {$city} Sejak {$year}" ) ); ?></h1>
        <p><?php echo esc_html( ae_mod( 'ae_about_hero_subtitle', 'Lebih dari satu dekade memberikan solusi konstruksi pameran, booth, interior, dan event organizer untuk klien korporat di seluruh Indonesia.' ) ); ?></p>
    </div>
</section>

<!-- COMPANY OVERVIEW -->
<section class="ae-section">
    <div class="ae-container ae-about-intro">
        <div>
            <span class="ae-eyebrow ae-eyebrow-dark">PROFIL PERUSAHAAN</span>
            <h2><?php echo esc_html( ae_mod( 'ae_about_profile_title', 'Tentang ' . $company ) ); ?></h2>
            <p><?php echo wp_kses_post( ae_mod( 'ae_about_profile_p1' ) ); ?></p>
            <p><?php echo wp_kses_post( ae_mod( 'ae_about_profile_p2' ) ); ?></p>
            <p><?php echo wp_kses_post( ae_mod( 'ae_about_profile_p3' ) ); ?></p>
            <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>" class="ae-btn">Lihat Portfolio Kami</a>
        </div>
        <div class="ae-about-image">
            <img src="<?php echo esc_url( ae_mod( 'ae_about_profile_image', 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80' ) ); ?>" alt="Kantor <?php echo esc_attr( $company ); ?>">
            <div class="ae-image-badge">
                <strong><?php echo esc_html( ae_mod( 'ae_about_badge_number', '10+' ) ); ?></strong>
                <span><?php echo ae_nl2br( ae_mod( 'ae_about_badge_label', "Tahun\nPengalaman" ) ); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- VISION & MISSION -->
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">PRINSIP KAMI</span>
            <h2>Visi &amp; Misi Perusahaan</h2>
        </div>
        <div class="ae-vm-grid">
            <div class="ae-vm-card">
                <h3>Visi</h3>
                <p><?php echo esc_html( ae_mod( 'ae_about_visi' ) ); ?></p>
            </div>
            <div class="ae-vm-card">
                <h3>Misi</h3>
                <ul>
                    <?php for ( $i = 1; $i <= 4; $i++ ) :
                        $misi = ae_mod( "ae_about_misi_{$i}" );
                        if ( $misi ) : ?>
                            <li><?php echo esc_html( $misi ); ?></li>
                    <?php endif; endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- METHODOLOGY -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">PENDEKATAN KERJA</span>
            <h2>Metodologi Empat Tahap</h2>
            <p>Setiap proyek kami eksekusi melalui proses yang terstruktur untuk menjamin kualitas dan ketepatan waktu.</p>
        </div>
        <div class="ae-process-grid">
            <div class="ae-process-step">
                <div class="ae-process-num">01</div>
                <h3>Konsultasi &amp; Brief</h3>
                <p>Diskusi kebutuhan, target audiens, brand guideline, anggaran, dan timeline proyek bersama klien.</p>
            </div>
            <div class="ae-process-step">
                <div class="ae-process-num">02</div>
                <h3>Desain &amp; Perencanaan</h3>
                <p>Sketsa konsep, render 3D, denah teknis, RAB terperinci, dan revisi sesuai feedback klien.</p>
            </div>
            <div class="ae-process-step">
                <div class="ae-process-num">03</div>
                <h3>Produksi In-House</h3>
                <p>Workshop sendiri di Yogyakarta, kontrol kualitas tiap tahap, koordinasi material premium.</p>
            </div>
            <div class="ae-process-step">
                <div class="ae-process-num">04</div>
                <h3>Instalasi &amp; Eksekusi</h3>
                <p>Pemasangan tepat waktu di lokasi, supervisi on-site, hingga proses bongkar pasca event.</p>
            </div>
        </div>
    </div>
</section>

<!-- WHY US -->
<section class="ae-section ae-section-dark">
    <div class="ae-container ae-why-grid">
        <div class="ae-why-head">
            <span class="ae-eyebrow">KEUNGGULAN KAMI</span>
            <h2 style="color:#fff;">Mengapa Klien Memilih<br><?php echo esc_html( $company ); ?></h2>
            <p style="color:rgba(255,255,255,0.75);">Empat pilar yang menjadi alasan klien korporat mempercayakan proyek pameran dan event mereka kepada kami selama lebih dari satu dekade.</p>
        </div>
        <div class="ae-why-list">
            <div><strong>Ketepatan Waktu</strong><p>Tim in-house dengan kapasitas produksi terkontrol memastikan jadwal proyek terjaga dari brief hingga hari pelaksanaan.</p></div>
            <div><strong>Desain Tailor-Made</strong><p>Setiap booth dan event dirancang khusus sesuai identitas dan kebutuhan komunikasi brand klien.</p></div>
            <div><strong>Transparansi Anggaran</strong><p>RAB diuraikan terperinci di awal, tanpa biaya tambahan tersembunyi atau perubahan harga sepihak.</p></div>
            <div><strong>Layanan After-Sales</strong><p>Bongkar pasang, penyimpanan material, hingga revisi pasca event tetap menjadi tanggung jawab tim kami.</p></div>
        </div>
    </div>
</section>

<!-- LEADERSHIP / TEAM -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">TIM KAMI</span>
            <h2><?php echo esc_html( ae_mod( 'ae_about_team_title', 'Dipimpin oleh Profesional Berpengalaman' ) ); ?></h2>
            <p><?php echo esc_html( ae_mod( 'ae_about_team_subtitle', "Tim {$company} terdiri dari spesialis desain, produksi, dan manajemen proyek dengan rekam jejak di industri pameran." ) ); ?></p>
        </div>
        <div class="ae-team-grid">
            <?php for ( $i = 1; $i <= 4; $i++ ) :
                $name = ae_mod( "ae_about_team_{$i}_name" );
                $position = ae_mod( "ae_about_team_{$i}_position" );
                $photo = ae_mod( "ae_about_team_{$i}_photo" );
                if ( ! $name ) continue; ?>
                <div class="ae-team-card">
                    <div class="ae-team-photo" style="background-image:url('<?php echo esc_url( $photo ); ?>');"></div>
                    <div class="ae-team-info">
                        <h3><?php echo esc_html( $name ); ?></h3>
                        <span><?php echo esc_html( $position ); ?></span>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- CLIENT LOGOS -->
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">DIPERCAYA OLEH</span>
            <h2>Klien Korporat Kami</h2>
        </div>
        <div class="ae-client-strip">
            <div class="ae-client-item">CLIENT 01</div>
            <div class="ae-client-item">CLIENT 02</div>
            <div class="ae-client-item">CLIENT 03</div>
            <div class="ae-client-item">CLIENT 04</div>
            <div class="ae-client-item">CLIENT 05</div>
            <div class="ae-client-item">CLIENT 06</div>
        </div>
    </div>
</section>

<!-- LOCATION -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">LOKASI KANTOR</span>
            <h2>Kunjungi Workshop Kami</h2>
            <p><?php echo esc_html( ae_mod( 'ae_about_location_address', eo_brand( 'address_full' ) ) ); ?></p>
        </div>
        <div class="ae-map">
            <iframe src="<?php echo esc_url( eo_map_embed_url() ); ?>" width="100%" height="400" style="border:0;border-radius:4px;" loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Diskusikan Proyek Anda dengan Kami</h2>
        <p>Tim kami siap membantu menyusun konsep, desain, dan anggaran dalam 1×24 jam.</p>
        <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank" class="ae-btn ae-btn-lg">Hubungi Sekarang</a>
    </div>
</section>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
