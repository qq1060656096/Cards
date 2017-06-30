<?php
namespace Wei\Cards;

/**
 * 地区操作
 *
 * Class Area
 * @package Wei\Cards
 */
class Area
{
    /**
     * 地区数据
     * @return mixed
     */
    public static function getData()
    {
        static $areaArr = null;
        if ($areaArr === null) {
            $areaArr = json_decode(file_get_contents(__DIR__.'/area-code.json'), true);
        }
        return $areaArr;
    }

    /**
     * 获取身份信息
     * @param $provinceCode
     * @return array
     */
    public static function getProvince($provinceCode)
    {
        return isset(self::getData()[$provinceCode]) ? self::getData()[$provinceCode] : [];
    }

    /**
     * 获取城市信息
     *
     * @param string $provinceCode 身份代码
     * @param string $cityCode 城市代码
     * @return array
     */
    public static function getCity($provinceCode, $cityCode)
    {
        return isset(self::getProvince($provinceCode)['items']["$cityCode"]) ? self::getProvince($provinceCode)['items']["$cityCode"] : [];
    }

    /**
     * 获取地区信息
     *
     * @param string $provinceCode 身份代码
     * @param string $cityCode 城市代码
     * @param string $areaCode 地区代码
     * @return array
     */
    public static function getArea($provinceCode, $cityCode, $areaCode)
    {
        return isset(self::getCity()['items']["$areaCode"]) ? self::getCity()['items']["$areaCode"] : [];
    }
}