<?php
/**
 * Template Name: Abadi Event - Portfolio
 */
require get_stylesheet_directory() . '/header-ae.php'; ?>

<!-- HERO -->
<section class="ae-page-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> <span>/</span> <span>Portfolio</span></nav>
        <span class="ae-eyebrow">PORTFOLIO PROYEK</span>
        <h1>Rekam Jejak Pameran, Booth,<br>Interior &amp; Event di Yogyakarta</h1>
        <p>Lebih dari 200 proyek telah kami eksekusi untuk klien korporat di Yogyakarta dan kota-kota besar di Indonesia.</p>
    </div>
</section>

<!-- STATS BAR -->
<section class="ae-portfolio-stats">
    <div class="ae-container ae-portfolio-stats-grid">
        <div><strong>200+</strong><span>Proyek Selesai</span></div>
        <div><strong>150+</strong><span>Klien Korporat</span></div>
        <div><strong>25+</strong><span>Kota Terjangkau</span></div>
        <div><strong>10+</strong><span>Tahun Pengalaman</span></div>
    </div>
</section>

<!-- FEATURED PROJECT -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head ae-section-head-left">
            <span class="ae-eyebrow ae-eyebrow-dark">PROYEK UNGGULAN</span>
            <h2>Booth Pameran Otomotif Nasional</h2>
        </div>
        <div class="ae-featured-grid">
            <div class="ae-featured-image">
                <img src="https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=1200&q=80" alt="Booth Pameran Otomotif">
            </div>
            <div class="ae-featured-info">
                <div class="ae-featured-meta">
                    <div><span class="ae-meta-label">Klien</span><strong>PT Otomotif Nasional</strong></div>
                    <div><span class="ae-meta-label">Lokasi</span><strong>JEC Yogyakarta</strong></div>
                    <div><span class="ae-meta-label">Tahun</span><strong>2025</strong></div>
                    <div><span class="ae-meta-label">Kategori</span><strong>Booth Pameran</strong></div>
                </div>
                <p>Booth dua lantai seluas 12×8 meter dengan konsep modern industrial untuk menampilkan lini produk terbaru klien. Pengerjaan diselesaikan dalam 21 hari kerja, mulai dari konsultasi, render 3D, produksi material, hingga instalasi on-site.</p>
                <ul class="ae-featured-points">
                    <li>Konstruksi dua lantai dengan tangga akses pengunjung VIP</li>
                    <li>Lighting LED custom dengan kontrol intensitas otomatis</li>
                    <li>Branding cetak digital high-resolution di seluruh panel</li>
                    <li>Area diskusi tertutup berkapasitas 8 orang</li>
                </ul>
            </div>
        </div>
    </div>
</section>

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
            $items = array(
                array('booth',    'Booth Pameran Otomotif',     'PT Otomotif Nasional · 2025',  'JEC Yogyakarta',    'https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=900&q=80'),
                array('pameran',  'Pameran UMKM Yogyakarta',    'Disperindag DIY · 2025',       'Jogja Expo Center', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&q=80'),
                array('interior', 'Showroom Furniture Premium', 'PT Furnitur Jaya · 2024',      'Jl. Magelang KM 7', 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80'),
                array('event',    'Corporate Gathering 500 Pax','PLN UID Yogyakarta · 2024',    'Hotel Tentrem',     'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=900&q=80'),
                array('booth',    'Booth Trade Show Properti',  'Asosiasi Properti DIY · 2025', 'Sahid Raya Hotel',  'https://images.unsplash.com/photo-1531058020387-3be344556be6?w=900&q=80'),
                array('event',    'Launching Produk Smartphone','Brand Nasional · 2024',        'Plaza Ambarrukmo',  'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=900&q=80'),
                array('pameran',  'Pameran Pendidikan UGM',     'UGM Expo · 2024',              'Grha Sabha Pramana','https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&q=80'),
                array('interior', 'Kantor Co-Working Modern',   'Startup Yogyakarta · 2024',    'Sleman City Hall',  'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=80'),
                array('booth',    'Booth Aktivasi Brand FMCG',  'Mall Jogja · 2025',            'Hartono Mall',      'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=900&q=80'),
                array('event',    'Seminar Nasional Konstruksi','Asosiasi Kontraktor · 2024',   'Royal Ambarrukmo',  'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=900&q=80'),
                array('interior', 'Cafe &amp; Resto Boutique',  'Klien Pribadi · 2024',         'Jl. Kaliurang KM 6','https://images.unsplash.com/photo-1521017432531-fbd92d768814?w=900&q=80'),
                array('pameran',  'Pameran Kerajinan Lokal',    'Dinas Pariwisata DIY · 2025',  'JEC Yogyakarta',    'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=900&q=80'),
            );
            foreach ( $items as $it ) : ?>
                <div class="ae-portfolio-card" data-cat="<?php echo esc_attr($it[0]); ?>">
                    <div class="ae-portfolio-img"><img src="<?php echo esc_url($it[4]); ?>" alt="<?php echo esc_attr($it[1]); ?>"></div>
                    <div class="ae-portfolio-meta">
                        <span class="ae-tag"><?php
                            $labels = array('booth'=>'Booth Pameran','pameran'=>'Konstruksi Pameran','interior'=>'Interior Desain','event'=>'Event Organizer');
                            echo esc_html( $labels[$it[0]] ?? $it[0] );
                        ?></span>
                        <h3><?php echo $it[1]; ?></h3>
                        <small><?php echo esc_html($it[2]); ?> · <?php echo esc_html($it[3]); ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
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
                <p>Produksi di workshop sendiri di Yogyakarta, dipantau langsung oleh tim quality control.</p>
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
                <p>"Salah satu pelayanan jasa terbaik di Yogyakarta. Tim profesional, hasil booth memuaskan, deadline tepat waktu."</p>
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
        <a href="https://wa.me/6281227447888" target="_blank" class="ae-btn ae-btn-lg">Mulai Konsultasi</a>
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
