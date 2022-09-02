<?php
namespace Marstormad\Rino;
require_once './../vendor/autoload.php';

// extends ArrayObject
class Oarray extends Adad
{
    // ##====== Traits Start ======## //
    Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ArrayTrait_Oarray_Oobject
    Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ArrayStaticTrait_Oarray
    Marstormad\Rino\Traits\Buildin\VariableAndTypeRelatedExtensions\ArrayTrait_Oarray
    // ##====== Traits End ======## //

    protected $value;
    public function __construct($value = [])
    {
        $value = is_null($value) ? [] : $value;
        if (!is_array($value)) {
            throw new \Error('参数不是array');
        }
        $this->value = $value;
    }
    // mapTrim , mapLtrim, mapRtrim , map
    // public function mapTrim()
    // {
    // }

    // https://www.php.net/manual/zh/function.preg-grep.php
    public function preg_grep(string $pattern, int $flags = 0)
    {
        $array = $this->value;
        $res = preg_grep($pattern, $array, $flags);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.implode.php
    public function join(string $separator)
    {
        $array = $this->value;
        $res = implode($separator, $array);
        return $this->return($res);
    }
    public function implode(string $separator)
    {
        return $this->join($separator);
    }
}