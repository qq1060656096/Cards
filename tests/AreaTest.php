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
        $idCard = IDCard15::getInstance('110103990101443');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("03", $idCard->getArea());
        $result = Area::getProvince($idCard->getProvince());
        $this->assertEquals("北京市", $result['name']);

        $result = Area::getProvince($idCard->getCity());
        $this->assertEquals("市辖区", $result['name']);

        $result = Area::getProvince($idCard->getArea());
        $this->assertEquals("北京市", $result['name']);
    }
}