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
$printer = new \sakura\Printer\Printer\FeiePrinter([
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
]);

// 使用自定义样式进行打印
$config = new \sakura\Printer\Config\FeieConfig([
    'sn' => 1,
    'key' => 2,
    'time' => 1,
    'user' => 1,
    'ukey' => 1,
]);
$config->print("<CB>测试打印</CB><BR>");