<?php
/**
 * Template Name: Abadi Event - Home
 */
require get_stylesheet_directory() . '/header-ae.php'; ?>

<!-- HERO SLIDER -->
<section class="ae-hero-slider swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1600&q=80');">
            <div class="ae-hero-overlay">
                <div class="ae-container">
                    <span class="ae-eyebrow">KONTRAKTOR PAMERAN JOGJA</span>
                    <h1>Bawa Brand Anda <span class="ae-accent">Tampil Maksimal</span><br>di Setiap Pameran</h1>
                    <p>Desain custom, eksekusi rapi, deadline tepat waktu. Lebih dari 200 event sukses di Yogyakarta.</p>
                    <div class="ae-hero-cta">
                        <a href="https://wa.me/6281227447888?text=<?php echo rawurlencode('Halo Abadi Event, saya ingin tanya soal jasa pameran.'); ?>" target="_blank" class="ae-btn">Chat WhatsApp</a>
                        <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>" class="ae-btn-outline-white">Lihat Portfolio</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=1600&q=80');">
            <div class="ae-hero-overlay">
                <div class="ae-container">
                    <span class="ae-eyebrow">BOOTH CUSTOM PREMIUM</span>
                    <h1>Booth yang <span class="ae-accent">Mencuri Perhatian</span><br>Pengunjung Pameran</h1>
                    <p>Material premium, branding tajam, instalasi cepat. Booth Anda jadi magnet di hall pameran.</p>
                    <div class="ae-hero-cta">
                        <a href="https://wa.me/6281227447888" target="_blank" class="ae-btn">Konsultasi Gratis</a>
                        <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>" class="ae-btn-outline-white">Galeri Booth</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1600&q=80');">
            <div class="ae-hero-overlay">
                <div class="ae-container">
                    <span class="ae-eyebrow">EVENT ORGANIZER PROFESIONAL</span>
                    <h1>Event Korporat <span class="ae-accent">Berkesan</span><br>dari Konsep ke Eksekusi</h1>
                    <p>Gathering, launching, seminar — kami tangani satu pintu, Anda tinggal hadir.</p>
                    <div class="ae-hero-cta">
                        <a href="https://wa.me/6281227447888" target="_blank" class="ae-btn">Diskusi Event</a>
                        <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="ae-btn-outline-white">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>

<!-- STATS STRIP -->
<section class="ae-stats">
    <div class="ae-container ae-stats-grid">
        <div><strong>200+</strong><span>Event Terlaksana</span></div>
        <div><strong>150+</strong><span>Klien Korporat</span></div>
        <div><strong>5.0★</strong><span>Rating Google</span></div>
        <div><strong>10+</strong><span>Tahun Pengalaman</span></div>
    </div>
</section>

