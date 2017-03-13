<?php
namespace Wei\Cards\Tests\IDCards;


use Wei\Cards\IDCards\IDCard;
use Wei\Cards\IDCards\IDCard15;
use Wei\Cards\IDCards\IDCard18;
use Wei\Cards\Tests\WeiTestCase;

/**
 * 获取身份证实例
 * Class IDCard
 * @package Wei\Cards
 */
class IDCardTest extends WeiTestCase {
    /**
     * 测试18位身份证
     */
    public function testIDCard18(){
        $idCard = IDCard::getInstance('110103199901013302');
        $this->assertEquals(IDCard18::class, get_class($idCard));
    }

    /**
     * 测试15位身份证
     */
    public function testIDCard15(){
        $idCard = IDCard::getInstance('110103990101330');
        $this->assertEquals(IDCard15::class, get_class($idCard));
    }

    /**
     * 测试错误的身份证
     */
    public function testErrorIDCard(){
        $idCard = IDCard::getInstance('11010399010133');
        $this->assertNull(null, get_class($idCard));
    }
}