<?php
/**
 * CPT "project" enhancement:
 * - Meta boxes (klien, tahun, lokasi, featured, highlight points)
 * - Admin list columns (kategori, klien, tahun)
 * - Helper functions untuk fetch project di template
 *
 * CPT "project" & taxonomy "project_category" sudah register di functions.php
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/* =========================================================
 * 1. META BOXES — di halaman edit Proyek
 * ========================================================= */
add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'eo_project_details',
        'Detail Proyek',
        'eo_project_meta_render',
        'project',
        'normal',
        'high'
    );

    add_meta_box(
        'eo_project_featured',
        'Proyek Unggulan (Featured)',
        'eo_project_featured_render',
        'project',
        'side',
        'high'
    );
} );

function eo_project_meta_render( $post ) {
    wp_nonce_field( 'eo_project_meta', 'eo_project_meta_nonce' );

    $client    = get_post_meta( $post->ID, '_eo_project_client', true );
    $year      = get_post_meta( $post->ID, '_eo_project_year', true );
    $location  = get_post_meta( $post->ID, '_eo_project_location', true );
    $point_1   = get_post_meta( $post->ID, '_eo_project_point_1', true );
    $point_2   = get_post_meta( $post->ID, '_eo_project_point_2', true );
    $point_3   = get_post_meta( $post->ID, '_eo_project_point_3', true );
    $point_4   = get_post_meta( $post->ID, '_eo_project_point_4', true );
    ?>
    <style>
        .eo-pf-fields { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
        .eo-pf-fields label { display: block; font-weight: 600; margin-bottom: 6px; }
        .eo-pf-fields input { width: 100%; }
        .eo-pf-points { margin-top: 16px; padding-top: 16px; border-top: 1px solid #eee; }
        .eo-pf-points h4 { margin: 0 0 4px; }
        .eo-pf-points .desc { color: #666; font-size: 12px; margin-bottom: 12px; }
        .eo-pf-points label { font-weight: 500; }
    </style>
    <div class="eo-pf-fields">
        <div>
            <label for="eo_project_client">Klien</label>
            <input type="text" id="eo_project_client" name="eo_project_client" value="<?php echo esc_attr( $client ); ?>" placeholder="Contoh: PT Otomotif Nasional">
        </div>
        <div>
            <label for="eo_project_year">Tahun</label>
            <input type="text" id="eo_project_year" name="eo_project_year" value="<?php echo esc_attr( $year ); ?>" placeholder="Contoh: 2025">
        </div>
        <div>
            <label for="eo_project_location">Lokasi / Venue</label>
            <input type="text" id="eo_project_location" name="eo_project_location" value="<?php echo esc_attr( $location ); ?>" placeholder="Contoh: JEC Yogyakarta">
        </div>
    </div>

    <div class="eo-pf-points">
        <h4>Highlight Points</h4>
        <p class="desc">Opsional. Hanya ditampilkan saat proyek ini diset sebagai <strong>Featured</strong>. Maksimal 4 poin.</p>
        <p><label>Point 1<br><input type="text" name="eo_project_point_1" value="<?php echo esc_attr( $point_1 ); ?>" style="width:100%"></label></p>
        <p><label>Point 2<br><input type="text" name="eo_project_point_2" value="<?php echo esc_attr( $point_2 ); ?>" style="width:100%"></label></p>
        <p><label>Point 3<br><input type="text" name="eo_project_point_3" value="<?php echo esc_attr( $point_3 ); ?>" style="width:100%"></label></p>
        <p><label>Point 4<br><input type="text" name="eo_project_point_4" value="<?php echo esc_attr( $point_4 ); ?>" style="width:100%"></label></p>
    </div>
    <?php
}

function eo_project_featured_render( $post ) {
    $featured = get_post_meta( $post->ID, '_eo_project_featured', true );
    ?>
    <p>
        <label>
            <input type="checkbox" name="eo_project_featured" value="1" <?php checked( $featured, '1' ); ?>>
            <strong>Jadikan Featured Project</strong>
        </label>
    </p>
    <p style="color:#666;font-size:12px;">
        Featured project akan tampil dengan layout besar di bagian atas halaman Portfolio. Hanya proyek pertama yang ditandai featured yang akan ditampilkan.
    </p>
    <?php
}

/* =========================================================
 * 2. SAVE META — saat post di-update
 * ========================================================= */
add_action( 'save_post_project', function ( $post_id ) {
    if ( ! isset( $_POST['eo_project_meta_nonce'] ) ) { return; }
    if ( ! wp_verify_nonce( $_POST['eo_project_meta_nonce'], 'eo_project_meta' ) ) { return; }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

    $fields = array(
        'eo_project_client'   => '_eo_project_client',
        'eo_project_year'     => '_eo_project_year',
        'eo_project_location' => '_eo_project_location',
        'eo_project_point_1'  => '_eo_project_point_1',
        'eo_project_point_2'  => '_eo_project_point_2',
        'eo_project_point_3'  => '_eo_project_point_3',
        'eo_project_point_4'  => '_eo_project_point_4',
    );
    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) ) );
        }
    }

    // Featured checkbox
    update_post_meta(
        $post_id,
        '_eo_project_featured',
        isset( $_POST['eo_project_featured'] ) ? '1' : '0'
    );
} );

