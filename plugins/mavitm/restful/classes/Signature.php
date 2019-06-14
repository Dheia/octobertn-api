<?php
/**
 * Created by PhpStorm.
 * User: xubuntu2045
 * Date: 07.05.2018
 * Time: 11:03
 */

namespace Mavitm\Restful\Classes;

use October\Rain\Support\Traits\Singleton;

class Signature
{

    use Singleton;

    /**
     * user secret degeri ve regues edilecek parametreler ile token olusturur
     * @param $userSecret
     * @param $arr
     * @return string
     */
    public function getSign($userSecret, $arr)
    {
        $exceptedParams = [
            'token',
            'auth',
            'channel',
            'clientId',
            'locale'
        ];

        $allParams = $arr;

        $separator = '';

        // 1. Remove excluded params
        $params = [];
        foreach ($allParams as $key => $value) {
            if (!in_array ($key, $exceptedParams)) {
                $params[$key] = $value;
            }
        }

        // 2. Sort!
        $this->mySort($params);

        // 3. Join as string
        $iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($params));
        $strParams = implode($separator, iterator_to_array($iterator));

        // 4. Calculate md5
        return md5($strParams . $userSecret);
    }

    /**
     * recursive
     * @param $array
     * @param int $sort_flags
     * @return bool
     */
    private function mySort(&$array, $sort_flags = SORT_REGULAR)
    {
        if (!is_array($array)) {
            return false;
        }

        ksort($array, $sort_flags);

        foreach ($array as &$arr) {
            $this->mySort($arr, $sort_flags);
        }
        return true;
    }


}