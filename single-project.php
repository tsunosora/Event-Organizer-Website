<?php
/**
 * Detail halaman Proyek (CPT 'project').
 */
require get_stylesheet_directory() . '/header-ae.php';
the_post();
$p_id     = get_the_ID();
$client   = get_post_meta( $p_id, '_eo_project_client', true );
$year     = get_post_meta( $p_id, '_eo_project_year', true );
$location = get_post_meta( $p_id, '_eo_project_location', true );
$cat_name = eo_project_main_cat_name( $p_id );
$points   = array_filter( array(
    get_post_meta( $p_id, '_eo_project_point_1', true ),
    get_post_meta( $p_id, '_eo_project_point_2', true ),
    get_post_meta( $p_id, '_eo_project_point_3', true ),
    get_post_meta( $p_id, '_eo_project_point_4', true ),
) );
?>

<!-- HERO POST -->
<section class="ae-post-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb">
            <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>">Portfolio</a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </nav>
        <?php if ( $cat_name ) : ?>
            <span class="ae-eyebrow"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <div class="ae-post-meta-hero">
            <?php if ( $client ) : ?><span><?php echo esc_html( $client ); ?></span><?php endif; ?>
            <?php if ( $year ) : ?><span class="ae-meta-sep">·</span><span><?php echo esc_html( $year ); ?></span><?php endif; ?>
            <?php if ( $location ) : ?><span class="ae-meta-sep">·</span><span><?php echo esc_html( $location ); ?></span><?php endif; ?>
        </div>
    </div>
</section>

<!-- FEATURED IMAGE -->
<?php if ( has_post_thumbnail() ) : ?>
<section class="ae-post-featured-image">
    <div class="ae-container-narrow">
        <?php the_post_thumbnail( 'large' ); ?>
    </div>
</section>
<?php endif; ?>

<!-- CONTENT -->
<article class="ae-section">
    <div class="ae-container-narrow">
        <div class="ae-post-content">
            <?php the_content(); ?>
        </div>

        <?php if ( $points ) : ?>
            <h3 style="margin-top:40px;">Highlight Proyek</h3>
            <ul class="ae-featured-points">
                <?php foreach ( $points as $p ) : ?>
                    <li><?php echo esc_html( $p ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- META DETAILS -->
        <div class="ae-author-box" style="margin-top:40px;">
            <div class="ae-author-info" style="width:100%;">
                <strong>Detail Proyek</strong>
                <table style="margin-top:12px;width:100%;border-collapse:collapse;">
                    <?php if ( $client ) : ?>
                        <tr><td style="padding:8px 0;color:#6B6B6B;width:140px;">Klien</td><td style="padding:8px 0;"><strong><?php echo esc_html( $client ); ?></strong></td></tr>
                    <?php endif; ?>
                    <?php if ( $year ) : ?>
                        <tr><td style="padding:8px 0;color:#6B6B6B;">Tahun</td><td style="padding:8px 0;"><strong><?php echo esc_html( $year ); ?></strong></td></tr>
                    <?php endif; ?>
                    <?php if ( $location ) : ?>
                        <tr><td style="padding:8px 0;color:#6B6B6B;">Lokasi</td><td style="padding:8px 0;"><strong><?php echo esc_html( $location ); ?></strong></td></tr>
                    <?php endif; ?>
                    <?php if ( $cat_name ) : ?>
                        <tr><td style="padding:8px 0;color:#6B6B6B;">Kategori</td><td style="padding:8px 0;"><strong><?php echo esc_html( $cat_name ); ?></strong></td></tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</article>

<!-- RELATED PROJECTS -->
<?php
$related = get_posts( array(
    'post_type'     => 'project',
    'numberposts'   => 3,
    'post__not_in'  => array( $p_id ),
    'orderby'       => 'rand',
) );
if ( $related ) : ?>
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">PROYEK LAINNYA</span>
            <h2>Lihat Proyek Serupa</h2>
        </div>
        <div class="ae-portfolio-grid ae-portfolio-grid-lg">
            <?php foreach ( $related as $r ) :
                $r_image = get_the_post_thumbnail_url( $r->ID, 'medium_large' );
                $r_cat   = eo_project_main_cat_name( $r->ID );
            ?>
                <a href="<?php echo esc_url( get_permalink( $r->ID ) ); ?>" class="ae-portfolio-card">
                    <div class="ae-portfolio-img">
                        <img src="<?php echo esc_url( $r_image ?: 'https://placehold.co/600x450/eee/999?text=No+Image' ); ?>" alt="">
                    </div>
                    <div class="ae-portfolio-meta">
                        <?php if ( $r_cat ) : ?><span class="ae-tag"><?php echo esc_html( $r_cat ); ?></span><?php endif; ?>
                        <h3><?php echo esc_html( $r->post_title ); ?></h3>
                        <small><?php echo esc_html( eo_project_meta_inline( $r->ID ) ); ?></small>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Tertarik dengan Proyek Serupa?</h2>
        <p>Diskusikan kebutuhan booth, pameran, atau event Anda dengan tim kami.</p>
        <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank" class="ae-btn ae-btn-lg">Mulai Konsultasi</a>
    </div>
</section>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
