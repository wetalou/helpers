<?php

// 引用page类文件，正常使用请用命名空间
require dirname(__DIR__) . "/src/Wetalou/Page.php";

$page = $_GET['page'] ?? 1;
$pageSize = $_GET['pageSize'] ?? 1;
$pageObj = new Page(25, $page);
$pageObj->setPageSize($pageSize);
echo $pageObj->getPageShow();