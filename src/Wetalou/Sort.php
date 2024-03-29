<?php
/**
 * 排序算法
 * Created by PhpStorm.
 * User: wetalou
 * Date: 2022/3/26
 * Time: 22:58
 */

namespace Wetalou;

class Sort
{
    /**
     * 冒泡排序
     * @param $arr
     * @return mixed
     */
    public static function bubbleSort($arr)
    {
        $len = count($arr);
        for ($i=0; $i<$len-1; $i++) {
            for ($j=0; $j<$len-$i-1; $j++) {
                if ($arr[$j] > $arr[$j+1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }


    /**
     * 选择排序
     * @param $arr
     * @return mixed
     */
    public static function selectSort($arr)
    {
        $len = count($arr);
        for ($i=0; $i<$len - 1; $i++) {
            $indexMin = $i;
            for ($j=$i+1; $j<$len; $j++) {
                if ($arr[$j] < $arr[$indexMin]) {
                    $indexMin = $j;
                }
            }

            $tmp = $arr[$indexMin];
            $arr[$indexMin] = $arr[$i];
            $arr[$i] = $tmp;
        }
        return $arr;
    }

}