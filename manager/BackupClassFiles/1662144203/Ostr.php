<?php

namespace Marstormad\Rino;

require_once './../vendor/autoload.php';
class Ostr extends Adad
{
    // ##====== Traits Start ======## //
    Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsTrait_Ostr_Oobject
    Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ClassObjectsTrait_Ostr
    // ##====== Traits End ======## //

    protected $value = '';

    public function __construct($value = '')
    {
        $value = is_null($value) ? '' : $value;
        if (!is_string($value)) {
            throw new \Error('参数不是string');
        }
        $this->value = $value;
    }
}
