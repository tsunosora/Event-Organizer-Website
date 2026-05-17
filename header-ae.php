<?php
/**
 * Custom standalone header.
 * Tidak memakai Astra header — full kontrol layout.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'ae-body' ); ?>>
<?php wp_body_open(); ?>

<style id="ae-critical-css">
/* Critical inline CSS — guaranteed override Astra & defaults */
html body { margin:0!important; padding:0!important; }
html body .ae-header { display:block!important; width:100%!important; background:#fff!important; border-bottom:1px solid #e5e5e5!important; padding:14px 0!important; position:relative!important; z-index:100!important; }
html body .ae-header .ae-header-inner { display:flex!important; flex-direction:row!important; align-items:center!important; justify-content:space-between!important; gap:24px!important; max-width:1200px!important; margin:0 auto!important; padding:0 24px!important; width:100%!important; }
html body .ae-header .ae-logo { font-family:'Poppins',sans-serif!important; font-weight:700!important; font-size:22px!important; color:#0E0E0E!important; text-decoration:none!important; flex-shrink:0!important; }
html body .ae-header .ae-nav { display:flex!important; flex:1!important; justify-content:center!important; }
html body .ae-header .ae-nav-toggle { display:none!important; }
html body .ae-header .ae-nav-menu { display:flex!important; flex-direction:row!important; gap:4px!important; list-style:none!important; margin:0!important; padding:0!important; }
html body .ae-header .ae-nav-menu li { list-style:none!important; margin:0!important; padding:0!important; display:block!important; }
html body .ae-header .ae-nav-menu li::before, html body .ae-header .ae-nav-menu li::marker { content:none!important; display:none!important; }
html body .ae-header .ae-nav-menu a { display:block!important; color:#1F1F1F!important; text-decoration:none!important; font-weight:500!important; padding:10px 14px!important; border-radius:6px!important; font-size:15px!important; }
html body .ae-header .ae-nav-menu a:hover { background:#F5F5F5!important; }
html body .ae-header .ae-header-cta { background:#C8102E!important; color:#fff!important; padding:10px 18px!important; border-radius:8px!important; text-decoration:none!important; font-weight:600!important; font-size:14px!important; flex-shrink:0!important; }
html body .ae-header .ae-header-cta:hover { background:#9E0C24!important; }

html body .ae-footer { display:block!important; width:100%!important; background:#0E0E0E!important; color:#fff!important; padding:60px 0 0!important; }
html body .ae-footer .ae-footer-grid { display:grid!important; grid-template-columns:2fr 1fr 1.5fr 1fr!important; gap:40px!important; max-width:1200px!important; margin:0 auto!important; padding:0 24px 40px!important; }
html body .ae-footer .ae-footer-grid > div { display:block!important; }
html body .ae-footer h4 { color:#C8102E!important; font-family:'Poppins',sans-serif!important; font-size:16px!important; margin:0 0 14px!important; }
html body .ae-footer p, html body .ae-footer li { color:rgba(255,255,255,0.75)!important; font-size:14px!important; line-height:1.7!important; margin:0 0 8px!important; }
html body .ae-footer ul { list-style:none!important; padding:0!important; margin:0!important; }
html body .ae-footer li { list-style:none!important; padding:4px 0!important; display:block!important; }
html body .ae-footer li::before, html body .ae-footer li::marker { content:none!important; display:none!important; }
html body .ae-footer a { color:rgba(255,255,255,0.85)!important; text-decoration:none!important; }
html body .ae-footer a:hover { color:#C8102E!important; }
html body .ae-footer-bottom { border-top:1px solid rgba(255,255,255,0.1)!important; padding:20px 0!important; text-align:center!important; }
html body .ae-footer-bottom small { color:rgba(255,255,255,0.5)!important; font-size:13px!important; }

@media (max-width:768px) {
    html body .ae-header .ae-nav-toggle { display:inline-block!important; background:transparent!important; border:1px solid #ddd!important; border-radius:6px!important; padding:6px 12px!important; font-size:20px!important; cursor:pointer!important; }
    html body .ae-header .ae-nav { flex:0!important; }
    html body .ae-header .ae-nav-menu { display:none!important; position:absolute!important; top:100%!important; left:0!important; right:0!important; background:#fff!important; flex-direction:column!important; padding:12px!important; box-shadow:0 8px 20px rgba(0,0,0,.06)!important; }
    html body .ae-header .ae-nav-menu.is-open { display:flex!important; }
    html body .ae-footer .ae-footer-grid { grid-template-columns:1fr!important; gap:32px!important; }
}
</style>

<header class="ae-header">
    <div class="ae-container ae-header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ae-logo">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo esc_html( eo_company_name() );
            }
            ?>
        </a>
        <nav class="ae-nav">
            <button class="ae-nav-toggle" aria-label="Menu">☰</button>
            <ul class="ae-nav-menu">
                <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
                <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a></li>
                <li><a href="<?php echo esc_url( home_url('/portfolio/') ); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url( home_url('/contact/') ); ?>">Contact</a></li>
            </ul>
        </nav>
        <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank" class="ae-btn ae-btn-sm ae-header-cta">Hubungi Kami</a>
    </div>
</header>

<main class="ae-main">
