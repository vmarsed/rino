<?php

namespace Marstormad\Rino;

require_once './../vendor/autoload.php';
class Oobject extends Adad
{
    // ##====== Traits Start ======## //
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
