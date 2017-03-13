<?php
namespace Wei\Cards\Tests\IDCards;

use Wei\Cards\IDCards\IDCard15;
use Wei\Cards\IDCards\IDCardBase;
use Wei\Cards\Tests\WeiTestCase;

/**
 * 15位身份证
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard15Test extends WeiTestCase {

    /**
     * 测试男性身份证
     */
    public function testMale(){
        $idCard = IDCard15::getInstance('110103990101443');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("03", $idCard->getArea());
        $this->assertEquals("1999-01-01", $idCard->getBirthday());
        $this->assertEquals(IDCardBase::SEX_MALE, $idCard->getSex());
        $this->assertEquals("15", $idCard->getLen());
        $this->assertEquals("15", $idCard->getType());
        $this->assertEquals("443", $idCard->getSequenceCode());
    }

    /**
     * 测试女性身份证
     */
    public function testFemale(){
        $idCard = IDCard15::getInstance('110103990101330');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("03", $idCard->getArea());
        $this->assertEquals("1999-01-01", $idCard->getBirthday());
        $this->assertEquals(IDCardBase::SEX_FEMALE, $idCard->getSex());
        $this->assertEquals("15", $idCard->getLen());
        $this->assertEquals("15", $idCard->getType());
        $this->assertEquals("330", $idCard->getSequenceCode());
    }

    /**
     * 测试15位身份证转18位
     */
    public function testConvertTo18(){
        $idCard = IDCard15::getInstance('110103990101330');
        $idCard15 = $idCard->convertTo18();
        $this->assertEquals($idCard15, "110103199901013302");
    }
}