<?php
/**
 * Single post template — detail artikel.
 */
require get_stylesheet_directory() . '/header-ae.php';
the_post();
$company = eo_company_name();
?>

<!-- HERO POST -->
<section class="ae-post-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb">
            <a href="<?php echo esc_url( home_url('/') ); ?>">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </nav>
        <?php
        $cats = get_the_category();
        if ( $cats ) {
            echo '<span class="ae-eyebrow">' . esc_html( $cats[0]->name ) . '</span>';
        } else {
            echo '<span class="ae-eyebrow">INSIGHT</span>';
        }
        ?>
        <h1><?php the_title(); ?></h1>
        <div class="ae-post-meta-hero">
            <span><?php echo get_the_date( 'd F Y' ); ?></span>
            <span class="ae-meta-sep">·</span>
            <span><?php echo esc_html( get_the_author() ); ?></span>
            <span class="ae-meta-sep">·</span>
            <span><?php echo (int) ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ); ?> menit baca</span>
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

<!-- ARTICLE CONTENT -->
<article class="ae-section">
    <div class="ae-container-narrow">
        <div class="ae-post-content">
            <?php the_content(); ?>
        </div>

        <!-- TAGS -->
        <?php $tags = get_the_tags(); if ( $tags ) : ?>
        <div class="ae-post-tags">
            <strong>Tag:</strong>
            <?php foreach ( $tags as $tag ) : ?>
                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- AUTHOR BOX -->
        <div class="ae-author-box">
            <div class="ae-author-avatar">
                <?php echo get_avatar( get_the_author_meta('ID'), 64 ); ?>
            </div>
            <div class="ae-author-info">
                <strong><?php echo esc_html( get_the_author() ); ?></strong>
                <span>Tim <?php echo esc_html( $company ); ?></span>
                <p>Penulis di <?php echo esc_html( $company ); ?> &mdash; kontraktor pameran &amp; event organizer profesional. Berbagi insight industri pameran dan booth display.</p>
            </div>
        </div>
    </div>
</article>

<!-- RELATED POSTS -->
<?php
$related = get_posts( array(
    'numberposts' => 3,
    'post__not_in' => array( get_the_ID() ),
    'orderby' => 'rand',
) );
if ( $related ) : ?>
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">ARTIKEL TERKAIT</span>
            <h2>Lanjutkan Membaca</h2>
        </div>
        <div class="ae-blog-grid ae-blog-grid-lg">
            <?php foreach ( $related as $r ) : ?>
                <article class="ae-blog-card">
                    <a href="<?php echo esc_url( get_permalink( $r ) ); ?>" class="ae-blog-card-img">
                        <?php if ( has_post_thumbnail( $r ) ) {
                            echo get_the_post_thumbnail( $r, 'medium_large' );
                        } else { ?>
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&q=80" alt="">
                        <?php } ?>
                    </a>
                    <div class="ae-blog-body">
                        <div class="ae-post-meta">
                            <?php $rcats = get_the_category( $r->ID ); ?>
                            <span class="ae-tag-text"><?php echo $rcats ? esc_html( $rcats[0]->name ) : 'Insight'; ?></span>
                            <span class="ae-post-date"><?php echo get_the_date( 'd M Y', $r ); ?></span>
                        </div>
                        <h3><a href="<?php echo esc_url( get_permalink( $r ) ); ?>"><?php echo esc_html( $r->post_title ); ?></a></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Punya Proyek Pameran atau Event?</h2>
        <p>Tim kami siap membantu menyusun konsep dan anggaran sesuai kebutuhan brand Anda.</p>
        <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank" class="ae-btn ae-btn-lg">Konsultasi Gratis</a>
    </div>
</section>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
