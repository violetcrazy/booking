<?php

namespace Common;

class Util {
    public function currencyFormat($number = 0){
        if (is_numeric($number)) {
            return number_format($number, 0, '.', ',');
        } else {
            return 0;
        }
    }
    public static function currencyFormatStatic($number = 0){
        if (is_numeric($number)) {
            return number_format($number, 0, '.', ',');
        } else {
            return 0;
        }
    }

    public function formatDat($timeTemp)
    {
        if (is_numeric($timeTemp)){
            return date('H:i d/m/Y', $timeTemp);
        } else {
            return '';
        }
    }

    public static function addQueryArg($data)
    {
        $get = $_GET;
        $get = array_merge($get, $data);

        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

        if (isset($get['_url'])) {
            $url .= $get['_url'];
            unset($get['_url']);
        }
        $url .= "?" . http_build_query($get);

        return $url;
    }

    public static function slug($string, $separator = '-')
    {
        $string = self::ascii($string);
        $string = trim(preg_replace('/[^a-zA-Z0-9]/', ' ', $string));
        $string = trim(preg_replace('/[\s]+/', ' ', $string));
        $string = trim(preg_replace('/\s/', $separator, $string));

        if ($string != '') {
            return strtolower($string);
        } else {
            return 'n-a';
        }
    }

    public static function curlPostJson($url, $post = array(), $timeout = 10)
    {
        $url = trim($url);
        if (is_array($post) && count($post)) {
            $data = json_encode($post);
        } else {
            $data = $post;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
        );

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function curlPost($url, $post = array(), $options = array())
    {
        $url = trim($url);
        if (is_array($post) && count($post)) {
            $data = http_build_query($post);
        } else {
            $data = $post;
        }

        $defaults = array(
            CURLOPT_POST => true,
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function curlGet($url, $get = array(), $options = array(), $timeout = 10)
    {
        $url = trim($url);

        if (is_array($get)) {
            if (count($get) > 0) {
                $url .= '?' . http_build_query($get);
            }
        }

        $defaults = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }

    public static function ascii($string)
    {
        $string = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $string);
        $string = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $string);
        $string = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $string);
        $string = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $string);
        $string = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $string);
        $string = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $string);
        $string = preg_replace('/(đ)/', 'd', $string);

        $string = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $string);
        $string = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $string);
        $string = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $string);
        $string = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $string);
        $string = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $string);
        $string = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $string);
        $string = preg_replace('/(Đ)/', 'D', $string);

        $string = trim($string);

        return $string;
    }

    public static function sendTele($text)
    {
        $url = 'https://api.telegram.org/bot343785720:AAEBOYvfVA5EmB3fDb8VAG_Dm6VJwyVtKPM/sendMessage?'. http_build_query(array(
            'chat_id' => '-234273662',
            'text' => 'Nuhoangsale: ' . $text
        ));

        self::curlGet($url);
    }
}
