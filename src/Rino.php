<?php
namespace Marstormad\Rino;
class Rino
{
    static public function new($value)
    {
        $res =  Ostr::new()->return($value) ;
        if(! $res instanceof Interfaces\OseriesInterface)
        {
            throw new \TypeError('不支持该数据类型');
        }
        return $res;
    }
}