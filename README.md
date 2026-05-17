# Abadi Event — WordPress Child Theme

Child theme Astra untuk website **Abadi Event - Kontraktor Pameran Jogja**.

## Info

- **Parent theme**: Astra
- **WordPress**: 6.x+
- **PHP**: 7.4+
- **Klien**: Abadi Event, Sorosutan, Yogyakarta
- **WhatsApp bisnis**: 0812-2744-7888

## Struktur

```
abadi-event/
├── style.css              Header tema + seluruh CSS
├── functions.php          Hook, customizer registration, helper functions
├── header-ae.php          Custom header (bypass Astra)
├── footer-ae.php          Custom footer
├── home.php               Blog index (otomatis dipakai WP untuk Posts page)
├── single.php             Detail post artikel
├── template-home.php      Halaman Beranda (slug: home)
├── template-about.php     Halaman About (slug: about)
├── template-portfolio.php Halaman Portfolio (slug: portfolio)
├── template-contact.php   Halaman Contact (slug: contact)
└── inc/
    └── customizer-about.php  Customizer settings untuk halaman About
```

## Setup di WordPress

1. Install & activate parent theme **Astra** dari repo WordPress
2. Upload folder `abadi-event` ke `/wp-content/themes/`
3. wp-admin → **Tampilan → Tema** → activate **Abadi Event Child**
4. Buat 5 halaman dengan slug persis: `home`, `about`, `portfolio`, `contact`, `blog`
5. **Pengaturan → Membaca**: Beranda = Home · Halaman Pos = Blog
6. **Pengaturan → Permalink** → pilih "Nama Posting" → Save
7. Edit konten halaman About via **Tampilan → Sesuaikan → Halaman About**

## Fitur

- 5 halaman corporate (Home, About, Portfolio, Blog, Contact)
- Hero slider dengan Swiper.js
- Portfolio filter by kategori
- Contact form yang submit ke WhatsApp
- FAQ accordion
- Customizer untuk edit halaman About tanpa edit kode
- Tombol WhatsApp floating
- Responsive mobile

## Update Konten

| Element | Cara Edit |
|---|---|
| Halaman About | Tampilan → Sesuaikan → Halaman About |
| Logo | Tampilan → Sesuaikan → Identitas Situs |
| Menu | Tampilan → Menu |
| Post artikel blog | Pos → Tambah Baru |
| Halaman lain | Edit file template-*.php langsung |

## Color Palette

- Merah primer: `#C8102E`
- Merah gelap: `#9E0C24`
- Hitam: `#1A1A1A`
- Abu-abu: `#F7F7F7`, `#E5E5E5`, `#6B6B6B`

## License

Private — All rights reserved Abadi Event.
