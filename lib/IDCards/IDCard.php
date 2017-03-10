<?php
namespace Wei\Cards\IDCards;

/**
 * 身份证实例类
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard extends IDCardBase{
    public static function getInstance($idCard){
        $obj = null;
        $len = strlen($idCard);
        switch ($len){
            case 15://1代身份证
                    $obj = new IDCard15($idCard);
                break;

            case 18://2代身份证
                    $obj = new IDCard18($idCard);
                break;
            default:
                break;
        }
        return $obj;
    }
}