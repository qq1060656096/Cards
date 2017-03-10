<?php
namespace Wei\Cards\IDCards;

/**
 * 身份证解析
 * Class IDCard
 * @package Wei\Cards
 */
abstract class IDCardBase extends Base{
    /**
     * 男
     */
    const SEX_MALE = 1;
    /**
     * 女
     */
    const SEX_FEMALE = 0;
    /**
     * @var null 身份证
     */
    protected $idCard   = null;
    /**
     * @var null 省份
     */
    protected $province = null;
    /**
     * @var null 城市
     */
    protected $city     = null;
    /**
     * @var null 地区
     */
    protected $area     = null;
    /**
     * @var null 生日
     */
    protected $birthday = null;

    /**
     * @var null 性别
     */
    protected $sex      = null;

    /**
     * @var int 长度
     */
    protected $len      = 0;

    /**
     * @var null 类型
     */
    protected $type     = null;
    /**
     * @var string 顺序码
     */
    protected $sequenceCode = '';
    /**
     * @var string 校验码
     */
    protected $verifyCode   = '';

    protected function __construct($idCard)
    {
        $this->idCard = $idCard;
        $this->parse();
    }

    /**
     * 成功返回身份证解析类对象
     * @param string $idCard 身份证
     * @return null|IDCardBase
     */
    public static function instance($idCard){
        /* @var $obj IDCardBase */
        $class  = get_called_class();
        $obj    =  new $class($idCard);
        return $obj->validate() ? $obj : null;
    }

    /**
     * 验证身份证是否合法
     * @return bool
     */
    protected abstract function validate();
    /**
     * 解析
     * @see IDCardBase::setProvince()
     * @see IDCardBase::setCity()
     * @see IDCardBase::setArea()
     * @see IDCardBase::setBirthday()
     * @see IDCardBase::setSex()
     * @see IDCardBase::setLen()
     * @see IDCardBase::getSequenceCode()
     */
    protected function parse(){
        $this->setProvince();
        $this->setCity();
        $this->setArea();
        $this->setBirthday();
        $this->setSex();
        $this->setLen();
        $this->setType();
        $this->getSequenceCode();
        $this->setVerifyCode();
    }

    /**
     * @return null
     */
    public function getIdCard()
    {
        return $this->idCard;
    }


    /**
     * @return null
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * 设置省份
     */
    protected function setProvince()
    {
        $this->province = substr($this->idCard, 0, 2);
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * 设置城市
     */
    protected function setCity()
    {
        $this->city = substr($this->idCard, 2, 2);
    }

    /**
     * @return null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * 设置地区
     */
    protected function setArea($area)
    {
        $this->area = substr($this->idCard, 4, 2);
    }

    /**
     * @return string 获取出生日期
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * 设置生日
     */
    protected abstract function setBirthday();


    /**
     * @return null
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     *
     */
    protected abstract function setSex();

    /**
     * @return int
     */
    public function getLen()
    {
        return $this->len;
    }

    /**
     * 设置身份证长度
     */
    protected function setLen()
    {
        $this->len = strlen($this->idCard);
    }

    /**
     * @return null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 设置身份证类型
     */
    protected abstract function setType();

    /**
     * @return string
     */
    public function getSequenceCode()
    {
        return $this->sequenceCode;
    }

    /**
     * 设置顺序码
     */
    protected abstract function setSequenceCode();

    /**
     * @return string
     */
    public function getVerifyCode()
    {
        return $this->verifyCode;
    }

    /**
     * 设置验证码
     */
    protected abstract function setVerifyCode();


}