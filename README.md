# Cards
身份证号码信息解析

### 身份证号码信息解析示例

```php
<?php
use Wei\Cards\IDCards\IDCard;

//成功返回对象失败返回null
$idCard = IDCard::getInstance('身份证号码');

//18位身份证
//成功返回对象失败返回null
$idCard = IDCard::getInstance('110103199901013302');
if ($idCard) {
    print_r($idCard);
    // 省份
    echo $idCard->getProvince(),"\n";
    // 城市
    echo $idCard->getCity(),"\n";
    // 地区
    echo $idCard->getArea(),"\n";
    // 性别"0",1男,0女
    echo $idCard->getSex(),"\n";
    // 顺序码
    echo $idCard->getSequenceCode(),"\n";
    // 验证码
    echo $idCard->getVerifyCode(),"\n";
    // 转15位身份证"110103990101330"
    echo $idCard->convertTo15(),"\n";
}

//15位身份证
//成功返回对象失败返回null
$idCard = IDCard::getInstance('110103990101330');
if ($idCard) {
    print_r($idCard);
    // 省份
    echo $idCard->getProvince(),"\n";
    // 城市
    echo $idCard->getCity(),"\n";
    // 地区
    echo $idCard->getArea(),"\n";
    // 性别1男,0女
    echo $idCard->getSex(),"\n";
    // 顺序码
    echo $idCard->getSequenceCode(),"\n";
    // 验证码
    echo $idCard->getVerifyCode(),"\n";
    // 转18位身份证"110103199901013302"
    echo $idCard->convertTo18(),"\n";
}

```

### 根据身份证号码获取地区信息
```php
<?php
use Wei\Cards\Area;
use Wei\Cards\IDCards\IDCard15;

// 注意如果无法获取身份证地区信息,代表身份证号码是不合法的
$idCard     = IDCard15::getInstance('110105990101443');
// 获取省份信息
$province   = Area::getProvince($idCard->getProvince());
// 身份名
var_dump($province['name']);
// 获取城市信息
$city       = Area::getCity($idCard->getProvince(), $idCard->getCity());
// 城市名
var_dump($city['name']);
// 获取地区信息
$area       = Area::getArea($idCard->getProvince(), $idCard->getCity(), $idCard->getArea());
// 地区名
var_dump($area['name']);

```


### 单元测试使用
> --bootstrap 在测试前先运行一个 "bootstrap" PHP 文件
* **--bootstrap引导测试:** phpunit --bootstrap ./tests/TestInit.php ./tests/
### 生成地区代码json文件"area-code.json"
* **--bootstrap引导测试:** phpunit --bootstrap ./tests/TestInit.php ./tests/AreaCodeParseTest.php

phpunit --bootstrap ./tests/TestInit.php ./tests/AreaTest.php