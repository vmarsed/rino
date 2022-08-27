<?php
namespace Rino;
require_once './../vendor/autoload.php';
class Ostr extends Adad
{
    use \Rino\Traits\Buildin\StringTrait;
    use \Rino\Traits\ClassTraits\DadClassTrait;
    use \Rino\Traits\ClassTraits\ShareStringAndArrayClassTrait;
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