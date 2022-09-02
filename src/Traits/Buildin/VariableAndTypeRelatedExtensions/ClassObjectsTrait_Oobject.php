<?php

namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

trait ClassObjectsTrait_Oobject
{
    // https://www.php.net/manual/zh/function.get-class.php
    // note: get_class 允许不带参数, 返回当前类体的类, 不适合做流调, 没意义,还不好搞,想不通要怎么搞
    public function get_class()
    {
        $object = $this->value;
        $res = get_class($object);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.get-mangled-object-vars.php
    public function get_mangled_object_vars()
    {
        $object = $this->value;
        $res = get_mangled_object_vars($object);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.get-object-vars.php
    public function get_object_vars()
    {
        $obj = $this->value;
        $res = get_object_vars($obj);
        return $this->return($res);
    }
}
