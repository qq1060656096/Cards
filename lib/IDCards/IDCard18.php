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
        $birthday[] = substr($this->idCard, 6, 4);
        $birthday[] = substr($this->idCard, 10, 2);
        $birthday[] = substr($this->idCard, 12, 2);
        $this->birthday = implode("-", $birthday);
    }

    protected function setSex()
    {
        $sex = substr($this->idCard, 16, 1);
        $this->sex = $sex%2 == 1 ? self::SEX_MALE : self::SEX_FEMALE;
    }

    protected function setType()
    {
        $this->type = IDCardType::BIT_18;
    }

    protected function setSequenceCode()
    {
        $this->sequenceCode = substr($this->idCard, 14, 4);
    }

    protected function setVerifyCode()
    {
        $this->verifyCode = "";
    }

}