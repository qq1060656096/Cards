<?php
namespace Wei\Cards\IDCards;

/**
 * 身份证实例类
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard{

    /**
     * 根据身份证获取解析身份实例
     * @param string $idCard 身份证信息
     * @return null|IDCardBase|IDCard18|IDCard15
     */
    public static function getInstance($idCard){
        $obj = null;
        $len = strlen($idCard);
        switch ($len){
            case 15://1代身份证
                $obj = IDCard15::getInstance($idCard);
                break;

            case 18://2代身份证
                $obj = IDCard18::getInstance($idCard);
                break;
            default:
                break;
        }
        return $obj;
    }
}