

# api mua host
gửi request tới link bên dưới và thay email và key api của bạn
```
https://dailysieure.net/dichvu/api-hosting/mua.html?email=admin@gmail.com&key=123123&tenmien=domain.com&goi=VN1
```
 status trả về 2 là thành công, 1 là thất bại.

kết quả trả về nếu thành công  
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

# api tra cứu thông tin host đã mua qua API
API NÀY SẼ GIÚP BẠN CHECK ĐƯỢC HOST TẠO CÓ LỖI HAY KHÔNG
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
trong đó trangthai sẽ cho biết trạng thái khoá hay hoạt động của host. `"trangthai": "1"` là đang hoạt động, 3 là bị xoá vĩnh viễn, 5 là chờ reset, 6 là đã hoàn tiền, 2 là đang tạm khoá do hết hạn hoặc vi phạm điều khoản, nếu vi phạm thì `"noidung"` sẽ có ghi. 


