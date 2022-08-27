<?php
namespace Marstormad\Rino;
require_once './../vendor/autoload.php';
class Oobject extends Adad
{
    use \Marstormad\Rino\Traits\ClassTraits\DadClassTrait;
    use \Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsTrait_Object;
    use \Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ArrayTrait_Array_Object;


    protected $value;
    public function __construct($value = null)
    {
        $value = is_null($value) ? (new \stdClass) : $value;
        if (!is_object($value)) {
            throw new \Error('参数不是对象');
        }
        $this->value = $value;
    }
}