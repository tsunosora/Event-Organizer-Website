<?php
/**
 * Custom standalone footer.
 */
$company    = eo_company_name();
$wa_display = eo_brand( 'contact_wa_display', '0812-2744-7888' );
$address    = eo_brand( 'address_full' );
$hours      = eo_brand( 'hours_short' );
$ig         = eo_brand( 'social_instagram' );
$fb         = eo_brand( 'social_facebook' );
$gr         = eo_brand( 'social_google' );
?>
</main>

<footer class="ae-footer">
    <div class="ae-container ae-footer-grid">
        <div>
            <h4><?php echo esc_html( $company ); ?></h4>
            <p><?php echo esc_html( eo_brand( 'company_about_short' ) ); ?></p>
        </div>
        <div>
            <h4>Tautan</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
                <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">About</a></li>
                <li><a href="<?php echo esc_url( home_url('/portfolio/') ); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url( home_url('/blog/') ); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url( home_url('/contact/') ); ?>">Contact</a></li>
            </ul>
        </div>
        <div>
            <h4>Kontak</h4>
            <p>
                <?php if ( $wa_display ) : ?>
                    <a href="<?php echo esc_url( eo_wa_link() ); ?>" target="_blank"><?php echo esc_html( $wa_display ); ?></a><br>
                <?php endif; ?>
                <?php if ( $address ) echo esc_html( $address ) . '<br>'; ?>
                <?php if ( $hours ) echo esc_html( $hours ); ?>
            </p>
        </div>
        <div>
            <h4>Ikuti Kami</h4>
            <p>
                <?php echo $gr ? '<a href="'.esc_url($gr).'" target="_blank">Google Reviews</a>' : 'Google Reviews'; ?><br>
                <?php echo $ig ? '<a href="'.esc_url($ig).'" target="_blank">Instagram</a>' : 'Instagram'; ?><br>
                <?php echo $fb ? '<a href="'.esc_url($fb).'" target="_blank">Facebook</a>' : 'Facebook'; ?>
            </p>
        </div>
    </div>
    <div class="ae-footer-bottom">
        <div class="ae-container">
            <small>&copy; <?php echo esc_html( date('Y') ); ?> <?php echo esc_html( $company ); ?>. Hak cipta dilindungi.</small>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var t = document.querySelector('.ae-nav-toggle');
    var m = document.querySelector('.ae-nav-menu');
    if (t && m) t.addEventListener('click', function () { m.classList.toggle('is-open'); });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
