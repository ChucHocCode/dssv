// 3. Thêm sinh viên (menu Sinh viên)
// - Đăng ký Custom Post Type 'sinh_vien' để tạo menu quản trị "Sinh viên" trong WordPress.
// - Khi vào menu này, bạn có thể thêm mới, chỉnh sửa, xoá sinh viên như một bài viết thông thường.
<?php

function sm_register_cpt() {
    register_post_type('sinh_vien', array(
        'labels' => array(
            'name' => 'Sinh viên',
            'singular_name' => 'Sinh viên'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor'),
    ));
}
add_action('init', 'sm_register_cpt');
