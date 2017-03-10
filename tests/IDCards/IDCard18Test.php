<?php
namespace Wei\Cards\Tests\IDCards;


use Wei\Cards\IDCards\IDCard18;
use Wei\Cards\Tests\WeiTestCase;

/**
 * 15位身份证
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard18Test extends WeiTestCase {

    public function test(){
        $idCard = IDCard18::getInstance('511528197802015121');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("51", $idCard->getProvince());
        $this->assertEquals("15", $idCard->getCity());
        $this->assertEquals("28", $idCard->getArea());
        $this->assertEquals("1978-02-01", $idCard->getBirthday());
        $this->assertEquals("0", $idCard->getSex());
        $this->assertEquals("18", $idCard->getLen());
        $this->assertEquals("18", $idCard->getType());
        $this->assertEquals("5121", $idCard->getSequenceCode());
    }
}