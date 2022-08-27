<?php
namespace Rino;
require_once './../vendor/autoload.php';
class Obool extends Adad
{
    use \Rino\Traits\ClassTraits\DadClassTrait;
    protected $value;
    public function __construct($value = false)
    {
        $value = is_null($value) ? false : $value;
        if (!is_bool($value)) {
            throw new \Error('参数不是bool');
        }
        $this->value = $value;
    }

}