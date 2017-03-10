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
        $idCard18 = IDCard18::getInstance('511528197802015121');
        $this->assertTrue($idCard18 ? true : false);
        $this->assertEquals("51", $idCard18->getProvince());
        $this->assertEquals("15", $idCard18->getCity());
        $this->assertEquals("28", $idCard18->getArea());
        $this->assertEquals("1978-02-01", $idCard18->getBirthday());
        $this->assertEquals("0", $idCard18->getSex());
        $this->assertEquals("18", $idCard18->getLen());
        $this->assertEquals("18", $idCard18->getType());
        $this->assertEquals("5121", $idCard18->getSequenceCode());

    }
}