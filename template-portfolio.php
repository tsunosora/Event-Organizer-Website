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

<!-- FEATURED PROJECT (editable di Customize → Halaman Portfolio → Featured Project) -->
<?php
$f_title    = get_theme_mod( 'eo_pf_featured_title', 'Booth Pameran Otomotif Nasional' );
$f_client   = get_theme_mod( 'eo_pf_featured_client', 'PT Otomotif Nasional' );
$f_location = get_theme_mod( 'eo_pf_featured_location', 'JEC Yogyakarta' );
$f_year     = get_theme_mod( 'eo_pf_featured_year', '2025' );
$f_category = get_theme_mod( 'eo_pf_featured_category', 'booth' );
$f_image    = get_theme_mod( 'eo_pf_featured_image', 'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=1200&q=80' );
$f_desc     = get_theme_mod( 'eo_pf_featured_desc', '' );
$f_points   = array_filter( array(
    get_theme_mod( 'eo_pf_featured_point_1' ),
    get_theme_mod( 'eo_pf_featured_point_2' ),
    get_theme_mod( 'eo_pf_featured_point_3' ),
    get_theme_mod( 'eo_pf_featured_point_4' ),
) );
?>
<?php if ( $f_title ) : ?>
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">PROYEK UNGGULAN</span>
            <h2><?php echo esc_html( $f_title ); ?></h2>
        </div>
        <div class="ae-featured-grid">
            <div class="ae-featured-image">
                <img src="<?php echo esc_url( $f_image ); ?>" alt="<?php echo esc_attr( $f_title ); ?>">
            </div>
            <div class="ae-featured-info">
                <div class="ae-featured-meta">
                    <div><span class="ae-meta-label">Klien</span><strong><?php echo esc_html( $f_client ); ?></strong></div>
                    <div><span class="ae-meta-label">Lokasi</span><strong><?php echo esc_html( $f_location ); ?></strong></div>
                    <div><span class="ae-meta-label">Tahun</span><strong><?php echo esc_html( $f_year ); ?></strong></div>
                    <div><span class="ae-meta-label">Kategori</span><strong><?php echo esc_html( eo_pf_category_label( $f_category ) ); ?></strong></div>
                </div>
                <?php if ( $f_desc ) : ?><p><?php echo esc_html( $f_desc ); ?></p><?php endif; ?>
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

<!-- FILTER & GRID -->
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">SEMUA PROYEK</span>
            <h2>Telusuri Berdasarkan Kategori</h2>
        </div>

        <div class="ae-portfolio-filter">
            <button data-filter="all" class="is-active">Semua Proyek</button>
            <button data-filter="booth">Booth Pameran</button>
            <button data-filter="pameran">Konstruksi Pameran</button>
            <button data-filter="interior">Interior Desain</button>
            <button data-filter="event">Event Organizer</button>
        </div>

        <div class="ae-portfolio-grid ae-portfolio-grid-lg">
            <?php
            $items_count = max( 0, min( 12, (int) get_theme_mod( 'eo_pf_items_count', 12 ) ) );
            for ( $i = 1; $i <= $items_count; $i++ ) :
                $cat      = get_theme_mod( "eo_pf_item_{$i}_category", 'booth' );
                $title    = get_theme_mod( "eo_pf_item_{$i}_title" );
                $client   = get_theme_mod( "eo_pf_item_{$i}_client" );
                $year     = get_theme_mod( "eo_pf_item_{$i}_year" );
                $location = get_theme_mod( "eo_pf_item_{$i}_location" );
                $image    = get_theme_mod( "eo_pf_item_{$i}_image" );
                if ( ! $title || ! $image ) continue;
            ?>
                <div class="ae-portfolio-card" data-cat="<?php echo esc_attr( $cat ); ?>">
                    <div class="ae-portfolio-img"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>"></div>
                    <div class="ae-portfolio-meta">
                        <span class="ae-tag"><?php echo esc_html( eo_pf_category_label( $cat ) ); ?></span>
                        <h3><?php echo esc_html( $title ); ?></h3>
                        <small>
                            <?php echo esc_html( $client ); ?><?php echo $year ? ' &middot; ' . esc_html( $year ) : ''; ?>
                            <?php if ( $location ) echo ' &middot; ' . esc_html( $location ); ?>
                        </small>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

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
