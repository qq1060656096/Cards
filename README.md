# Cards
身份证号码信息解析

### 身份证解析使用

```php
//成功返回对象失败返回null
$idCard = IDCard::getInstance('身份证号码');
```

### 单元测试使用
> --bootstrap 在测试前先运行一个 "bootstrap" PHP 文件
* **--bootstrap引导测试:** phpunit --bootstrap ./tests/TestInit.php ./tests/