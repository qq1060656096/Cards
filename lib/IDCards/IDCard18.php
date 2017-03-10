<?php
namespace Wei\Cards\IDCards;

/**
 * 18位身份证
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard18 extends IDCardBase{

    protected function validate()
    {
        return $this->len == IDCardType::BIT_18 ? true : false;
    }

    protected function setBirthday()
    {
        $birthday[] = substr($this->idCard, 7, 4);
        $birthday[] = substr($this->idCard, 11, 2);
        $birthday[] = substr($this->idCard, 13, 2);
        $this->birthday = implode("-", $birthday);
    }

    protected function setSex()
    {
        $sex = substr($this->idCard, 17, 1);
        $this->sex = $sex%2 == 0 ? self::SEX_MALE : self::SEX_FEMALE;
    }

    protected function setType()
    {
        $this->type = IDCardType::BIT_15;
    }

    protected function setSequenceCode()
    {
        $this->sequenceCode == substr($this->idCard, 15, 4);
    }

    protected function setVerifyCode()
    {
        $this->verifyCode = "";
    }

}