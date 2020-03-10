<?php
/**
 * Created by PhpStorm.
 * User: 风哀伤
 * Date: 2020/3/10
 * Time: 14:01
 * @copyright: ©2019 浙江禾匠信息科技
 * @link: http://www.zjhejiang.com
 */

namespace chengjien\Printer;


use chengjien\Exceptions\PrintException;
use chengjien\Printer\Printer\BasePrinter;
use chengjien\Printer\Printer\FeiePrinter;

/**
 * Class PrinterClass
 * @package sakura\Printer
 * @property BasePrinter $printer
 */
class PrinterClass
{
    const FEIE = 'feie'; // 飞鹅打印机
    const KDT2 = 'kdt2'; // 365kdt2
    const YILIANYUN = 'yilianyun'; // 易联云打印机1.4.0接口
    const GP = 'gp'; // 佳博云打印(GP-5890XIII/GP-5890XIV)

    public $printer;

    private function getPrinter()
    {
        return [
            self::FEIE => FeiePrinter::class
        ];
    }

    /**
     * @param string $type 支持的打印机
     * @param array $config 打印机配置
     * @throws PrintException
     * 设置打印机
     */
    public function setPrinter($type, array $config)
    {
        $printerList = $this->getPrinter();
        if (!isset($printerList[$type])) {
            throw new PrintException('暂不支持的打印机' . $type);
        }
        $class = $printerList[$type];
        $this->printer = new $class($config);
    }

    /**
     * @param string|array $data 打印机内容
     * @param bool $type 是否需要处理数据
     * @throws PrintException
     * 使用打印机打印
     */
    public function print($data, $type = false)
    {
        $this->printer->print($data, $type);
    }
}
