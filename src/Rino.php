<?php
namespace Rino;
class Rino
{
    static public function new($value)
    {
        $res =  \Rino\Ostr::new()->return($value) ;
        if(! $res instanceof \Rino\Interfaces\OseriesInterface)
        {
            throw new \TypeError('不支持该数据类型');
        }
        return $res;
    }
}