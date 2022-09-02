<?php
namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

/**
 * get_class 支持无参(静态调用,所以弄成两个)
 * ::get_class 和 object 的 get_class_with_object
 */
trait ClassObjectsStatictrait_Forall
{
    // https://www.php.net/manual/zh/function.get-declared-classes.php
    static public function get_declared_classes()
    {
        $res = get_declared_classes();
        return static::new()->return($res);    
    }
    // https://www.php.net/manual/zh/function.get-declared-interfaces.php
    static public function get_declared_interfaces()
    {
        $res = get_declared_interfaces();
        return static::new()->return($res);    
    }
    // https://www.php.net/manual/zh/function.get-declared-traits.php
    static public function get_declared_traits()
    {
        $res = get_declared_traits();
        return static::new()->return($res);    
    }
    
}
