# Overview
🔊 [공공데이터포털](https://data.go.kr)에서 제공하는 `서울특별시 버스도착정보조회` API를 사용하였습니다.

## Usage
1. 공공데이터포털 회원가입을 한다.
2. 로그인 후 [서울특별시 버스도착정보조회 서비스](https://www.data.go.kr/dataset/15000314/openapi.do)에서 활용신청을 한다.
3. 마이페이지에서 해당 서비스의 `서비스 키` 를 확인하여 세팅한다.
```php
private $serviceKey = 'YOUR SERVICEKEY';
```
4. 해당 정류장의 ID값을 세팅한다.
```php
public $stationId   = 'STATION ID';
```
5. 인스턴스 생성 후 본인의 입맛에 맞게 요리한다.
```php
$app    = new BusArrInfo();
// 정류장 ID setting
$app    = new BusArrInfo('YOUR STATIONID');
```

## License
MIT