<?php
namespace Wei\Cards\Tests\IDCards;


use Wei\Cards\IDCards\IDCard;
use Wei\Cards\IDCards\IDCard18;
use Wei\Cards\IDCards\IDCardBase;
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

    /**
     * 测试男性身份证
     */
    public function testMale(){
        $idCard = IDCard18::getInstance('110103199901014436');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("03", $idCard->getArea());
        $this->assertEquals("1999-01-01", $idCard->getBirthday());
        $this->assertEquals(IDCardBase::SEX_MALE, $idCard->getSex());
        $this->assertEquals("18", $idCard->getLen());
        $this->assertEquals("18", $idCard->getType());
        $this->assertEquals("4436", $idCard->getSequenceCode());
    }

    /**
     * 测试女性身份证
     */
    public function testFemale(){
        $idCard = IDCard18::getInstance('110103199901013302');
        $this->assertTrue($idCard ? true : false);
        $this->assertEquals("11", $idCard->getProvince());
        $this->assertEquals("01", $idCard->getCity());
        $this->assertEquals("03", $idCard->getArea());
        $this->assertEquals("1999-01-01", $idCard->getBirthday());
        $this->assertEquals(IDCardBase::SEX_FEMALE, $idCard->getSex());
        $this->assertEquals("18", $idCard->getLen());
        $this->assertEquals("18", $idCard->getType());
        $this->assertEquals("3302", $idCard->getSequenceCode());
    }

    /**
     * 测试18位身份证转15位
     */
    public function testConvertTo15(){
        $idCard = IDCard18::getInstance('110103199901013302');
        $idCard15 = $idCard->convertTo15();
        $this->assertEquals($idCard15, "110103990101330");
    }
}