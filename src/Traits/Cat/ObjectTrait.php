<?php
namespace Rino\Traits\Cat;
trait ObjectTrait
{
    public function instanceof($class)
    {
        $res = $this->value instanceof $class;
        $this->return($res);
    }
}