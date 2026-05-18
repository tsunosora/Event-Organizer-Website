<?php
/**
 * Template Name: Event Organize - Portfolio
 */
require get_stylesheet_directory() . '/header-ae.php';
$city = eo_brand( 'company_city', 'Yogyakarta' );
?>

<!-- HERO (editable di Customize → Halaman Portfolio → Hero Portfolio) -->
<section class="ae-page-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> <span>/</span> <span>Portfolio</span></nav>
        <span class="ae-eyebrow"><?php echo esc_html( get_theme_mod( 'eo_pf_hero_eyebrow', 'PORTFOLIO PROYEK' ) ); ?></span>
        <h1><?php echo eo_nl2br( get_theme_mod( 'eo_pf_hero_title', "Rekam Jejak Pameran, Booth,\nInterior & Event di {$city}" ) ); ?></h1>
        <p><?php echo esc_html( get_theme_mod( 'eo_pf_hero_subtitle', "Lebih dari " . eo_brand('stat_projects', '200+') . " proyek telah kami eksekusi untuk klien korporat di {$city}." ) ); ?></p>
    </div>
</section>

<!-- STATS BAR -->
<section class="ae-portfolio-stats">
    <div class="ae-container ae-portfolio-stats-grid">
        <div><strong><?php echo esc_html( eo_brand('stat_projects', '200+') ); ?></strong><span>Proyek Selesai</span></div>
        <div><strong><?php echo esc_html( eo_brand('stat_clients', '150+') ); ?></strong><span>Klien Korporat</span></div>
        <div><strong><?php echo esc_html( eo_brand('stat_cities', '25+') ); ?></strong><span>Kota Terjangkau</span></div>
        <div><strong><?php echo esc_html( eo_brand('stat_years', '10+') ); ?></strong><span>Tahun Pengalaman</span></div>
    </div>
</section>

<!-- FEATURED PROJECT (dari CPT Portofolio yang ditandai Featured) -->
<?php
$featured = eo_get_featured_project();
if ( $featured ) :
    $f_id       = $featured->ID;
    $f_title    = $featured->post_title;
    $f_client   = get_post_meta( $f_id, '_eo_project_client', true );
    $f_location = get_post_meta( $f_id, '_eo_project_location', true );
    $f_year     = get_post_meta( $f_id, '_eo_project_year', true );
    $f_category = eo_project_main_cat_name( $f_id );
    $f_image    = get_the_post_thumbnail_url( $f_id, 'large' );
    $f_desc     = wpautop( $featured->post_content );
    $f_points   = array_filter( array(
        get_post_meta( $f_id, '_eo_project_point_1', true ),
        get_post_meta( $f_id, '_eo_project_point_2', true ),
        get_post_meta( $f_id, '_eo_project_point_3', true ),
        get_post_meta( $f_id, '_eo_project_point_4', true ),
    ) );
?>
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">PROYEK UNGGULAN</span>
            <h2><?php echo esc_html( $f_title ); ?></h2>
        </div>
        <div class="ae-featured-grid">
            <div class="ae-featured-image">
                <?php if ( $f_image ) : ?>
                    <img src="<?php echo esc_url( $f_image ); ?>" alt="<?php echo esc_attr( $f_title ); ?>">
                <?php endif; ?>
            </div>
            <div class="ae-featured-info">
                <div class="ae-featured-meta">
                    <?php if ( $f_client ) : ?><div><span class="ae-meta-label">Klien</span><strong><?php echo esc_html( $f_client ); ?></strong></div><?php endif; ?>
                    <?php if ( $f_location ) : ?><div><span class="ae-meta-label">Lokasi</span><strong><?php echo esc_html( $f_location ); ?></strong></div><?php endif; ?>
                    <?php if ( $f_year ) : ?><div><span class="ae-meta-label">Tahun</span><strong><?php echo esc_html( $f_year ); ?></strong></div><?php endif; ?>
                    <?php if ( $f_category ) : ?><div><span class="ae-meta-label">Kategori</span><strong><?php echo esc_html( $f_category ); ?></strong></div><?php endif; ?>
                </div>
                <?php if ( $f_desc ) echo $f_desc; ?>
                <?php if ( $f_points ) : ?>
                <ul class="ae-featured-points">
                    <?php foreach ( $f_points as $point ) : ?>
                        <li><?php echo esc_html( $point ); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- FILTER & GRID — Loop dari CPT 'project' (wp-admin → Portofolio) -->
