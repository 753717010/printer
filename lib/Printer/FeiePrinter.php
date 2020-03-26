<?php
/**
 * Created by PhpStorm.
 * User: 风哀伤
 * Date: 2020/3/4
 * Time: 17:05
 * @copyright: ©2019 浙江禾匠信息科技
 * @link: http://www.zjhejiang.com
 */

namespace chengjien\Printer\Printer;


use chengjien\Printer\Config\FeieConfig;

class FeiePrinter extends BasePrinter
{
    public function __construct($config)
    {
        $this->config = new FeieConfig($config);
    }

    public function getCenterBold($content)
    {
        return "<CB>{$content}</CB>";
    }

    public function getBR($content)
    {
        return "{$content}<BR>";
    }

    public function getB($content)
    {
        return "<B>{$content}</B>";
    }

    public function getDB($content)
    {
        return "<DB>{$content}</DB>";
    }
}
