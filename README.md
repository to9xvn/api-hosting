# api-hosting

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
https://webapi.dailysieure.com/dichvu/api-hosting/gia.html?email=admin
```
kết quả trả về dạng 
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
