<?php
/**
 * SEO Helper untuk Event Organize.
 * - Inject Open Graph + Twitter Card tags (fallback kalau tidak ada plugin SEO)
 * - Detect plugin SEO populer & step aside untuk hindari duplikat
 * - Tambah Customizer field untuk OG default image
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Cek apakah ada plugin SEO yang aktif.
 * Kalau ada, theme tidak inject meta — biarkan plugin yang handle.
 */
function eo_seo_plugin_active() {
    return defined( 'WPSEO_VERSION' )       // Yoast SEO
        || defined( 'RANK_MATH_VERSION' )   // Rank Math
        || defined( 'AIOSEO_VERSION' )      // All in One SEO
        || class_exists( 'SEOPress' );      // SEOPress
}

/**
 * Customizer field — Default OG Image (fallback social sharing image).
 */
add_action( 'customize_register', function ( $wp_customize ) {
    $wp_customize->add_section( 'eo_seo_section', array(
        'title'       => 'SEO & Social',
        'panel'       => 'eo_brand_panel',
        'priority'    => 60,
        'description' => 'Pengaturan SEO basic. Untuk fitur lengkap, install plugin Rank Math atau Yoast SEO.',
    ) );

    $wp_customize->add_setting( 'eo_seo_og_image', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'eo_seo_og_image', array(
            'label'       => 'Default Social Sharing Image',
            'description' => 'Gambar yang muncul saat link website di-share di WhatsApp/Facebook/LinkedIn. Rekomendasi: 1200×630px, format JPG/PNG.',
            'section'     => 'eo_seo_section',
        )
    ) );

    $wp_customize->add_setting( 'eo_seo_default_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'eo_seo_default_description', array(
        'label'       => 'Default Meta Description',
        'description' => 'Deskripsi singkat website (max 160 karakter). Muncul di hasil Google search.',
        'section'     => 'eo_seo_section',
        'type'        => 'textarea',
    ) );

    $wp_customize->add_setting( 'eo_seo_google_verify', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'eo_seo_google_verify', array(
        'label'       => 'Google Search Console — Verification Code',
        'description' => 'Hanya kode-nya saja (mis: AbCdEf123). Bukan tag HTML penuh. Dari Search Console > Settings > Ownership verification > HTML tag method.',
        'section'     => 'eo_seo_section',
        'type'        => 'text',
    ) );
}, 70 );

/**
 * Inject meta tags ke <head>.
 * Hanya jalan kalau TIDAK ada plugin SEO aktif (untuk hindari duplikat).
 */
add_action( 'wp_head', function () {
    if ( eo_seo_plugin_active() ) {
        return; // Plugin SEO akan handle semua meta
    }

    $title       = '';
    $description = '';
    $image       = get_theme_mod( 'eo_seo_og_image' );
    $url         = '';
    $type        = 'website';
    $site_name   = eo_company_name();

    if ( is_singular() ) {
        global $post;
        $title       = get_the_title();
        $description = wp_strip_all_tags( get_the_excerpt() );
        if ( ! $description ) {
            $description = wp_trim_words( wp_strip_all_tags( $post->post_content ), 30 );
        }
        $url  = get_permalink();
        $type = 'article';
        if ( has_post_thumbnail() ) {
            $image = get_the_post_thumbnail_url( null, 'large' );
        }
    } elseif ( is_home() || is_front_page() ) {
        $title       = get_bloginfo( 'name' );
        $description = get_theme_mod( 'eo_seo_default_description', '' );
        if ( ! $description ) {
            $description = eo_brand( 'company_about_short' );
        }
        $url = home_url( '/' );
    } else {
        $title       = wp_title( '', false );
        $description = get_theme_mod( 'eo_seo_default_description', '' );
        $url         = home_url( $_SERVER['REQUEST_URI'] ?? '/' );
    }

    $description = trim( wp_strip_all_tags( $description ) );
    if ( strlen( $description ) > 160 ) {
        $description = mb_substr( $description, 0, 157 ) . '...';
    }

    ?>

    <!-- Open Graph (auto by Event Organize theme) -->
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:type" content="<?php echo esc_attr( $type ); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <?php if ( $image ) : ?>
        <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    <?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="<?php echo $image ? 'summary_large_image' : 'summary'; ?>">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <?php if ( $image ) : ?>
        <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
    <?php endif; ?>

    <!-- Standard meta description -->
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">

    <?php
}, 1 );

/**
 * Google Search Console verification.
 * Tetap inject meskipun ada plugin SEO (karena beberapa user prefer set di theme).
 */
add_action( 'wp_head', function () {
    $code = get_theme_mod( 'eo_seo_google_verify' );
    if ( $code ) {
        echo '<meta name="google-site-verification" content="' . esc_attr( $code ) . '">' . "\n";
    }
}, 2 );

/**
 * Tambah notice di wp-admin kalau belum install plugin SEO.
 */
add_action( 'admin_notices', function () {
    if ( eo_seo_plugin_active() ) { return; }
    if ( ! current_user_can( 'install_plugins' ) ) { return; }
    $screen = get_current_screen();
    if ( ! $screen || ! in_array( $screen->id, array( 'dashboard', 'themes' ), true ) ) { return; }
    ?>
    <div class="notice notice-info is-dismissible">
        <p><strong>Event Organize Theme</strong> — Untuk SEO yang optimal, install plugin <strong>Rank Math SEO</strong> atau <strong>Yoast SEO</strong>.
        <a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=rank+math+seo&tab=search&type=term' ) ); ?>" class="button button-small" style="margin-left:8px;">Install Rank Math</a></p>
    </div>
    <?php
} );

/**
 * Title tag override — pastikan title tag selalu ada (kalau tidak ada plugin SEO).
 */
add_theme_support( 'title-tag' );
