<?php

function sm_save_meta_data($post_id) {

    if (!isset($_POST['sm_nonce']) || !wp_verify_nonce($_POST['sm_nonce'], 'sm_save_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_post', $post_id)) return;

    // Sanitize dữ liệu
    $mssv = sanitize_text_field($_POST['mssv']);
    $lop = sanitize_text_field($_POST['lop']);
    $ngaysinh = sanitize_text_field($_POST['ngaysinh']);

    update_post_meta($post_id, '_mssv', $mssv);
    update_post_meta($post_id, '_lop', $lop);
    update_post_meta($post_id, '_ngaysinh', $ngaysinh);
}
add_action('save_post', 'sm_save_meta_data');