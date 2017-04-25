# Cards
身份证号码信息解析

## 使用示例

```php
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


### 单元测试使用
> --bootstrap 在测试前先运行一个 "bootstrap" PHP 文件
* **--bootstrap引导测试:** phpunit --bootstrap ./tests/TestInit.php ./tests/
