<?php
namespace Wei\Cards\Tests;

/**
 * 地区代码解析
 *
 * Class AreaCodeParseTest
 * @package Wei\Cards\Tests
 */
class AreaCodeParseTest extends WeiTestCase{
    /**
     * 地区代码解析
     * 解析的内容放入 放入当前目录下area-code.txt
     * 解析后json 放入当前目录下area-code.json
     */
    public function test(){
        $text = file_get_contents(__DIR__.'/area-code.txt');
        $arr = explode("\n", $text);
        $areaArr = [];
        $oldProvince = 0;
        $nowProvince = 0;

        $oldCity = 0;
        $nowCity = 0;

        $oldArea = 0;
        $nowArea = 0;

        foreach ($arr as $key => &$row) {
            $row = trim($row);
            $row = preg_split("/\s{5,}/", $row);
            if ($row) {
                $row[0] = trim(str_replace("　","", $row[0]));
                $row[1] = trim(str_replace("　","", $row[1]));
                if(empty($row[0]) || empty($row[1])){
                    continue;
                }
                list($province, $city, $area) = str_split($row[0], 2);
                $province = "$province";
                $city = "$city";
                $area = "$area";
                if ($nowProvince !== $province) {
                    $oldProvince = $nowProvince;
                    $nowProvince = $province;
                    $areaArr["$province"] = [
                        'id' => $province,
                        'name' => $row[1],
                        'items' => [],
                    ];
                }

                if ($nowCity !== $city) {
                    $oldCity = $nowCity;
                    $nowCity = $city;
                    $areaArr["$province"]['items']["$city"] = [
                        'id' => $city,
                        'name' => $row[1],
                        'items' => [],
                    ];
                }

                if ($nowArea !== $area) {
                    $oldArea = $area;
                    $nowArea = $city;
                    $areaArr["$province"]['items']["$city"]['items']["$area"] = [
                        'id' => $area,
                        'name' => $row[1],
                    ];
                }
            }
        }

        file_put_contents(__DIR__.'/area-code.json', json_encode($areaArr));
    }
}