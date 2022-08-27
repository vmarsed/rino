<?php

namespace Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

/**
 * array_combine 拆成 array_combine_keys 和 array_combine_values
 * array_keys 拆成 array_keys_all 和 array_keys_contains
 * pos 移除 他是 current 的别名
 * 以下函数 false 改成 true , 现在默认会保持键名
 *      array_reverse
 *      array_slice   
 */
trait ArrayTrait_Array
{
    // https://www.php.net/manual/zh/function.array-change-key-case.php
    // 将数组中的所有键名修改为全大写或小写
    public function array_change_key_case(int $case = CASE_LOWER)
    {
        $array = $this->value;
        $res = array_change_key_case($array, $case);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-chunk.php
    // 将一个数组分割成多个
    public function array_chunk(int $length, bool $preserve_keys = false)
    {
        $array = $this->value;
        $res = array_chunk($array, $length, $preserve_keys);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-column.php
    // 返回输入数组中指定列的值
    public function array_column(int|string|null $column_key, int|string|null $index_key = null)
    {
        $array = $this->value;
        $res = array_column($array, $column_key, $index_key);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-combine.php
    // 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
    public function array_combine_values(array $values)
    {
        $keys = $this->value;
        $res = array_combine($keys, $values);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-combine.php
    // 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
    public function array_combine_keys(array $keys)
    {
        $values = $this->value;
        $res = array_combine($keys, $values);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-count-values.php
    // 统计数组中所有的值
    public function array_count_values()
    {
        $array = $this->value;
        $res = array_count_values($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-diff-assoc.php
    // 带索引检查计算数组的差集
    public function array_diff_assoc(...$arrays)
    {
        $array = $this->value;
        $res = array_diff_assoc($array, ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-diff-key.php
    // 使用键名比较计算数组的差集
    public function array_diff_key(...$arrays)
    {
        $array = $this->value;
        $res = array_diff_key($array,  ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-diff-uassoc.php
    // 用用户提供的回调函数做索引检查来计算数组的差集
    // 参数顺序改变, 因为提示只有最后一个参数才可以是可变参数
    public function array_diff_uassoc(...$arrays999___keyCallback)
    {
        $array = $this->value;
        $res = array_diff_uassoc($array,  ...$arrays999___keyCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-diff-ukey.php
    // 用回调函数对键名比较计算数组的差集
    public function array_diff_ukey(...$arraysAndCallback)
    {
        $array = $this->value;
        $res = array_diff_ukey($array, ...$arraysAndCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-diff.php
    // 计算数组的差集
    public function array_diff(...$arrays)
    {
        $array = $this->value;
        $res = array_diff($array,  ...$arrays);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-fill-keys.php
    // 使用指定的键和值填充数组
    public function array_fill_keys(mixed $value)
    {
        $keys = $this->value;
        $res = array_fill_keys($keys, $value);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-filter.php
    // 使用回调函数过滤数组的元素
    public function array_filter(?callable $callback = null, int $mode = 0)
    {
        $array = $this->value;
        $res = array_filter($array, $callback, $mode);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-flip.php
    // 交换数组中的键和值
    public function array_flip()
    {
        $array = $this->value;
        $res = array_flip($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-intersect-assoc.php
    // 带索引检查计算数组的交集
    public function array_intersect_assoc(array ...$arrays)
    {
        $array = $this->value;
        $res = array_intersect_assoc($array,  ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-intersect-key.php
    // 使用键名比较计算数组的交集
    public function array_intersect_key(array ...$arrays)
    {
        $array = $this->value;
        $res = array_intersect_key($array,  ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-intersect-uassoc.php
    // 带索引检查计算数组的交集，用回调函数比较索引
    public function array_intersect_uassoc(array ...$arraysAndCallback)
    {
        $array = $this->value;
        $res = array_intersect_uassoc($array,  ...$arraysAndCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-intersect-ukey.php
    // 在键名上使用回调函数来比较计算数组的交集
    public function array_intersect_ukey(array ...$arraysAndCallback)
    {
        $array = $this->value;
        $res = array_intersect_ukey($array,  ...$arraysAndCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-intersect.php
    // 计算数组的交集
    public function array_intersect(array ...$arrays)
    {
        $array = $this->value;
        $res = array_intersect($array,  ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-is-list.php
    // 判断给定的 array 是否为 list
    public function array_is_list()
    {
        $array = &$this->value;
        $res = array_is_list($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-key-exists.php
    // 检查数组里是否有指定的键名或索引
    public function array_key_exists(string|int $key)
    {
        $array = $this->value;
        $res = array_key_exists($key, $array);
        return $this->return($res);
    }
    // 别名
    public function key_exists(string|int $key)
    {
        return $this->array_key_exists($key);
    }
    // https://www.php.net/manual/zh/function.array-key-first.php
    // 获取指定数组的第一个键
    public function array_key_first()
    {
        $array = $this->value;
        $res = array_key_first($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-key-last.php
    // 获取一个数组的最后一个键值
    public function array_key_last()
    {
        $array = $this->value;
        $res = array_key_last($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-keys.php
    // 返回数组中部分的或所有的键名
    public function array_keys_all()
    {
        $array = $this->value;
        $res = array_keys($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-keys.php
    // 返回数组中部分的或所有的键名
    public function array_keys_contains(mixed $search_value, bool $strict = false)
    {
        $array = $this->value;
        $res = array_keys($array, $search_value, $strict);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-map.php
    // 为数组的每个元素应用回调函数
    public function array_map(?callable $callback, array ...$arrays)
    {
        $array = $this->value;
        $res = array_map($callback, $array,  ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-merge-recursive.php
    // 递归地合并一个或多个数组
    public function array_merge_recursive(array ...$arrays)
    {
        $array = $this->value;
        $res = array_merge_recursive($array, ...$arrays);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-merge.php
    // 合并一个或多个数组
    public function array_merge(array ...$arrays)
    {
        $array = $this->value;
        $res = array_merge($array, ...$arrays);
        return $this->return($res);
    }
    // public function mergeii(array ...$arrays){
    //     return $this->array_merge(...$arrays);
        
    //     for($i = 1; $i<count($arrays);$i++){
    //         while(count($arrays[$i])){
    //             array_push(
    //                 $arrays[0],
    //                 array_shift($arrays[$i])
    //             );
    //         }
    //     }

    // }
    // https://www.php.net/manual/zh/function.array-pad.php
    // 以指定长度将一个值填充进数组
    public function array_pad(int $length, mixed $value)
    {
        $array = $this->value;
        $res = array_pad($array, $length, $value);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-pop.php
    // 弹出数组最后一个单元（出栈）
    public function array_pop()
    {
        $array = &$this->value;
        $res = array_pop($array);
        return $this->return($res);
    }
    
    // https://www.php.net/manual/zh/function.array-product.php
    // 计算数组中所有值的乘积
    public function array_product()
    {
        $array = $this->value;
        $res = array_product($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-push.php
    // 将一个或多个单元压入数组的末尾（入栈）
    public function array_push(mixed $values)
    {
        $array = &$this->value;
        $res = array_push($array, ...$values);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-rand.php
    // 从数组中随机取出一个或多个随机键
    public function array_rand(int $num = 1)
    {
        $array = $this->value;
        $res = array_rand($array, $num);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-reduce.php
    // 用回调函数迭代地将数组简化为单一的值
    public function array_reduce(callable $callback, mixed $initial = null)
    {
        $array = $this->value;
        $res = array_reduce($array, $callback, $initial);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-replace-recursive.php
    // 使用传递的数组递归替换第一个数组的元素
    public function array_replace_recursive(array ...$replacements)
    {
        $array = $this->value;
        $res = array_replace_recursive($array,  ...$replacements);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-replace.php
    // 使用传递的数组替换第一个数组的元素
    public function array_replace(array ...$replacements)
    {
        $array = $this->value;
        $res = array_replace($array,  ...$replacements);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-reverse.php
    // 返回单元顺序相反的数组
    public function array_reverse(bool $preserve_keys = true)
    {
        $array = $this->value;
        $res = array_reverse($array, $preserve_keys);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-search.php
    // 在数组中搜索给定的值，如果成功则返回首个相应的键名
    public function array_search(mixed $needle, bool $strict = false)
    {
        $haystack = $this->value;
        $res = array_search($needle, $haystack, $strict);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-shift.php
    // 将数组开头的单元移出数组
    public function array_shift()
    {
        $array = &$this->value;
        $res = array_shift($array);
        return $this->return($res);
    }

    // https://www.php.net/manual/zh/function.array-slice.php
    // 从数组中取出一段
    public function array_slice(int $offset, ?int $length = null, bool $preserve_keys = true)
    {
        $array = $this->value;
        $res = array_slice($array, $offset, $length, $preserve_keys);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-splice.php
    // 去掉数组中的某一部分并用其它值取代
    public function array_splice(int $offset, ?int $length = null, mixed $replacement = [])
    {
        $array = &$this->value;
        $res = array_splice($array, $offset, $length, $replacement);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-sum.php
    // 对数组中所有值求和
    public function array_sum()
    {
        $array = $this->value;
        $res = array_sum($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-udiff-assoc.php
    // 带索引检查计算数组的差集，用回调函数比较数据
    public function array_udiff_assoc(array ...$arrays999___valueCallback)
    {
        $array = $this->value;
        $res = array_udiff_assoc($array,  ...$arrays999___valueCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-udiff-uassoc.php
    // 带索引检查计算数组的差集，用回调函数比较数据和索引
    public function array_udiff_uassoc(...$arrays999___valueCallback___keyCallback)
    {
        $array = $this->value;
        $res = array_udiff_uassoc($array,  ...$arrays999___valueCallback___keyCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-udiff.php
    // 用回调函数比较数据来计算数组的差集
    public function array_udiff(array ...$arrays999___valueCallback)
    {
        $array = $this->value;
        $res = array_udiff($array,  ...$arrays999___valueCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-uintersect-assoc.php
    // 带索引检查计算数组的交集，用回调函数比较数据
    public function array_uintersect_assoc(array ...$arrays999___valueCallback)
    {
        $array = $this->value;
        $res = array_uintersect_assoc($array,  ...$arrays999___valueCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-uintersect-uassoc.php
    // 带索引检查计算数组的交集，用单独的回调函数比较数据和索引
    public function array_uintersect_uassoc(array ...$arrays999___valueCallback___keyCallback)
    {
        $array1 = $this->value;
        $res = array_uintersect_uassoc($array1,  ...$arrays999___valueCallback___keyCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-uintersect.php
    // 计算数组的交集，用回调函数比较数据
    public function array_uintersect(array ...$arrays999___valueCallback)
    {
        $array = $this->value;
        $res = array_uintersect($array,  ...$arrays999___valueCallback);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-unique.php
    // 移除数组中重复的值
    public function array_unique(int $flags = SORT_STRING)
    {
        $array = $this->value;
        $res = array_unique($array, $flags);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-unshift.php
    // 在数组开头插入一个或多个单元
    public function array_unshift(mixed ...$values)
    {
        $array = &$this->value;
        $res = array_unshift($array,  ...$values);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.array-values.php
    // 返回数组中所有的值
    public function array_values()
    {
        $array = $this->value;
        $res = array_values($array);
        return $this->return($res);
    }


    // https://www.php.net/manual/zh/function.current.php
    // 返回数组中的当前值
    public function current()
    {
        $array = &$this->value;
        $res = current($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.end.php
    // 将数组的内部指针指向最后一个单元
    public function end()
    {
        $array = &$this->value;
        $res = end($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.next.php
    // 将数组中的内部指针向前移动一位
    public function next()
    {
        $array = &$this->value;
        $res = next($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.prev.php
    // 将数组的内部指针倒回一位
    public function prev()
    {
        $array = &$this->value;
        $res = prev($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.reset.php
    // 将数组的内部指针指向第一个单元
    public function reset()
    {
        $array = &$this->value;
        $res = reset($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.extract.php
    // 从数组中将变量导入到当前的符号表
    public function extract(int $flags = EXTR_OVERWRITE, string $prefix = "")
    {
        $array = &$this->value;
        $res = extract($array, $flags, $prefix);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.in-array.php
    // 检查数组中是否存在某个值
    public function in_array(mixed $needle, bool $strict = false)
    {
        $haystack = $this->value;
        $res = in_array($needle, $haystack, $strict);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.key.php
    // 从关联数组中取得键名
    public function key()
    {
        $array = $this->value;
        $res = key($array);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.shuffle.php
    // 打乱数组
    public function shuffle()
    {
        $array = &$this->value;
        $res = shuffle($array);
        return $this->return($res);
    }


    /** 排序函数 ***********************************************************************************************
     * 全部返回 $this 原来是返回 bool
     */




























    // https://www.php.net/manual/zh/function.arsort.php
    // 对数组进行降向排序并保持索引关系
    public function arsort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = arsort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.asort.php
    // 对数组进行升序排序并保持索引关系
    public function asort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = asort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.krsort.php
    // 对数组按照键名逆向排序
    public function krsort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = krsort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.ksort.php
    // 对数组根据键名升序排序
    public function ksort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = ksort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.natcasesort.php
    // 用“自然排序”算法对数组进行不区分大小写字母的排序
    public function natcasesort()
    {
        $array = &$this->value;
        $res = natcasesort($array);
        return $this->return($array);
    }

    // https://www.php.net/manual/zh/function.natsort.php
    // 用“自然排序”算法对数组排序
    public function natsort()
    {
        $array = &$this->value;
        $res = natsort($array);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.rsort.php
    // 对数组降序排序
    public function rsort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = rsort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.sort.php
    // 对数组升序排序
    public function sort(int $flags = SORT_REGULAR)
    {
        $array = &$this->value;
        $res = sort($array, $flags);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.uasort.php
    // 使用用户自定义的比较函数，保持索引和值的对应关系，原地排序 array。
    public function uasort(callable $callback)
    {
        $array = &$this->value;
        $res = uasort($array, $callback);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.uksort.php
    // 使用用户自定义的比较函数对数组中的键名进行排序
    public function uksort(callable $callback)
    {
        $array = &$this->value;
        $res = uksort($array, $callback);
        return $this->return($array);
    }
    // https://www.php.net/manual/zh/function.usort.php
    // 使用用户自定义的比较函数对数组中的值进行排序
    public function usort(callable $callback)
    {
        $array = &$this->value;
        $res = usort($array, $callback);
        return $this->return($array);
    }
}
