<?php
$email = "admin";
$key = "123123";
$tranid = "999999";

$url = "https://dailysieure.net/dichvu/api-hosting/giahan.html?email=$email&key=$key&tranid=$tranid";

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
        echo "Trạng thái: " . $data['status'] . "\n";
        echo "Thông điệp: " . $data['msg'] . "\n";
        
        if ($data['status'] == "2") {
            echo "Tài khoản: " . $data['info']['tk'] . "\n";
            echo "Domain: " . $data['info']['domain'] . "\n";
            echo "Giá: " . $data['info']['gia'] . "\n";
            echo "IP: " . $data['info']['ip'] . "\n";
            echo "Trạng thái host: " . $data['info']['trangthai'] . "\n";
            echo "Ngày hết hạn cũ: " . date('Y-m-d H:i:s', $data['info']['exp']) . "\n";
            echo "Ngày hết hạn mới: " . date('Y-m-d H:i:s', $data['info']['expnew']) . "\n";
        }
    } else {
        echo "Không có dữ liệu trả về hoặc dữ liệu không hợp lệ.";
    }
} else {
    echo 'Không thể kết nối hoặc lấy dữ liệu.';
}
?>