<?php
$projects = eo_get_projects( 24, true );
$categories = eo_project_used_categories();
if ( $projects ) :
?>
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">SEMUA PROYEK</span>
            <h2>Telusuri Berdasarkan Kategori</h2>
        </div>

        <div class="ae-portfolio-filter">
            <button data-filter="all" class="is-active">Semua Proyek</button>
            <?php foreach ( $categories as $cat ) : ?>
                <button data-filter="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="ae-portfolio-grid ae-portfolio-grid-lg">
            <?php foreach ( $projects as $project ) :
                $p_id    = $project->ID;
                $cat     = eo_project_main_cat_slug( $p_id );
                $cat_name= eo_project_main_cat_name( $p_id );
                $image   = get_the_post_thumbnail_url( $p_id, 'medium_large' );
                $client  = get_post_meta( $p_id, '_eo_project_client', true );
                $year    = get_post_meta( $p_id, '_eo_project_year', true );
                $location= get_post_meta( $p_id, '_eo_project_location', true );
            ?>
                <a href="<?php echo esc_url( get_permalink( $p_id ) ); ?>" class="ae-portfolio-card" data-cat="<?php echo esc_attr( $cat ); ?>">
                    <div class="ae-portfolio-img">
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $project->post_title ); ?>">
                        <?php else : ?>
                            <img src="https://placehold.co/600x450/eee/999?text=No+Image" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="ae-portfolio-meta">
                        <?php if ( $cat_name ) : ?><span class="ae-tag"><?php echo esc_html( $cat_name ); ?></span><?php endif; ?>
                        <h3><?php echo esc_html( $project->post_title ); ?></h3>
                        <small>
                            <?php
                            $parts = array_filter( array( $client, $year, $location ) );
                            echo esc_html( implode( ' · ', $parts ) );
                            ?>
                        </small>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php else : ?>
<!-- Placeholder kalau belum ada proyek -->
<section class="ae-section ae-section-gray">
    <div class="ae-container" style="text-align:center;padding:40px 24px;">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">PORTFOLIO KOSONG</span>
            <h2>Belum Ada Proyek Ditampilkan</h2>
            <p>Tambahkan proyek pertama di wp-admin &rarr; <strong>Portofolio &rarr; Tambah Proyek Baru</strong></p>
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                <p style="margin-top:24px;">
                    <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>" class="ae-btn">+ Tambah Proyek</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- PROCESS / EXECUTION QUALITY -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">STANDAR EKSEKUSI</span>
            <h2>Kualitas yang Konsisten<br>di Setiap Proyek</h2>
            <p>Setiap proyek di portfolio kami melewati standar mutu yang sama, terlepas dari skala dan anggaran.</p>
        </div>
        <div class="ae-quality-grid">
            <div class="ae-quality-card">
                <div class="ae-quality-num">01</div>
                <h3>Material Premium</h3>
                <p>Multipleks finishing, akrilik, panel HPL, dan komponen elektrik berstandar industri.</p>
            </div>
            <div class="ae-quality-card">
                <div class="ae-quality-num">02</div>
                <h3>Workshop In-House</h3>
                <p>Produksi di workshop sendiri, dipantau langsung oleh tim quality control kami.</p>
            </div>
            <div class="ae-quality-card">
                <div class="ae-quality-num">03</div>
                <h3>Tim Tersertifikasi</h3>
                <p>Tukang, instalasi, dan elektrik dengan pengalaman minimal 5 tahun di industri pameran.</p>
            </div>
            <div class="ae-quality-card">
                <div class="ae-quality-num">04</div>
                <h3>Garansi Pekerjaan</h3>
                <p>Setiap booth dan instalasi dijamin selama event berlangsung — kerusakan kami tangani gratis.</p>
            </div>
        </div>
    </div>
</section>

<!-- CLIENT TESTIMONIAL -->
<section class="ae-section ae-section-dark">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow">TESTIMONI KLIEN</span>
            <h2 style="color:#fff;">Kepercayaan yang Membangun<br>Kemitraan Jangka Panjang</h2>
        </div>
        <div class="ae-testimonials">
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Salah satu pelayanan jasa terbaik. Tim profesional, hasil booth memuaskan, deadline tepat waktu."</p>
                <strong>— Miftha Busree</strong>
                <small style="color:rgba(255,255,255,0.5);font-size:12px;">Klien Korporat</small>
            </div>
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Service sangat bagus, komunikasi lancar, deadline tepat. Pasti pakai lagi untuk event berikutnya."</p>
                <strong>— Hetti Probohening</strong>
                <small style="color:rgba(255,255,255,0.5);font-size:12px;">Chiara Bedding</small>
            </div>
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Desain booth-nya mencuri perhatian pengunjung. Brand kami jadi yang paling ramai dikunjungi di pameran."</p>
                <strong>— Klien Korporat</strong>
                <small style="color:rgba(255,255,255,0.5);font-size:12px;">Brand FMCG Nasional</small>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Tertarik dengan Hasil Kerja Kami?</h2>
        <p>Diskusikan kebutuhan proyek pameran, booth, interior, atau event Anda — gratis dan tanpa komitmen.</p>
        <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank" class="ae-btn ae-btn-lg">Mulai Konsultasi</a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btns = document.querySelectorAll('.ae-portfolio-filter button');
    var cards = document.querySelectorAll('.ae-portfolio-grid .ae-portfolio-card');
    btns.forEach(function(btn){
        btn.addEventListener('click', function(){
            btns.forEach(function(b){ b.classList.remove('is-active'); });
            btn.classList.add('is-active');
            var f = btn.getAttribute('data-filter');
            cards.forEach(function(c){
                c.style.display = (f === 'all' || c.getAttribute('data-cat') === f) ? '' : 'none';
            });
        });
    });
});
</script>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
