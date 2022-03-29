<?php

/**
 * 调试打印函数
 * @param mixed ...$args
 */
if (!function_exists('p'))
{
    function p(...$args) {
        echo '<pre>';
        foreach ($args as $item) {
            print_r($item);
            echo '<br/>';
        }
        echo '</pre>';
    }
}


/**
 * 获取微妙数，秒数保留四位数
 * @return int
 */
if (!function_exists('myMicroTime'))
{
    function myMicroTime()
    {
        return intval(microtime(true)*1000)%1000000;
    }
}