<?php
/**
 * Template Name: Event Organize - Contact
 */
require get_stylesheet_directory() . '/header-ae.php';
$company    = eo_company_name();
$wa_number  = eo_wa_number();
$wa_display = eo_brand( 'contact_wa_display', '0812-2744-7888' );
$wa_link    = eo_wa_link();
$email      = eo_brand( 'contact_email', 'info@example.com' );
$address    = eo_brand( 'address_full' );
$city       = eo_brand( 'address_city', 'Indonesia' );
$hours_long = eo_brand( 'hours_long', "Senin – Sabtu\n08.00 – 17.00 WIB" );
$hours_short= eo_brand( 'hours_short', 'Senin – Sabtu, 08.00 – 17.00 WIB' );
$rating_score = eo_brand( 'rating_score', '5.0' );
$rating_count = eo_brand( 'rating_count', '1' );
?>

<!-- HERO -->
<section class="ae-page-hero">
    <div class="ae-container">
        <nav class="ae-breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a> <span>/</span> <span>Contact</span></nav>
        <span class="ae-eyebrow">HUBUNGI KAMI</span>
        <h1>Diskusikan Proyek Pameran<br>&amp; Event Anda Bersama Kami</h1>
        <p>Tim kami siap membantu menyusun konsep, desain, dan anggaran sesuai kebutuhan brand Anda &mdash; biasanya kami merespons dalam 30 menit pada jam kerja.</p>
    </div>
</section>

<!-- QUICK CONTACT CARDS -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-quick-contact-grid">
            <a href="<?php echo esc_url( $wa_link ); ?>" target="_blank" class="ae-quick-card">
                <div class="ae-quick-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg>
                </div>
                <div>
                    <span class="ae-meta-label">Telepon &amp; WhatsApp</span>
                    <strong><?php echo esc_html( $wa_display ); ?></strong>
                    <small><?php echo esc_html( $hours_short ); ?></small>
                </div>
            </a>

            <a href="mailto:<?php echo esc_attr( $email ); ?>" class="ae-quick-card">
                <div class="ae-quick-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <div>
                    <span class="ae-meta-label">Email</span>
                    <strong><?php echo esc_html( $email ); ?></strong>
                    <small>Respons dalam 1&times;24 jam pada hari kerja</small>
                </div>
            </a>

            <a href="https://maps.google.com/?q=<?php echo urlencode( $address ); ?>" target="_blank" class="ae-quick-card">
                <div class="ae-quick-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div>
                    <span class="ae-meta-label">Workshop &amp; Kantor</span>
                    <strong><?php echo esc_html( $city ); ?></strong>
                    <small><?php echo esc_html( $address ); ?></small>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- FORM + DETAIL -->
