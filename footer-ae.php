<?php
/**
 * Custom standalone footer for Abadi Event templates.
 */
?>
</main>

<footer class="ae-footer">
    <div class="ae-container ae-footer-grid">
        <div>
            <h4>Abadi Event</h4>
            <p>Kontraktor pameran, booth, interior &amp; event organizer di Yogyakarta. 5★ Google.</p>
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
            <p><a href="https://wa.me/6281227447888" target="_blank">0812-2744-7888</a><br>
            Jl. Godo Inten UH VI No.50E,<br>Sorosutan, Umbulharjo, Yogyakarta 55162<br>
            Senin – Sabtu, 08.00 – 17.00 WIB</p>
        </div>
        <div>
            <h4>Ikuti Kami</h4>
            <p>Google Reviews<br>Instagram<br>Facebook</p>
        </div>
    </div>
    <div class="ae-footer-bottom">
        <div class="ae-container">
            <small>© <?php echo date('Y'); ?> Abadi Event. Hak cipta dilindungi.</small>
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
