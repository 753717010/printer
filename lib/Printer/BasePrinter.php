<?php

namespace chengjien\Printer\Printer;

use chengjien\Exceptions\PrintException;
use chengjien\Printer\Config\BaseConfig;

/**
 * Class BasePrinter
 * @package sakura\Printer\Printer
 * @property BaseConfig $config
 */
abstract class BasePrinter
{
    protected $config;

    /**
     * @param string $data 打印内容
     * @param boolean $type 是否处理数据
     * @return mixed
     * @throws PrintException
     * 使用打印机打印
     */
    public function print($data, $type = false)
    {
        if ($type) {
            $data = $this->handle($data);
        }
        return $this->config->print($data);
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
            $value = $item['content'];
            if (isset($item['handleList'])) {
                foreach ($item['handleList'] as $handle) {
                    $getter = $handle['handle'];
                    $value = $this->$getter($value);
                }
            }
            $content .= $value;
        }
        return $content;
    }

    public function __call($method, $array)
    {
        $getter = 'get' . $method;
        if (method_exists($this, $getter)) {
            return $this->$getter($array[0]);
        } else {
            return $array;
        }
    }
}
