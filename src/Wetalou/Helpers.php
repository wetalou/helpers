<?php
/**
 * 辅助函数
 * Created by PhpStorm.
 * User: wetalou
 * Date: 2022/3/26
 * Time: 22:58
 */

namespace Wetalou;

class Helper
{
    /**
     * 调试打印函数
     * @param mixed ...$args
     */
    public static function p(...$args) {
        echo '<pre>';
        foreach ($args as $item) {
            print_r($item);
            echo '<br/>';
        }
        echo '</pre>';
    }


    /**
     * 获取微妙数，秒数保留四位数
     * @return int
     */
    function myMicroTime()
    {
        return intval(microtime(true)*1000)%1000000;
    }
}
