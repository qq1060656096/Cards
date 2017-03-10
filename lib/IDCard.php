<?php
namespace Wei\Cards;

/**
 * 身份证解析
 * Class IDCard
 * @package Wei\Cards
 */
class IDCard extends Base{
    /**
     * 男
     */
    const SEX_MALE = 1;
    /**
     * 女
     */
    const SEX_FEMALE = 0;

    protected $idCard = '';
    protected $birthday = '';
    protected $sex = null;

    public function getInstance($idCard){
        $obj = new IDCard();
        $obj->parse($idCard);
        return $obj;
    }

    public function parse($idCard){

    }

    /**
     * @return string
     */
    public function getBirthday(){
        return $this->birthday;
    }

    /**
     * 返回性别
     * @return string 性别
     * @see IDCard::SEX_MALE
     * @see IDCard::SEX_FEMALE
     */
    public function getSex(){
        return $this->sex;
    }

    /**
     * 获取校验码
     */
    public function getVerifyCode(){
        $code = '';
        return $code;
    }

}