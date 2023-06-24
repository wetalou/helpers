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


    /**
     * 判断是否是https
     * @return bool
     */
    function isSSL() {
        if(!isset($_SERVER)) return false;
        if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 1 || $_SERVER['HTTPS'] === 'on')) {
            return true;
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){ //Nginx
            return true;
        }elseif(isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https'){
            return true;
        }else if(isset($_SERVER['HTTP_X_CLIENT_SCHEME']) && $_SERVER['HTTP_X_CLIENT_SCHEME'] == 'https'){
            return true;
        }elseif ($_SERVER['SERVER_PORT'] == 443) {
            return true;
        }

        return false;
    }
}
