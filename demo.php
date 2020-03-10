<?php
/**
 * Created by PhpStorm.
 * User: 风哀伤
 * Date: 2020/3/7
 * Time: 16:02
 * @copyright: ©2019 浙江禾匠信息科技
 * @link: http://www.zjhejiang.com
 */
require('vendor/autoload.php');

// 使用预设置好的数组参数进行打印
$printer = new \Chengjien\Printer\PrinterClass();
$printer->setPrinter($printer::FEIE, [
    'sn' => 1,
    'key' => 2,
    'time' => 1,
    'user' => 1,
    'ukey' => 1,
]);
$printer->print([
    [
        'handle' => 'centerBold',
        'content' => '测试打印',
    ]
], true);

// 使用自定义样式进行打印
$printer->print("<CB>测试打印</CB><BR>", false);
