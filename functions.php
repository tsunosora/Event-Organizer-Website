<?php
/**
 * Event Organize - Child theme functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// Customizer modules
require_once get_stylesheet_directory() . '/inc/customizer-brand.php';
require_once get_stylesheet_directory() . '/inc/customizer-about.php';

/**
 * Enqueue parent + child styles, plus Google Fonts.
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-parent',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'event-organize-child',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-parent' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
    wp_enqueue_style(
        'event-organize-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap',
        array(),
        null
    );
} );

/**
 * Register CPT "project" + taxonomy "project_category".
 */
add_action( 'init', function () {
    register_post_type( 'project', array(
        'labels' => array(
            'name'          => 'Portofolio',
            'singular_name' => 'Proyek',
            'add_new_item'  => 'Tambah Proyek Baru',
            'edit_item'     => 'Edit Proyek',
            'menu_name'     => 'Portofolio',
        ),
        'public'      => true,
        'has_archive' => 'portofolio',
        'rewrite'     => array( 'slug' => 'portofolio' ),
        'menu_icon'   => 'dashicons-portfolio',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'=> true,
    ) );

    register_taxonomy( 'project_category', 'project', array(
        'labels' => array(
            'name'          => 'Kategori Proyek',
            'singular_name' => 'Kategori',
        ),
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'kategori-proyek' ),
        'show_in_rest' => true,
    ) );
} );

/**
 * Auto-apply page templates based on slug.
 */
add_filter( 'template_include', function ( $template ) {
    if ( ! is_page() ) { return $template; }
    $slug = get_post_field( 'post_name', get_queried_object_id() );
    $map = array(
        'home'      => 'template-home.php',
        'about'     => 'template-about.php',
        'portfolio' => 'template-portfolio.php',
        'contact'   => 'template-contact.php',
    );
    if ( isset( $map[ $slug ] ) ) {
        $custom = get_stylesheet_directory() . '/' . $map[ $slug ];
        if ( file_exists( $custom ) ) { return $custom; }
    }
    return $template;
}, 99 );

/**
 * Helper: cek apakah halaman saat ini pakai template kustom kita.
 */
function eo_is_custom_page() {
    if ( is_home() || is_single() || is_archive() ) { return true; }
    if ( ! is_page() ) { return false; }
    $slug = get_post_field( 'post_name', get_queried_object_id() );
    return in_array( $slug, array( 'home', 'about', 'portfolio', 'contact' ), true );
}
// Backwards-compat alias
function ae_is_custom_page() { return eo_is_custom_page(); }

/**
 * Dequeue Astra styles, scripts, & inline output pada custom pages.
 */
add_action( 'wp_enqueue_scripts', function () {
    if ( ! eo_is_custom_page() ) { return; }
    wp_dequeue_style( 'astra-theme-css' );
    wp_dequeue_style( 'astra-google-fonts' );
    wp_dequeue_style( 'astra-block-editor-styles' );
    wp_dequeue_style( 'astra-grid-css' );
    wp_dequeue_style( 'astra-menu-animation' );
    wp_dequeue_script( 'astra-theme-js' );
    wp_dequeue_script( 'astra-flexibility' );
    wp_dequeue_script( 'astra-mobile-header' );
}, 100 );

add_action( 'init', function () {
    if ( is_admin() ) { return; }
    remove_all_actions( 'astra_body_top' );
    remove_all_actions( 'astra_html_before' );
    remove_all_actions( 'astra_head_top' );
}, 100 );

add_action( 'wp_head', function () {
    if ( ! eo_is_custom_page() ) { return; }
    remove_action( 'wp_head', 'astra_dynamic_css', 11 );
    remove_action( 'wp_head', 'astra_print_inline_css', 11 );
}, 1 );

add_action( 'wp_footer', function () {
    if ( ! eo_is_custom_page() ) { return; }
    remove_action( 'wp_footer', 'astra_print_footer_inline_css', 11 );
}, 1 );

