<?php
namespace Wei\Cards\Tests;

use Wei\Cards\Area;
use Wei\Cards\IDCards\IDCard15;

/**
 * 地区测试
 * Class AreaTest
 * @package Wei\Cards\Tests
 */
class AreaTest extends WeiTestCase
{

    /**
     * 测试获取地区信息
     */
    public function test(){
        $idCard = IDCard15::getInstance('110105990101443');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("05", $idCard->getArea());
        // 获取省份信息
        $result = Area::getProvince($idCard->getProvince());
        $this->assertEquals("北京市", $result['name']);
        // 获取城市信息
        $result = Area::getCity($idCard->getProvince(), $idCard->getCity());
        $this->assertEquals("市辖区", $result['name']);
        // 获取地区信息
        $result = Area::getArea($idCard->getProvince(), $idCard->getCity(), $idCard->getArea());
        $this->assertEquals("朝阳区", $result['name']);
    }

    public function test2()
    {
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
    }
}