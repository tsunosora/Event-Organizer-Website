# Event Organize — WordPress Child Theme

Child theme Astra untuk perusahaan **kontraktor pameran, booth, interior, dan event organizer**.

**Reusable** — semua identitas brand (nama perusahaan, WhatsApp, email, alamat, dll.) dapat diedit langsung melalui Customizer tanpa perlu menyentuh kode.

## Info Theme

- **Theme Name**: Event Organize
- **Parent theme**: Astra
- **WordPress**: 6.x+
- **PHP**: 7.4+
- **Version**: 2.0.0

## Struktur

```
event-organize/
├── style.css                    Header tema + seluruh CSS
├── functions.php                Hook, helper, enqueue, schema
├── header-ae.php                Custom header (bypass Astra)
├── footer-ae.php                Custom footer
├── home.php                     Blog index
├── single.php                   Detail post artikel
├── template-home.php            Halaman Beranda (slug: home)
├── template-about.php           Halaman About (slug: about)
├── template-portfolio.php       Halaman Portfolio (slug: portfolio)
├── template-contact.php         Halaman Contact (slug: contact)
└── inc/
    ├── customizer-brand.php     Identitas brand (nama, WA, alamat, dll.)
    └── customizer-about.php     Konten halaman About
```

## Setup di WordPress

### 1. Install parent theme
- wp-admin → **Tampilan → Tema → Tambah Baru** → cari **Astra** → Install

### 2. Upload child theme
- Upload folder `event-organize` ke `/wp-content/themes/`
- (Atau zip foldernya, lalu Upload Tema dari wp-admin)
- **Activate**

### 3. Buat 5 halaman dengan slug
| Page Title | Slug |
|---|---|
| Home | `home` |
| About | `about` |
| Portfolio | `portfolio` |
| Blog | `blog` |
| Contact | `contact` |

### 4. Pengaturan WP
- **Pengaturan → Membaca**: Beranda = `Home` · Halaman Pos = `Blog`
- **Pengaturan → Permalink**: pilih "Nama Posting" → Save

### 5. Atur Identitas Brand (PALING PENTING)
- **Tampilan → Sesuaikan → Identitas Brand**

Edit field berikut sesuai brand klien:

| Section | Field |
|---|---|
| **Informasi Perusahaan** | Nama Perusahaan · Tagline · Deskripsi singkat · Tahun berdiri · Kota |
| **Kontak** | Nomor WA (format internasional) · WA tampilan · Email · Pesan default WA |
| **Alamat & Jam Buka** | Alamat lengkap · Kota · Query Google Maps · Jam buka |
| **Sosial Media & Rating** | URL Instagram · Facebook · Google Reviews · Skor & jumlah ulasan |
| **Statistik Perusahaan** | Jumlah proyek · klien · kota · tahun pengalaman |

### 6. Atur Konten Halaman About
- **Tampilan → Sesuaikan → Halaman About**
- Edit hero, profil, visi/misi, tim, dan lokasi langsung dari sini

### 7. Upload Logo
- **Tampilan → Sesuaikan → Identitas Situs → Logo**

## Cara Reuse Theme untuk Klien Baru

1. Copy folder theme → ganti nama folder (opsional, untuk versi terpisah)
2. Upload ke WP klien baru → activate
3. **Tampilan → Sesuaikan → Identitas Brand** → isi data klien baru
4. **Tampilan → Sesuaikan → Halaman About** → isi profil klien baru
5. Upload logo klien baru
6. Done — website siap pakai dalam ~30 menit

## Color Palette

- Merah primer: `#C8102E`
- Merah gelap: `#9E0C24`
- Hitam: `#1A1A1A`
- Abu-abu: `#F7F7F7`, `#E5E5E5`, `#6B6B6B`

Untuk ganti palet warna, edit `:root` di `style.css` (CSS variables).

## Fitur

- 5 halaman corporate siap pakai
- Hero slider Swiper.js
- Portfolio filter by kategori
- Contact form yang submit langsung ke WhatsApp
- FAQ accordion (HTML5 native)
- Tombol WhatsApp floating
- LocalBusiness JSON-LD schema (otomatis dari Customizer)
- Responsive mobile
- Shortcode `[eo_wa text="..." message="..."]` untuk tombol inline

## License

MIT
