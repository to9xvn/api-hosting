<?php
$email = "your_email@gmail.com";
$key = "your_api_key";
$tenmien = "domain.com";
$goi = "VN1";

$url = "https://dailysieure.net/dichvu/api-hosting/mua.html?email=$email&key=$key&tenmien=$tenmien&goi=$goi";

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

// Xử lý dữ liệu trả về
if ($response !== false) {
    $data = json_decode($response, true);

    if (isset($data['status'])) {
        if ($data['status'] == "2") {
            echo "Mua host thành công. Thông tin host:\n";
            echo "Tài khoản: " . $data['info']['tk'] . "\n";
            echo "Mật khẩu: " . $data['info']['mk'] . "\n";
            echo "Giá: " . $data['info']['gia'] . "\n";
            echo "Địa chỉ IP: " . $data['info']['ip'] . "\n";
            echo "Transaction ID: " . $data['info']['tranid'] . "\n";
            echo "Thời gian hết hạn: " . date("Y-m-d H:i:s", $data['info']['exp']) . "\n";
        } elseif ($data['status'] == "1") {
            echo "Thất bại: " . $data['msg'] . "\n";
        } else {
            echo "Trạng thái không xác định: " . $data['status'] . "\n";
        }
    } else {
        echo "Không có dữ liệu trả về hoặc dữ liệu không hợp lệ.";
    }
} else {
    echo 'Không thể kết nối hoặc lấy dữ liệu.';
}
?>
