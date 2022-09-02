<?php

namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

/**
 * array()  移除
 * list() 移除 这是语言结构, 而且对数组用 list 也没办法给赋值
 */
trait ArrayStaticTrait_Oarray
{
    // https://www.php.net/manual/zh/function.array-fill.php
    // 用给定的值填充数组
    static public function array_fill(int $start_index, int $count, mixed $value)
    {
        $res = array_fill($start_index, $count, $value);
        return static::new()->return($res);
    }
    // https://www.php.net/manual/zh/function.array-multisort.php
    // 对多个数组或多维数组进行排序
    static function array_multisort(array &$array1, mixed $array1_sort_order = SORT_ASC, mixed $array1_sort_flags = SORT_REGULAR, mixed ...$rest)
    {
        $res = array_multisort($array1, $array1_sort_order, $array1_sort_flags,  ...$rest);
        return static::new()->return($res);
    }
    // https://www.php.net/manual/zh/function.compact.php
    // 建立一个数组，包括变量名和它们的值
    public function compact(array|string $var_name, array|string ...$var_names)
    {
        $thisValueValue = $this->value;
        $res = compact($var_name, ...$var_names);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.range.php
    // 根据范围创建数组，包含指定的元素
    static public function range(string|int|float $start, string|int|float $end, int|float $step = 1)
    {
        $res = range($start, $end, $step);
        return static::new()->return($res);    
    }
    

}
