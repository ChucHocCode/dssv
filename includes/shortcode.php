// 4. Hiển thị danh sách sinh viên
// - Tạo shortcode [danh_sach_sinh_vien] để chèn vào Page.
// - Khi chèn shortcode này, hệ thống sẽ hiển thị bảng gồm: STT, MSSV, Họ tên, Lớp, Ngày sinh.
<?php

function sm_student_list_shortcode() {

    $args = array(
        'post_type' => 'sinh_vien',
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);

    $output = '<table border="1">';
    $output .= '<tr>
        <th>STT</th>
        <th>MSSV</th>
        <th>Họ tên</th>
        <th>Lớp</th>
        <th>Ngày sinh</th>
    </tr>';

    $stt = 1;

    while ($query->have_posts()) {
        $query->the_post();

        $mssv = get_post_meta(get_the_ID(), '_mssv', true);
        $lop = get_post_meta(get_the_ID(), '_lop', true);
        $ngaysinh = get_post_meta(get_the_ID(), '_ngaysinh', true);

        $output .= "<tr>
            <td>$stt</td>
            <td>$mssv</td>
            <td>" . get_the_title() . "</td>
            <td>$lop</td>
            <td>$ngaysinh</td>
        </tr>";

        $stt++;
    }

    wp_reset_postdata();

    $output .= '</table>';

    return $output;
}

add_shortcode('danh_sach_sinh_vien', 'sm_student_list_shortcode');