<section class="ae-section ae-section-gray">
    <div class="ae-container ae-contact-grid">
        <div class="ae-contact-info">
            <span class="ae-eyebrow ae-eyebrow-dark">INFORMASI KONTAK</span>
            <h2>Kunjungi atau Hubungi Kami</h2>
            <p>Anda dapat berkonsultasi langsung di kantor kami atau melalui telepon, WhatsApp, dan email pada jam operasional.</p>

            <ul class="ae-contact-list">
                <li>
                    <span class="ae-contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg></span>
                    <div><strong>Telepon &amp; WhatsApp</strong><a href="<?php echo esc_url( $wa_link ); ?>" target="_blank"><?php echo esc_html( $wa_display ); ?></a></div>
                </li>
                <li>
                    <span class="ae-contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                    <div><strong>Email</strong><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></div>
                </li>
                <li>
                    <span class="ae-contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                    <div><strong>Alamat Kantor</strong><?php echo eo_nl2br( $address ); ?></div>
                </li>
                <li>
                    <span class="ae-contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
                    <div><strong>Jam Operasional</strong><?php echo eo_nl2br( $hours_long ); ?></div>
                </li>
                <li>
                    <span class="ae-contact-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></span>
                    <div><strong>Rating Google Business</strong><?php echo esc_html( $rating_score ); ?> dari 5 (<?php echo esc_html( $rating_count ); ?> ulasan)</div>
                </li>
            </ul>
        </div>

        <div class="ae-contact-form-wrapper">
            <div class="ae-contact-form-card">
                <span class="ae-eyebrow ae-eyebrow-dark">FORMULIR PENAWARAN</span>
                <h2>Kirim Permintaan Penawaran</h2>
                <p>Isi formulir di bawah &mdash; pesan akan diteruskan langsung ke WhatsApp tim kami dengan data yang sudah terformat rapi.</p>

                <form action="https://wa.me/<?php echo esc_attr( $wa_number ); ?>" method="get" target="_blank" id="ae-quote-form" class="ae-contact-form">
                    <input type="hidden" name="phone" value="<?php echo esc_attr( $wa_number ); ?>">
                    <div class="ae-form-row">
                        <label>Nama Lengkap <span class="ae-req">*</span>
                            <input type="text" id="qf-name" required placeholder="Contoh: Andi Pratama">
                        </label>
                        <label>Nama Perusahaan
                            <input type="text" id="qf-company" placeholder="Opsional">
                        </label>
                    </div>
                    <div class="ae-form-row">
                        <label>Nomor WhatsApp <span class="ae-req">*</span>
                            <input type="tel" id="qf-wa" required placeholder="08xx xxxx xxxx">
                        </label>
                        <label>Email
                            <input type="email" id="qf-email" placeholder="email@perusahaan.id">
                        </label>
                    </div>
                    <div class="ae-form-row">
                        <label>Jenis Layanan <span class="ae-req">*</span>
                            <select id="qf-service" required>
                                <option value="">Pilih layanan...</option>
                                <option>Kontraktor Pameran</option>
                                <option>Booth Pameran</option>
                                <option>Interior Desain</option>
                                <option>Event Organizer</option>
                                <option>Lainnya</option>
                            </select>
                        </label>
                        <label>Estimasi Anggaran
                            <select id="qf-budget">
                                <option value="">Pilih kisaran...</option>
                                <option>Di bawah Rp 25 juta</option>
                                <option>Rp 25 &ndash; 75 juta</option>
                                <option>Rp 75 &ndash; 200 juta</option>
                                <option>Di atas Rp 200 juta</option>
                                <option>Belum tentukan</option>
                            </select>
                        </label>
                    </div>
                    <div class="ae-form-row">
                        <label>Tanggal Acara
                            <input type="date" id="qf-date">
                        </label>
                        <label>Lokasi Acara
                            <input type="text" id="qf-loc" placeholder="Contoh: nama venue / kota">
                        </label>
                    </div>
                    <label>Brief / Pesan
                        <textarea id="qf-msg" rows="5" placeholder="Ceritakan kebutuhan, target audiens, dan detail proyek Anda..."></textarea>
                    </label>

                    <input type="hidden" name="text" id="qf-text">
                    <button type="submit" class="ae-btn ae-btn-lg" style="width:100%;">Kirim via WhatsApp</button>
                    <p class="ae-form-note">Dengan mengirim formulir ini, Anda akan diarahkan ke WhatsApp dengan data yang sudah terformat. Kami akan merespons dalam 30 menit pada jam kerja.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- MAP FULL WIDTH -->
<section class="ae-map-full">
    <iframe src="<?php echo esc_url( eo_map_embed_url() ); ?>" width="100%" height="500" style="border:0;display:block;" loading="lazy"></iframe>
</section>