<!-- ABOUT INTRO -->
<section class="ae-section">
    <div class="ae-container ae-about-intro">
        <div>
            <span class="ae-eyebrow ae-eyebrow-dark">TENTANG KAMI</span>
            <h2>Mitra Pameran &amp; Event Anda<br>di Yogyakarta</h2>
            <p>Abadi Event adalah kontraktor pameran dan event organizer berbasis di Sorosutan, Yogyakarta. Kami melayani konstruksi pameran, booth display custom, interior desain ruang komersial, hingga eksekusi event korporat.</p>
            <p>Tim in-house menangani seluruh tahap proyek — dari desain 3D, produksi, hingga instalasi — sehingga kualitas dan jadwal selalu terjaga.</p>
            <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="ae-btn">Selengkapnya →</a>
        </div>
        <div class="ae-about-image">
            <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=800&q=80" alt="Tim Abadi Event">
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="ae-section ae-section-gray">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">LAYANAN KAMI</span>
            <h2>Apa yang Kami Kerjakan</h2>
        </div>
        <div class="ae-services-grid">
            <div class="ae-service-card">
                <div class="ae-service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6M9 11h.01M15 11h.01"/></svg>
                </div>
                <h3>Kontraktor Pameran</h3>
                <p>Konstruksi pameran indoor &amp; outdoor skala kecil hingga besar.</p>
            </div>
            <div class="ae-service-card">
                <div class="ae-service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l1-5h16l1 5M3 9v11h18V9M3 9h18M9 14h6"/></svg>
                </div>
                <h3>Booth Pameran</h3>
                <p>Booth custom 2 lantai, modular, dan aktivasi brand untuk hasil maksimal.</p>
            </div>
            <div class="ae-service-card">
                <div class="ae-service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21V8a3 3 0 013-3h12a3 3 0 013 3v13M3 14h18M7 21v2M17 21v2"/></svg>
                </div>
                <h3>Interior Desain</h3>
                <p>Showroom, kantor, dan ruang komersial yang merepresentasikan brand.</p>
            </div>
            <div class="ae-service-card">
                <div class="ae-service-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="3" width="6" height="12" rx="3"/><path d="M5 11v1a7 7 0 0014 0v-1M12 19v3M8 22h8"/></svg>
                </div>
                <h3>Event Organizer</h3>
                <p>Gathering korporat, launching produk, seminar, dan workshop.</p>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO HIGHLIGHT -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">PORTFOLIO</span>
            <h2>Proyek Terbaru Kami</h2>
        </div>
        <div class="ae-portfolio-grid">
            <?php
            $items = array(
                array('https://images.unsplash.com/photo-1531058020387-3be344556be6?w=800&q=80', 'Booth Pameran Otomotif', 'Booth'),
                array('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80', 'Pameran UMKM Jogja', 'Pameran'),
                array('https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80', 'Interior Showroom', 'Interior'),
                array('https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=800&q=80', 'Corporate Gathering', 'Event'),
                array('https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=800&q=80', 'Booth Trade Show', 'Booth'),
                array('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=800&q=80', 'Launching Produk', 'Event'),
            );
            foreach ( $items as $it ) : ?>
                <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>" class="ae-portfolio-card">
                    <img src="<?php echo esc_url($it[0]); ?>" alt="<?php echo esc_attr($it[1]); ?>">
                    <div class="ae-portfolio-meta">
                        <span class="ae-tag"><?php echo esc_html($it[2]); ?></span>
                        <h3><?php echo esc_html($it[1]); ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <a href="<?php echo esc_url( home_url('/portfolio/') ); ?>" class="ae-btn-outline">Lihat Semua Proyek →</a>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="ae-section ae-section-dark">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow">TESTIMONI</span>
            <h2 style="color:#fff;">Apa Kata Klien Kami</h2>
        </div>
        <div class="ae-testimonials">
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Salah satu pelayanan jasa terbaik di jogja. Tim profesional, hasil booth memuaskan."</p>
                <strong>— Miftha Busree</strong>
            </div>
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Service sangat bagus, komunikasi lancar, deadline tepat. Pasti pakai lagi."</p>
                <strong>— Hetti Probohening / Chiara Bedding</strong>
            </div>
            <div class="ae-testi-card">
                <div class="ae-stars">★★★★★</div>
                <p>"Desain booth-nya mencuri perhatian pengunjung. Brand kami jadi paling rame."</p>
                <strong>— Klien Korporat Jogja</strong>
            </div>
        </div>
    </div>
</section>

<!-- BLOG LATEST -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">BLOG</span>
            <h2>Insight &amp; Tips Pameran</h2>
        </div>
        <div class="ae-blog-grid">
            <?php
            $posts = get_posts( array( 'numberposts' => 3 ) );
            if ( empty( $posts ) ) :
                // Placeholder kalau belum ada artikel
                $dummies = array(
                    array('Tips Memilih Kontraktor Booth', 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=600&q=80'),
                    array('Checklist Persiapan Pameran B2B', 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600&q=80'),
                    array('5 Inspirasi Booth Menarik', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80'),
                );
                foreach ( $dummies as $d ) : ?>
                    <article class="ae-blog-card">
                        <img src="<?php echo esc_url($d[1]); ?>" alt="">
                        <div class="ae-blog-body">
                            <h3><?php echo esc_html($d[0]); ?></h3>
                            <p>Coming soon — tim kami sedang menyiapkan artikel ini untuk Anda.</p>
                        </div>
                    </article>
                <?php endforeach;
            else :
                foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                    <article class="ae-blog-card">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium_large'); ?>
                        <div class="ae-blog-body">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
                        </div>
                    </article>
                <?php endforeach; wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>

<!-- CTA FOOTER -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Siap Pamerkan Brand Anda?</h2>
        <p>Konsultasi gratis. Kami siapkan proposal &amp; RAB dalam 1×24 jam.</p>
        <a href="https://wa.me/6281227447888" target="_blank" class="ae-btn ae-btn-lg">Chat WhatsApp Sekarang</a>
    </div>
</section>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
