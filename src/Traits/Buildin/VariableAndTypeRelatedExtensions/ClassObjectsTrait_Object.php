<?php

namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

trait ClassObjectsTrait_Object
{
    // https://www.php.net/manual/zh/function.get-class.php

    public function get_class_with_object()
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
