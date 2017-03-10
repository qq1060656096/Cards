<?php
namespace Wei\Cards\Tests\IDCards;

use Wei\Cards\IDCards\IDCard15;
use Wei\Cards\Tests\WeiTestCase;

/**
 * 15位身份证
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard15Test extends WeiTestCase {

    public function test(){
        $idCard = IDCard15::getInstance('511528197802015');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("51", $idCard->getProvince());
        $this->assertEquals("15", $idCard->getCity());
        $this->assertEquals("28", $idCard->getArea());
        $this->assertEquals("1919-78-02", $idCard->getBirthday());
        $this->assertEquals("0", $idCard->getSex());
        $this->assertEquals("15", $idCard->getLen());
        $this->assertEquals("15", $idCard->getType());
        $this->assertEquals("015", $idCard->getSequenceCode());
    }
}