// Reset CSS minimum
add_action( 'wp_head', function () {
    if ( ! eo_is_custom_page() ) { return; }
    echo '<style id="eo-reset">
        *, *::before, *::after { box-sizing: border-box; }
        html, body { margin: 0 !important; padding: 0 !important; }
        body { font-family: "Inter", sans-serif; line-height: 1.6; color: #1F1F1F; background: #fff; }
        body style, body script, body link, body meta { display: none !important; }
        img { max-width: 100%; height: auto; display: block; }
        a { color: inherit; }
        ul, ol { padding: 0; margin: 0; }
    </style>';
}, 5 );

/**
 * Enqueue Swiper.js + slider init.
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );
    wp_add_inline_script( 'swiper-js', "
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper === 'undefined') return;
            var el = document.querySelector('.ae-hero-slider');
            if (!el) return;
            new Swiper(el, {
                loop: false, rewind: true, speed: 800,
                autoplay: { delay: 5000, disableOnInteraction: false },
                effect: 'fade', fadeEffect: { crossFade: true },
                pagination: { el: el.querySelector('.swiper-pagination'), clickable: true },
                navigation: {
                    nextEl: el.querySelector('.swiper-button-next'),
                    prevEl: el.querySelector('.swiper-button-prev')
                }
            });
        });
    " );
} );

/**
 * Floating WhatsApp button.
 */
add_action( 'wp_footer', function () {
    $url = eo_wa_link();
    $aria = 'Chat WhatsApp ' . eo_company_name();
    ?>
    <a class="ae-wa-float" href="<?php echo esc_url( $url ); ?>"
       target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $aria ); ?>">
        <svg viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path d="M16 .4C7.4.4.4 7.4.4 16c0 2.8.7 5.5 2.1 7.9L0 32l8.4-2.2c2.3 1.2 4.9 1.9 7.6 1.9 8.6 0 15.6-7 15.6-15.6S24.6.4 16 .4zm0 28.4c-2.4 0-4.7-.6-6.7-1.8l-.5-.3-5 1.3 1.3-4.9-.3-.5C3.5 20.6 2.8 18.3 2.8 16 2.8 8.7 8.7 2.8 16 2.8c7.3 0 13.2 5.9 13.2 13.2S23.3 28.8 16 28.8zm7.4-9.9c-.4-.2-2.4-1.2-2.7-1.3-.4-.1-.7-.2-.9.2-.3.4-1 1.3-1.3 1.6-.2.3-.5.3-.9.1-.4-.2-1.7-.6-3.2-2-1.2-1.1-2-2.4-2.2-2.8-.2-.4 0-.6.2-.8.2-.2.4-.5.5-.7.2-.2.2-.4.4-.7.1-.3.1-.5 0-.7-.1-.2-.9-2.2-1.2-3-.3-.8-.7-.7-.9-.7h-.7c-.3 0-.7.1-1 .5-.4.4-1.4 1.3-1.4 3.3s1.4 3.9 1.6 4.2c.2.3 2.8 4.3 6.7 6 1 .4 1.7.6 2.3.8.9.3 1.8.3 2.5.2.8-.1 2.4-1 2.7-1.9.3-.9.3-1.8.2-1.9-.1-.2-.4-.3-.8-.5z"/>
        </svg>
    </a>
    <?php
} );

/**
 * LocalBusiness JSON-LD schema (dinamis dari Customizer).
 */
add_action( 'wp_head', function () {
    if ( ! is_front_page() ) { return; }
    $address_parts = array_filter( array_map( 'trim', explode( ',', eo_brand( 'address_full' ) ) ) );
    $schema = array(
        '@context'  => 'https://schema.org',
        '@type'     => 'LocalBusiness',
        'name'      => eo_company_name(),
        'image'     => get_site_icon_url(),
        'telephone' => '+' . eo_wa_number(),
        'url'       => home_url( '/' ),
        'address'   => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => $address_parts[0] ?? '',
            'addressLocality' => $address_parts[1] ?? '',
            'addressRegion'   => $address_parts[2] ?? '',
            'addressCountry'  => 'ID',
        ),
        'aggregateRating' => array(
            '@type'       => 'AggregateRating',
            'ratingValue' => eo_brand( 'rating_score', '5.0' ),
            'reviewCount' => eo_brand( 'rating_count', '1' ),
        ),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $schema ) . "</script>\n";
}, 20 );

/**
 * Shortcode [eo_wa text="..." message="..."] for inline WhatsApp buttons.
 */
add_shortcode( 'eo_wa', function ( $atts ) {
    $atts = shortcode_atts( array(
        'text'    => 'Chat WhatsApp',
        'message' => '',
        'class'   => 'ae-btn',
    ), $atts );
    $url = $atts['message'] ? eo_wa_link( $atts['message'] ) : eo_wa_link();
    return sprintf(
        '<a href="%s" target="_blank" rel="noopener" class="%s">%s</a>',
        esc_url( $url ),
        esc_attr( $atts['class'] ),
        esc_html( $atts['text'] )
    );
} );
// Backwards-compat shortcode
add_shortcode( 'ae_wa', function ( $atts ) {
    return do_shortcode( '[eo_wa ' . http_build_query( (array) $atts, '', ' ' ) . ']' );
} );
