<?php
/**
 * 页码打印类
 * Created by PhpStorm.
 * User: wetalou
 * Date: 2023/6/27
 * Time: 22:58
 */

namespace Wetalou;

class Page {

    private $total = 0;

    private $page = 1;

    private $pageNumShow = 10;

    private $pageSize = 20;

    private $pageCount = 1;

    private $pageKey = 'page';
    private $pageSizeKey = 'pageSize';

    public function __construct(int $total, int $page = 1) {
        if ($total < 0) {
            return;
        }

        $this->total = $total;
        $this->page = $page;
    }


    /**
     * 设置真正的页码
     */
    private function _setRealPage(){
        $this->pageCount = ceil($this->total/$this->pageSize);
        if ($this->pageCount < $this->page) {
            $this->page = $this->pageCount;
        }
    }


    /**
     * 设置每页数量
     * @param int $pageSize
     * @return bool
     */
    public function setPageSize(int $pageSize) {
        if ($pageSize < 1) {
            return false;
        }

        $this->pageSize = $pageSize;
        return true;
    }


    /**
     * 设置页码显示页数
     * @param int $pageNumShow
     * @return bool
     */
    public function setPageShow(int $pageNumShow) {
        if ($pageNumShow < 1) {
            return false;
        }

        $this->pageNumShow = $pageNumShow;
        return true;
    }


    /**
     * 设置页码和每页数的key
     * @param string $pageKey
     * @param string $pageSizeKey
     */
    public function setPageKey(string $pageKey, string $pageSizeKey) {
        if (!empty($pagekey)) {
            $this->pageKey = $pageKey;
        }

        if (!empty($pageSizeKey)) {
            $this->pageSizeKey = $pageSizeKey;
        }
    }


    /**
     * 获取展示的页码
     * @return array
     */
    private function _getShowPageNumArr() {
        $pageStart = 1;
        $pageHalf = ceil($this->pageNumShow/2);
        if ($this->page > $pageHalf) {
            // 如果后面部分少于一半
            if ($this->pageCount - $this->page < $pageHalf - 1) {
                $pageStart = $this->pageCount - $this->pageNumShow + 1;
                if ($pageStart < 1) {
                    $pageStart = 1;
                }
            } else {
                $pageStart = $this->page - $pageHalf;
            }
        }

        $num = 0;
        $res = [];
        while ($num < $this->pageNumShow && $pageStart <= $this->pageCount) {
            $res[] = $pageStart;

            $num++;
            $pageStart++;
        }

        return $res;
    }


    /**
     * 返回页码div
     * @return string
     */
    public function getPageShow(){
        $this->_setRealPage();
        if ($this->pageCount == 0) {
            return '';
        }

        $str = '<div>';
        $style = "style=\"padding:0 10px;\"";
        $styleHighLight = "style=\"padding:0 10px;color:green;\"";
        $pageParamStr = "{$this->pageSizeKey}={$this->pageSize}&{$this->pageKey}";

        // 首页必然存在
        $str .= "<a {$style} href='?{$pageParamStr}=1'>首页</a>";

        // 像百度页码，只显示10个
        $pageNumArr = $this->_getShowPageNumArr();
        foreach ($pageNumArr as $page) {
            // 当前页高亮
            if ($this->page == $page) {
                $str .= "<a {$styleHighLight} href='?{$pageParamStr}={$page}'>{$page}</a>";
            } else {
                $str .= "<a {$style} href='?{$pageParamStr}={$page}'>{$page}</a>";
            }
        }

        $str .= "<a {$style} href='?{$pageParamStr}={$this->pageCount}'>尾页</a>";
        $str .= '</div>';

        return $str;
    }
}
