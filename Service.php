<?php
/**
 * Created by PhpStorm.
 * User: vin
 * Date: 2018/10/31
 * Time: 下午3:58
 */

namespace Notadd\Product\Service;


class Service
{
    public function getService($module)
    {
        $class = __NAMESPACE__ . '\\' . $module . '\ServiceProvider';
        if(!class_exists($class)) throw new \Exception('this module is not exist');
        return new $class($module);
    }
}