<?php

class MoiSkladApi {
    private static $url = "https://online.moysklad.ru/exchange/rest/ms/xml/CustomEntity/list/?"; //url для запроса справочника
    private static $login = "admin@440807"; //логин
    private static $password = "80d404f6d05e"; //пароль
    private static $pos = ''; //позиция для нахеждения строки в подстроке
    private static $uuid = ''; //уникальный идентификатор города
    private static $data = array(
        "uuid"  => "c10606014-2931-11e4-686d-002590a28eca",
        "value" => '',
        "type"  => "entity"
        ); //массив для хранения параметров подстроки в строке

    public static function MoySkladCity($city) {
            $val = self::MoySkladGetUuidArray('start=0&count=1000', $city);
            if ($val[0]["pos"] === false) {
                $val = self::MoySkladGetUuidArray('start=1000&count=1000', $city);
                if ($val[0]["pos"] === false) {
                    $val = self::MoySkladGetUuidArray('start=2000&count=1000', $city);
                    if ($val[0]["pos"] === false) {
                        $val = self::MoySkladGetUuidArray('start=3000&count=1000', $city);
                        if ($val[0]["pos"] === false) {
                            $val = self::MoySkladGetUuidArray('start=4000&count=1000', $city);
                            if ($val[0]["pos"] === false) {
                                if(self::$data["value"]!="") {
                                    $city_arr = self::$data;
                                } else {
                                    $city_arr = array();
                                }
                            } else {
                                $city_arr = self::printMoySlkadCity($val);
                            }
                        } else {
                            $city_arr = self::printMoySlkadCity($val);
                        }
                    } else {
                        $city_arr = self::printMoySlkadCity($val);
                    }
                } else {
                    $city_arr = self::printMoySlkadCity($val);
                }
            } else {
                $city_arr = self::printMoySlkadCity($val);
            }
        return $city_arr;
    }

    public static function  MoySkladNormalizeCityName($city) {
        return trim(str_replace(array('г.','"'),'',ucfirst(strtolower($city))));
    }
    private static function MoySkladGetUuidArray($param, $city) {
        $pos = false;
        $out = self::curlMoySklad(self::$url.$param, self::$login, self::$password);
        preg_match_all("~name=(.*?)updated=~",$out,$preg);
        preg_match_all("~<uuid>(.*?)</uuid>~",$out,$preg_uuid);

        foreach($preg[1] as $key=>$arr) {
            self::$pos = strpos($arr,$city);
            if(self::MoySkladNormalizeCityName($arr) == $city) {
                self::$uuid = $preg_uuid[1][$key];
                $pos = true;
                break;
            }
            if(self::$pos !== false) {
                self::$data = array(
                        "uuid"  => "c10606014-2931-11e4-686d-002590a28eca",
                        "value" => $preg_uuid[1][$key],
                        "type"  => "entity"
                );
            }
        }
        $data[] = array(
            "pos"       => $pos,
            "uuid"      => self::$uuid,
        );
        return $data;
    }

    private static function printMoySlkadCity($val) {
        if($val[0]['uuid'] != "") {
            $data[] = array(
                "uuid"  => "c10606014-2931-11e4-686d-002590a28eca",
                "value" => $val[0]['uuid'],
                "type"  => "entity"
            );
            return $data[0];
        }
    }

    private static function curlMoySklad($url) {
        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_USERPWD, self::$login . ':' . self::$password);
            $out = curl_exec($curl);
            curl_close($curl);
        }
        return $out;
    }

}