/* =========================================================
 * 3. ADMIN LIST COLUMNS — di Portofolio → All Projects
 * ========================================================= */
add_filter( 'manage_project_posts_columns', function ( $cols ) {
    $new = array();
    foreach ( $cols as $key => $val ) {
        $new[ $key ] = $val;
        if ( $key === 'title' ) {
            $new['featured_image']  = 'Gambar';
            $new['project_cat']     = 'Kategori';
            $new['project_client']  = 'Klien';
            $new['project_year']    = 'Tahun';
            $new['project_featured']= 'Featured';
        }
    }
    return $new;
} );

add_action( 'manage_project_posts_custom_column', function ( $col, $post_id ) {
    switch ( $col ) {
        case 'featured_image':
            $img = get_the_post_thumbnail( $post_id, array( 60, 60 ) );
            echo $img ?: '<span style="color:#aaa">—</span>';
            break;
        case 'project_cat':
            $terms = get_the_terms( $post_id, 'project_category' );
            if ( $terms && ! is_wp_error( $terms ) ) {
                $names = wp_list_pluck( $terms, 'name' );
                echo esc_html( implode( ', ', $names ) );
            } else {
                echo '<span style="color:#aaa">—</span>';
            }
            break;
        case 'project_client':
            echo esc_html( get_post_meta( $post_id, '_eo_project_client', true ) ?: '—' );
            break;
        case 'project_year':
            echo esc_html( get_post_meta( $post_id, '_eo_project_year', true ) ?: '—' );
            break;
        case 'project_featured':
            $f = get_post_meta( $post_id, '_eo_project_featured', true );
            echo $f === '1'
                ? '<span style="color:#C8102E;font-weight:600;">★ Featured</span>'
                : '<span style="color:#aaa">—</span>';
            break;
    }
}, 10, 2 );

/* =========================================================
 * 4. KATEGORI DEFAULT — auto-create saat aktivasi (kalau belum ada)
 * ========================================================= */
add_action( 'admin_init', function () {
    $defaults = array(
        'booth-pameran'      => 'Booth Pameran',
        'konstruksi-pameran' => 'Konstruksi Pameran',
        'interior-desain'    => 'Interior Desain',
        'event-organizer'    => 'Event Organizer',
    );
    foreach ( $defaults as $slug => $name ) {
        if ( ! term_exists( $slug, 'project_category' ) ) {
            wp_insert_term( $name, 'project_category', array( 'slug' => $slug ) );
        }
    }
} );

/* =========================================================
 * 5. HELPER FUNCTIONS untuk template
 * ========================================================= */

/**
 * Get featured project (1 buah). Return WP_Post atau null.
 */
function eo_get_featured_project() {
    $q = new WP_Query( array(
        'post_type'      => 'project',
        'posts_per_page' => 1,
        'meta_key'       => '_eo_project_featured',
        'meta_value'     => '1',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );
    $post = $q->have_posts() ? $q->posts[0] : null;
    wp_reset_postdata();
    return $post;
}

/**
 * Get list semua project (kecuali featured kalau $exclude_featured true).
 */
function eo_get_projects( $limit = 12, $exclude_featured = true ) {
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $limit,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    if ( $exclude_featured ) {
        $featured = eo_get_featured_project();
        if ( $featured ) {
            $args['post__not_in'] = array( $featured->ID );
        }
    }
    $q = new WP_Query( $args );
    $posts = $q->posts;
    wp_reset_postdata();
    return $posts;
}

/**
 * Dapatkan slug kategori utama project (untuk data-cat filter).
 */
function eo_project_main_cat_slug( $post_id ) {
    $terms = get_the_terms( $post_id, 'project_category' );
    if ( ! $terms || is_wp_error( $terms ) ) return '';
    return $terms[0]->slug;
}

/**
 * Dapatkan nama kategori utama project.
 */
function eo_project_main_cat_name( $post_id ) {
    $terms = get_the_terms( $post_id, 'project_category' );
    if ( ! $terms || is_wp_error( $terms ) ) return '';
    return $terms[0]->name;
}

/**
 * Render meta proyek: client · year · location
 */
function eo_project_meta_inline( $post_id, $separator = ' · ' ) {
    $client   = get_post_meta( $post_id, '_eo_project_client', true );
    $year     = get_post_meta( $post_id, '_eo_project_year', true );
    $location = get_post_meta( $post_id, '_eo_project_location', true );
    $parts = array_filter( array( $client, $year, $location ) );
    return implode( $separator, $parts );
}

/**
 * Dapatkan list kategori unik untuk filter button.
 */
function eo_project_used_categories() {
    return get_terms( array(
        'taxonomy'   => 'project_category',
        'hide_empty' => true,
    ) );
}
