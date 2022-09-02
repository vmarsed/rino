<?php

namespace Marstormad\Rino;

require_once './../vendor/autoload.php';
class Oobject extends Adad
{
    // ##====== Traits Start ======## //
    use Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsTrait_Oobject;
    use Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ArrayTrait_Oarray_Oobject;
    use Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsStatictrait_Oobject;
    use Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsTrait_Ostr_Oobject;
    // ##====== Traits End ======## //



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
