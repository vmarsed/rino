<?php
namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

/**
 * get_class 支持无参(静态调用,所以弄成两个)
 * ::get_class 和 object 的 get_class_with_object
 */
trait ClassObjectsStatictrait_Oobject
{
    // https://www.php.net/manual/en/function.get-called-class.php
    static public function get_called_class()
    {
        $res = get_called_class();
        return static::new()->return($res);    
    }


    
}
