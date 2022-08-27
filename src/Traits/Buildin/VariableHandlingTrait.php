<?php

namespace Rino\Traits\Buildin;

trait VariableHandlingTrait
{
    # #######################################################
    // PHP: Variable handling 函数 [🔗php.net](https://www.php.net/manual/zh/ref.var.php)
    /**
        ::类型转换
        boolval
        floatval
        doubleval
        intval
        strval
        settype
        serialize
        unserialize
        unset


        ::类型判断
        is_​array
        is_​bool
        is_​callable
        is_​countable
        is_​double
        is_​float
        is_​int
        is_​integer
        is_​iterable
        is_​long
        is_​null
        is_​numeric
        is_​object
        is_​real
        is_​resource
        is_​scalar
        is_​string
        isset
        empty
        // 自定义别名 isArray isSet isEmpty

        ::类型读取
        gettype
        get_​debug_​type 该功能不同于gettype()因为它返回的类型名称更符合实际使用情况，而不是那些因历史原因而存在的名称
        get_​resource_​id -- 移到 Oresource
        get_​resource_​type 移到 Oresource

        :: 移动到 reflectinyTrait
        get_​defined_​vars


        以下三上转到 outputTrait
        debug_​zval_​dump
        var_​dump
        var_​export
        print_​r
     */
    /** 类型转换函数 ***********************
     *  boolval
     *  floatval
     *  doubleval -- 移除
     *  intval
     *  strval
     *  settype
     *  serialize
     *  unserialize
     *  unset -- 移除  无法提供 不支持 unset($this) 也不建议显式调用析构函数,似乎没意义 同时如果一个 Ostr 对象里的 value 是 null 又不合理
     * isset
     * empty
     */
    // https://www.php.net/manual/zh/function.boolval.php
    public function boolval()
    {
        $value = $this->value;
        $res = boolval($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.floatval.php
    // 移除别名 doubleval
    public function floatval()
    {
        $var = $this->value;
        $res = floatval($var);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.intval.php
    public function intval(int $base = 10)
    {
        $value = $this->value;
        $res = intval($value, $base);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.strval.php
    public function strval()
    {
        $value = $this->value;
        $res = strval($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.settype.php
    public function settype(string $type)
    {
        $var = $this->value;
        $res = settype($var, $type);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.serialize.php
    public function serialize()
    {
        $value = $this->value;
        $res = serialize($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.unserialize.php
    public function unserialize(array $options = [])
    {
        $data = $this->value;
        $res = unserialize($data, $options);
        return $this->return($res);
    }

    /** 类型判断
     * is_​array
     * is_​bool
     * is_​callable
     * is_​countable
     * is_​double -- 移除
     * is_​float
     * is_​int
     * is_​integer -- 移除
     * is_​iterable
     * is_​long -- 移除
     * is_​null
     * is_​numeric
     * is_​object
     * is_​real -- 移除 同 is_float
     * is_​resource
     * is_​scalar
     * is_​string
     */
    // https://www.php.net/manual/en/function.is-array.php
    public function is_array()
    {
        $value = $this->value;
        $res = is_array($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-bool.php
    public function is_bool()
    {
        $value = $this->value;
        $res = is_bool($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-callable.php
    public function is_callable(bool $syntax_only = false, string &$callable_name = null)
    {
        $value = $this->value;
        $res = is_callable($value, $syntax_only, $callable_name);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-countable.php
    public function is_countable()
    {
        $value = $this->value;
        $res = is_countable($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-float.php
    public function is_float()
    {
        $value = $this->value;
        $res = is_float($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-int.php
    public function is_int()
    {
        $value = $this->value;
        $res = is_int($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-iterable.php
    public function is_iterable()
    {
        $value = $this->value;
        $res = is_iterable($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-null.php
    public function is_null()
    {
        $value = $this->value;
        $res = is_null($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-numeric.php
    public function is_numeric()
    {
        $value = $this->value;
        $res = is_numeric($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-object.php
    public function is_object()
    {
        $value = $this->value;
        $res = is_object($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-resource.php
    public function is_resource()
    {
        $value = $this->value;
        $res = is_resource($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-scalar.php
    public function is_scalar()
    {
        $value = $this->value;
        $res = is_scalar($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.is-string.php
    public function is_string()
    {
        $value = $this->value;
        $res = is_string($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.isset.php
    public function isset()
    {
        $var = $this->value;
        $res = isset($var);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.empty.php
    public function empty()
    {
        $var = $this->value;
        $res = empty($var);
        return $this->return($res);
    }
    /** 类型读取
     * gettype
     * get_​debug_​type 该功能不同于gettype()因为它返回的类型名称更符合实际使用情况，而不是那些因历史原因而存在的名称
     * get_​resource_​id -- 移动到 Oresource
     * get_​resource_​type -- 移动到 Oresource
     */
    // https://www.php.net/manual/en/function.gettype.php
    public function gettype()
    {
        $value = $this->value;
        $res = gettype($value);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.get-debug-type.php
    public function get_debug_type()
    {
        $value = $this->value;
        $res = get_debug_type($value);
        return $this->return($res);
    }
    # 考虑移到 classReflekTrait
    // https://www.php.net/manual/en/function.trait-exists
    public function trait_exists(bool $autoload = true)
    {
        $trait = $this->value;
        $res = trait_exists($trait, $autoload);
        return $this->return($res);
    }
}