<!-- FAQ -->
<section class="ae-section">
    <div class="ae-container">
        <div class="ae-section-head">
            <span class="ae-eyebrow ae-eyebrow-dark">PERTANYAAN UMUM</span>
            <h2>Hal yang Sering Ditanyakan Klien</h2>
            <p>Beberapa pertanyaan yang umum kami terima sebelum proyek dimulai.</p>
        </div>
        <div class="ae-faq-list">
            <details class="ae-faq-item">
                <summary>Berapa lama proses dari konsultasi hingga booth siap pakai?</summary>
                <p>Rata-rata 14&ndash;21 hari kerja untuk booth custom skala menengah, tergantung tingkat kompleksitas desain dan ketersediaan material. Untuk booth standar, prosesnya bisa lebih cepat (7&ndash;10 hari).</p>
            </details>
            <details class="ae-faq-item">
                <summary>Apakah <?php echo esc_html( $company ); ?> melayani proyek di luar kota?</summary>
                <p>Ya, kami melayani klien di seluruh Pulau Jawa &mdash; terutama Yogyakarta, Solo, Semarang, Surabaya, Bandung, dan Jakarta. Untuk lokasi lain di Indonesia, silakan diskusikan terlebih dahulu dengan tim kami.</p>
            </details>
            <details class="ae-faq-item">
                <summary>Bagaimana sistem pembayaran proyeknya?</summary>
                <p>Umumnya kami menerapkan tiga tahap pembayaran: 30% sebagai DP saat penandatanganan kontrak, 50% saat material siap diproduksi, dan 20% pelunasan setelah instalasi selesai dan disetujui klien.</p>
            </details>
            <details class="ae-faq-item">
                <summary>Apakah desain bisa direvisi setelah konsultasi awal?</summary>
                <p>Tentu. Kami menyediakan hingga 3 kali revisi mayor desain 3D pada tahap perencanaan. Revisi minor (warna, tipografi, branding) tidak terbatas dalam batas waktu yang disepakati.</p>
            </details>
            <details class="ae-faq-item">
                <summary>Apakah hasil booth bisa disimpan untuk pameran berikutnya?</summary>
                <p>Bisa. Untuk booth modular yang dirancang reusable, kami menyediakan layanan penyimpanan dan re-instalasi pada event berikutnya. Diskusikan saat konsultasi untuk opsi modular.</p>
            </details>
            <details class="ae-faq-item">
                <summary>Apa yang membedakan <?php echo esc_html( $company ); ?> dari kontraktor lain?</summary>
                <p>Tim in-house menangani seluruh tahap proyek &mdash; desain, produksi, instalasi, hingga bongkar &mdash; sehingga kualitas dan jadwal terjaga. Selain itu, RAB kami transparan tanpa biaya tersembunyi, didukung rating <?php echo esc_html( $rating_score ); ?> di Google dari klien-klien sebelumnya.</p>
            </details>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="ae-cta-footer">
    <div class="ae-container" style="text-align:center;">
        <h2>Tidak Menemukan Jawaban?</h2>
        <p>Hubungi tim kami langsung &mdash; kami siap menjelaskan detail proyek Anda secara personal.</p>
        <a href="<?php echo esc_url( $wa_link ); ?>" target="_blank" class="ae-btn ae-btn-lg">Chat WhatsApp Sekarang</a>
    </div>
</section>

<script>
document.getElementById('ae-quote-form').addEventListener('submit', function(){
    var v = function(id){ return document.getElementById(id).value; };
    var name = v('qf-name'),
        company = v('qf-company'),
        wa = v('qf-wa'),
        email = v('qf-email'),
        srv = v('qf-service'),
        budget = v('qf-budget'),
        date = v('qf-date'),
        loc = v('qf-loc'),
        msg = v('qf-msg');
    var lines = [
        'Halo <?php echo esc_js( $company ); ?>, saya ingin request penawaran:',
        '',
        '*Nama:* ' + name,
        company ? '*Perusahaan:* ' + company : '',
        '*WhatsApp:* ' + wa,
        email ? '*Email:* ' + email : '',
        '*Layanan:* ' + srv,
        budget ? '*Anggaran:* ' + budget : '',
        date ? '*Tanggal Acara:* ' + date : '',
        loc ? '*Lokasi:* ' + loc : '',
        msg ? '\n*Brief:*\n' + msg : ''
    ].filter(Boolean);
    document.getElementById('qf-text').value = lines.join('\n');
});
</script>

<?php require get_stylesheet_directory() . '/footer-ae.php'; ?>
