<?php

namespace Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

/**
 * 
 */
trait ArrayTrait_Array_Object
{
    // https://www.php.net/manual/zh/function.array-walk-recursive.php
    // 对数组中的每个成员递归地应用用户函数
    public function array_walk_recursive(callable $callback, mixed $arg = null)
    {
        $array = &$this->value;
        $res = array_walk_recursive($array, $callback, $arg);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-walk.php
    // 使用用户自定义函数对数组中的每个元素做回调处理
    public function array_walk(callable $callback, mixed $arg = null)
    {
        $array = $this->value;
        $res = array_walk($array, $callback, $arg);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.count.php
    // 统计数组、Countable 对象中所有元素的数量
    public function count( int $mode = COUNT_NORMAL)
    {
        $value = $this->value;
        $res = count($value, $mode);
        return $this->return($res);    
    }
    public function sizeof( int $mode = COUNT_NORMAL)
    {
        return $this->count($mode);
    }
    

}
