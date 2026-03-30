// 3. Thêm sinh viên (form nhập liệu)
// - Khi thêm/sửa sinh viên, sẽ có các trường nhập liệu bổ sung:
//   + MSSV (mã số sinh viên): nhập text
//   + Lớp/Chuyên ngành: chọn dropdown (CNTT, Kinh tế, Marketing)
//   + Ngày sinh: chọn ngày
<?php

function sm_add_meta_box() {
    add_meta_box(
        'sm_student_info',
        'Thông tin sinh viên',
        'sm_meta_box_html',
        'sinh_vien'
    );
}
add_action('add_meta_boxes', 'sm_add_meta_box');

function sm_meta_box_html($post) {
    wp_nonce_field('sm_save_data', 'sm_nonce');

    $mssv = get_post_meta($post->ID, '_mssv', true);
    $lop = get_post_meta($post->ID, '_lop', true);
    $ngaysinh = get_post_meta($post->ID, '_ngaysinh', true);
    ?>

    <p>
        <label>MSSV:</label><br>
        <input type="text" name="mssv" value="<?php echo esc_attr($mssv); ?>" />
    </p>

    <p>
        <label>Lớp:</label><br>
        <select name="lop">
            <option value="CNTT" <?php selected($lop, 'CNTT'); ?>>CNTT</option>
            <option value="Kinh tế" <?php selected($lop, 'Kinh tế'); ?>>Kinh tế</option>
            <option value="Marketing" <?php selected($lop, 'Marketing'); ?>>Marketing</option>
        </select>
    </p>

    <p>
        <label>Ngày sinh:</label><br>
        <input type="date" name="ngaysinh" value="<?php echo esc_attr($ngaysinh); ?>" />
    </p>

    <?php
}