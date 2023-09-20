<?php
$email = "your_email@gmail.com";

$url = "https://dailysieure.net/dichvu/api-hosting/gia.html?email=$email";

// Khởi tạo Curl session
$ch = curl_init();

// Thiết lập URL
curl_setopt($ch, CURLOPT_URL, $url);

// Thiết lập để nhận dữ liệu trả về
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Thực hiện truy vấn
$response = curl_exec($ch);

// Kiểm tra nếu có lỗi
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Đóng Curl session
curl_close($ch);

// Xử lý và hiển thị kết quả
if ($response !== false) {
    $data = json_decode($response, true);

    if (!empty($data)) {
        foreach ($data as $item) {
            echo "Gói: " . $item['goi'] . "\n";
            echo "Giá: " . $item['gia'] . "\n";
            echo "Tình trạng: " . $item['tinhtrang'] . "\n";
            echo "\n";
        }
    } else {
        echo "Không có dữ liệu trả về hoặc dữ liệu không hợp lệ.";
    }
} else {
    echo 'Không thể kết nối hoặc lấy dữ liệu.';
}
?>
