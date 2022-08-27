<?php
namespace Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

trait ClassObjectsTrait_String_Object
{
    // https://www.php.net/manual/en/function.get-class-methods.php
    public function get_class_methods()
    {
        $object_or_class = $this->value;
        $res = get_class_methods($object_or_class);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.get-parent-class.php
    public function get_parent_class()
    {
        $object_or_class = $this->value;
        $res = get_parent_class($object_or_class);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.is-a.php
    public function is_a( string $class_name, bool $allow_string = false)
    {
        $object = $this->value;
        $res = is_a($object, $class_name, $allow_string);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.is-subclass-of.php
    public function is_subclass_of( string $class, bool $allow_string = true)
    {
        $object_or_class = $this->value;
        $res = is_subclass_of($object_or_class, $class, $allow_string);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.method-exists.php
    public function method_exists( string $method_name)
    {
        $object = $this->value;
        $res = method_exists($object, $method_name);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.property-exists.php
    public function property_exists( string $property)
    {
        $object_or_class = $this->value;
        $res = property_exists($object_or_class, $property);
        return $this->return($res);    
    }
    
}
