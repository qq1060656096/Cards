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
        $sex = substr($this->idCard, 12, 3);
        $this->sex = $sex%2 == 0 ? self::SEX_MALE : self::SEX_FEMALE;
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

}