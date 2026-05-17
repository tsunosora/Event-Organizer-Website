<?php
/**
 * Blog index — Posts page Abadi Event.
 * WordPress otomatis pakai file ini ketika "Posts page" di-set.
 */
require get_stylesheet_directory() . '/header-ae.php';
?>

<!-- HERO -->
<section class="ae-page-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> <span>/</span> <span>Blog</span></nav>
        <span class="ae-eyebrow">INSIGHT &amp; ARTIKEL</span>
        <h1>Wawasan Industri Pameran<br>&amp; Event di Yogyakarta</h1>
        <p>Tips, panduan, dan tren terbaru seputar konstruksi pameran, booth, interior komersial, dan event organizer dari tim Abadi Event.</p>
    </div>
</section>

<?php
$posts = get_posts( array( 'numberposts' => 9, 'post_status' => 'publish' ) );

if ( ! empty( $posts ) ) :
    $featured = array_shift( $posts ); // Ambil post pertama sebagai featured
?>

<!-- FEATURED POST -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">ARTIKEL UNGGULAN</span>
        </div>
        <a href="<?php echo esc_url( get_permalink( $featured ) ); ?>" class="ae-featured-post">
            <div class="ae-featured-post-img">
                <?php if ( has_post_thumbnail( $featured ) ) {
                    echo get_the_post_thumbnail( $featured, 'large' );
                } else { ?>
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=1200&q=80" alt="">
                <?php } ?>
            </div>
            <div class="ae-featured-post-body">
                <div class="ae-post-meta">
                    <?php
                    $cats = get_the_category( $featured->ID );
                    if ( $cats && ! is_wp_error( $cats ) ) {
                        echo '<span class="ae-tag">' . esc_html( $cats[0]->name ) . '</span>';
                    } else {
                        echo '<span class="ae-tag">Insight</span>';
                    }
                    ?>
                    <span class="ae-post-date"><?php echo get_the_date( 'd M Y', $featured ); ?></span>
                </div>
                <h2><?php echo esc_html( $featured->post_title ); ?></h2>
                <p><?php echo esc_html( wp_trim_words( $featured->post_excerpt ?: $featured->post_content, 30 ) ); ?></p>
                <span class="ae-read-more">Baca Selengkapnya →</span>
            </div>
        </a>
    </div>
</section>

<!-- POSTS GRID -->
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">SEMUA ARTIKEL</span>
            <h2>Artikel Terbaru</h2>
        </div>
        <div class="ae-blog-grid ae-blog-grid-lg">
            <?php foreach ( $posts as $p ) : setup_postdata( $p ); ?>
                <article class="ae-blog-card">
                    <a href="<?php echo esc_url( get_permalink( $p ) ); ?>" class="ae-blog-card-img">
                        <?php if ( has_post_thumbnail( $p ) ) {
                            echo get_the_post_thumbnail( $p, 'medium_large' );
                        } else { ?>
                            <img src="https://images.unsplash.com/photo-<?php echo array(1505373877841, 1540575467063, 1556761175, 1505373877841)[ array_rand([0,1,2,3]) ]; ?>?w=600&q=80" alt="">
                        <?php } ?>
                    </a>
                    <div class="ae-blog-body">
                        <div class="ae-post-meta">
                            <?php
                            $cats = get_the_category( $p->ID );
                            if ( $cats && ! is_wp_error( $cats ) ) {
                                echo '<span class="ae-tag-text">' . esc_html( $cats[0]->name ) . '</span>';
                            } else {
                                echo '<span class="ae-tag-text">Insight</span>';
                            }
                            ?>
                            <span class="ae-post-date"><?php echo get_the_date( 'd M Y', $p ); ?></span>
                        </div>
                        <h3><a href="<?php echo esc_url( get_permalink( $p ) ); ?>"><?php echo esc_html( $p->post_title ); ?></a></h3>
                        <p><?php echo esc_html( wp_trim_words( $p->post_excerpt ?: $p->post_content, 18 ) ); ?></p>
                    </div>
                </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>

        <?php
        // Pagination link sederhana
        the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => '← Sebelumnya',
            'next_text' => 'Berikutnya →',
            'class'     => 'ae-pagination',
        ) );
        ?>
    </div>
</section>

<?php else : // Belum ada post — tampilkan placeholder ?>

<!-- PLACEHOLDER (belum ada post) -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">RENCANA TOPIK</span>
            <h2>Artikel yang Akan Datang</h2>
            <p>Tim kami sedang menyiapkan artikel-artikel berikut untuk Anda.</p>
        </div>
        <div class="ae-blog-grid ae-blog-grid-lg">
            <?php
            $dummies = array(
                array('Tips Memilih Kontraktor Booth Pameran di Yogyakarta', 'Panduan',           'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&q=80'),
                array('Checklist Persiapan Pameran Dagang B2B Skala Nasional', 'Tips Pameran',    'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80'),
                array('5 Inspirasi Desain Booth yang Mencuri Perhatian Pengunjung', 'Inspirasi',  'https://images.unsplash.com/photo-1531058020387-3be344556be6?w=800&q=80'),
                array('Berapa Biaya Sewa Kontraktor Pameran di Jogja? Panduan 2026', 'Insight',   'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&q=80'),
                array('Perbedaan Booth Standard, Custom, dan Modular', 'Edukasi',                  'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=800&q=80'),
                array('Panduan Memilih Lokasi Pameran di DIY untuk Brand Korporat', 'Panduan',     'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&q=80'),
            );
            foreach ( $dummies as $d ) : ?>
                <article class="ae-blog-card">
                    <div class="ae-blog-card-img">
                        <img src="<?php echo esc_url($d[2]); ?>" alt="">
                    </div>
                    <div class="ae-blog-body">
                        <div class="ae-post-meta">
                            <span class="ae-tag-text"><?php echo esc_html($d[1]); ?></span>
                            <span class="ae-post-date">Segera Hadir</span>
                        </div>
                        <h3><?php echo esc_html($d[0]); ?></h3>
                        <p>Artikel ini sedang disiapkan oleh tim editorial kami. Hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php endif; ?>

<!-- NEWSLETTER / CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <span class="ae-eyebrow" style="color:var(--ae-red);">DAPATKAN INSIGHT TERBARU</span>
        <h2>Diskusikan Proyek Pameran Anda Bersama Kami</h2>
        <p>Konsultasi gratis dengan tim Abadi Event — kami siap menyusun proposal &amp; RAB dalam 1×24 jam.</p>
        <a href="https://wa.me/6281227447888" target="_blank" class="ae-btn ae-btn-lg">Hubungi Tim Kami</a>
    </div>
</section>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
