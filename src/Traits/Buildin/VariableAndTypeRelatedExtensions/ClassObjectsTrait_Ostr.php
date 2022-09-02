<?php
namespace Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions;

trait ClassObjectsTrait_Ostr
{
    // https://www.php.net/manual/en/function.class-alias.php
    public function class_alias( string $alias, bool $autoload = true)
    {
        $class = $this->value;
        $res = class_alias($class, $alias, $autoload);
        return $this->return($res);    
    }
    // https://www.php.net/manual/en/function.class-exists.php
    public function class_exists( bool $autoload = true)
    {
        $class = $this->value;
        $res = class_exists($class, $autoload);
        return $this->return($res);    
    }
    // https://www.php.net/manual/en/function.enum-exists.php
    public function enum_exists( bool $autoload = true)
    {
        $enum = $this->value;
        $res = enum_exists($enum, $autoload);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.get-class-vars.php
    public function get_class_vars()
    {
        $class_name = $this->value;
        $res = get_class_vars($class_name);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.interface-exists.php
    public function interface_exists( bool $autoload = true)
    {
        $interface = $this->value;
        $res = interface_exists($interface, $autoload);
        return $this->return($res);    
    }
    // https://www.php.net/manual/zh/function.trait-exists.php
    public function trait_exists( bool $autoload = true)
    {
        $trait = $this->value;
        $res = trait_exists($trait, $autoload);
        return $this->return($res);    
    }
}
