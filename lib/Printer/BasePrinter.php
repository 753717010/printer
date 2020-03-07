<?php

namespace sakura\Printer\Printer;

use sakura\Exceptions\PrintException;
use sakura\Printer\Config\BaseConfig;

/**
 * Class BasePrinter
 * @package sakura\Printer\Printer
 * @property BaseConfig $config
 */
abstract class BasePrinter
{
    protected $config;

    /**
     * @param $data
     * @return mixed
     * @throws PrintException
     * 使用打印机打印
     */
    public function print($data)
    {
        $content = $this->handle($data);
        return $this->config->print($content);
    }

    /**
     * @param $data
     * @return string
     * 处理打印数据，将handle转发成具体的操作
     */
    public function handle($data)
    {
        $content = '';
        foreach ($data as $item) {
            if (isset($item['show']) && $item['show'] == 0) {
                continue;
            }
            $getter = $item['handle'];
            $value = $item['content'];
            if (isset($item['children'])) {
                $value .= $this->handle($item['children']);
            }
            $content .= method_exists($this, $getter) ? $this->$getter($value) : $value;
        }
        return $content;
    }
}