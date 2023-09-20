

# api mua host
gửi request tới link bên dưới và thay email và key api của bạn
```
https://dailysieure.net/dichvu/api-hosting/mua.html?email=admin@gmail.com&key=123123&tenmien=domain.com&goi=VN1
```
 status trả về 2 là thành công, 1 là thất bại.  

kết quả trả về nếu thành công, hãy lưu lại giá trị `tranid` để sau này quản lý host của bạn!
```
{
  "status": "2",
  "msg": "Mua host thành công, chờ 1-5 phút để host kích hoạt!",
  "info": {
    "tk": "adomaincom",
    "mk": "AZ0PZt1641040305",
    "gia": "9000",
    "ip": "192.168.1.1",
    "tranid": "116951139865864",
    "exp": "1697705986"
  }
}
```

Kết quả trả về nếu thất bại 
```
{
  "status": "1",
  "msg": "Thông tin tích hợp API chưa chính xác!"
}
 ```



# api check các gói đang bán
gửi request tới link bên dưới và thay email của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/gia.html?email=admin@gmail.com
```
nếu thanh công, kết quả trả về dạng 
```
[
  {
    "goi": "VN1",
    "gia": "10000",
    "tinhtrang": "ON"
  },
  {
    "goi": "VN2",
    "gia": "20000",
    "tinhtrang": "OFF"
  }
]
```

# api tra cứu thông tin host đã mua
API NÀY SẼ GIÚP BẠN CHECK ĐƯỢC HOST TẠO CÓ LỖI HAY KHÔNG.  
gửi request tới link bên dưới và thay các thông tin của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/check.html?email=admin&key=123123&tranid=999999
```
nếu thành công, kết quả trả về dạng 
```
{
  "status": "2",
  "msg": "Tra cứu thành công!",
  "info": {
    "tk": "a1695186863",
    "domain": "domain.com",
    "gia": "10000",
    "ip": "103.153.64.233",
    "tranid": "116951868634721",
    "trangthai": "6",
    "noidung": "Host tạo bị lỗi do tên miền đã tồn tại trên hệ thống hoặc hệ thống bị lag. Hoàn tiền 10000 VND về tài khoản API.",
    "exp": "1697778863"
  }
}
```
trong đó những thứ quan trọng như `exp` sẽ cho ta biết ngày hết hạn, `trangthai` sẽ cho biết trạng thái khoá hay hoạt động của host. `"trangthai": "1"` là đang hoạt động, 3 là bị xoá vĩnh viễn, 5 là chờ reset, 6 là đã hoàn tiền, 2 là đang tạm khoá do hết hạn hoặc vi phạm điều khoản, nếu vi phạm thì `"noidung"` sẽ có ghi. 

# api gia hạn host
API NÀY SẼ GIÚP BẠN GIA HẠN HOST THÊM 30 NGÀY KỂ TỬ NGÀY HẾT HẠN.  
Lưu ý: Nếu host bị khoá do vi phạm thì sẽ không gia hạn được, và ngày hết hạn hiện tại phải còn dưới 10 ngày so với bây giờ!  
khi mở khoá host nếu host đang bị tạm khoá do hết hạn thì sẽ tự mở ra.  
gửi request tới link bên dưới và thay các thông tin của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/giahan.html?email=admin&key=123123&tranid=999999
```
nếu thành công, kết quả trả về dạng 
```
{
  "status": "2",
  "msg": "Đã gia hạn thành công thêm 30 ngày kể từ ngày hết hạn!",
  "info": {
    "tk": "a1695184940",
    "domain": "domain.com",
    "gia": "10000",
    "ip": "103.153.64.233",
    "tranid": "116951849407099",
    "trangthai": "2",
    "noidung": "",
    "exp": "1695183414",
    "expnew": "1697775414"
  }
}
```
trong đó những thứ quan trọng như `exp` sẽ cho ta biết ngày hết hạn cũ, `expnew` sẽ là ngày hết hạn mới!


# api reset host
API này sẽ giúp xoá host và tạo lại (giữ nguyên hạn sử dụng host).Chức năng này tạo ra để fix một số lỗi trong quá trình sử dụng host!  
gửi request tới link bên dưới và thay các thông tin của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/reset.html?email=admin&key=123123&tranid=999999
```
nếu thành công, kết quả trả về sẽ có dạng 
```
{
  "status": "2",
  "msg": "Đã tạo yêu cầu reset host, chờ 1 đến 10 phút để hệ thống xử lý!",
  "info": {
    "tk": "a1695184940",
    "domain": "domain.com",
    "gia": "10000",
    "ip": "103.153.64.233",
    "tranid": "116951849407099",
    "trangthai": "1",
    "noidung": "",
    "exp": "1697775414"
  }
}
```

# api reset mật khẩu của một host
API này sẽ giúp đặt lại mật khẩu host!  
gửi request tới link bên dưới và thay các thông tin của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/resetpassword.html?email=admin&key=123123&tranid=999999
```
nếu thành công, kết quả trả về sẽ có dạng 
```
{
  "status": "2",
  "msg": "Mật khẩu của bạn đã được reset, thông tin trong json info! Nếu vẫn không đăng nhập được bằng mật khẩu vừa reset, hãy thử reset lại lần nữa!",
  "info": {
    "tk": "a1695184940",
    "domain": "domain.com",
    "gia": "10000",
    "ip": "103.153.64.233",
    "tranid": "116951849407099",
    "trangthai": "1",
    "noidung": "",
    "newpassword": "AZa100536888"
  }
}
```

# api xoá hẳn host
API này sẽ giúp bạn xoá host để mua gói mới, tất nhiên điều này sẽ không được hoàn tiền!  
gửi request tới link bên dưới và thay các thông tin của bạn vào
```
https://dailysieure.net/dichvu/api-hosting/delete.html?email=admin&key=123123&tranid=999999
```
nếu thành công, kết quả trả về sẽ có dạng 
```
{
  "status": "2",
  "msg": "Host của bạn đã bị xoá thành công! Bạn không được hoàn tiền cho hành động này!"
}
```
