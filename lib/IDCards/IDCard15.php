<?php
namespace Wei\Cards\IDCards;

/**
 * 15位身份证
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard15 extends IDCardBase{

    protected function validate()
    {
        return $this->len == IDCardType::BIT_15 ? true : false;
    }


    protected function setBirthday()
    {
        $birthday[] = '19'.substr($this->idCard, 6, 2);
        $birthday[] = substr($this->idCard, 8, 2);
        $birthday[] = substr($this->idCard, 10, 2);
        $this->birthday = implode("-", $birthday);
    }

    protected function setSex()
    {
        $sex = substr($this->idCard, 14, 1);
        $this->sex = $sex%2 == 1 ? self::SEX_MALE : self::SEX_FEMALE;
    }

    protected function setType()
    {
        $this->type = IDCardType::BIT_15;
    }

    protected function setSequenceCode()
    {
        $this->sequenceCode = substr($this->idCard, 12, 3);
    }

    protected function setVerifyCode()
    {
        $this->verifyCode = "";
    }

    /**
     * 功能：把15位身份证转换成18位
     * @return newid or id
     */
    public function convertTo18() {
        $idCard = $this->idCard;
        // 若是15位，则转换成18位；否则直接返回ID
        $W = array (7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2,1 );
        $A = array ("1","0","X","9","8","7","6","5","4","3","2");
        $s = 0;
        $idCard18 = substr ( $idCard, 0, 6 ) ."19". substr ( $idCard, 6 );
        $idCard18_len = strlen ( $idCard18 );
        for($i = 0; $i < $idCard18_len; $i ++) {
            $s = $s + substr ( $idCard18, $i, 1 ) * $W [$i];
        }
        $idCard18 .= $A [$s % 11];
        return $idCard18;

    }

}