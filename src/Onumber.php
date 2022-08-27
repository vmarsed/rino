<?php
namespace Rino;
require_once './../vendor/autoload.php';
class Onumber extends Adad
{
    use \Rino\Traits\ClassTraits\DadClassTrait;
    protected $value;
    public function __construct($value = 0)
    {
        $value = is_null($value) ? 0 : $value;
        if (is_int($value) || is_float($value)) {
            $this->value = $value;
        } else {
            throw new \Error('参数不是int 或 float');
        }
    }
    // https://www.php.net/manual/zh/function.chr.php
    public function chr()
    {
        $ascii = $this->value;
        $res = chr($ascii);
        return $this->return($res);
    }


    // https://www.php.net/manual/zh/function.number-format.php
    public function number_format(int $decimals = 0)
    {
        $number = $this->value;
        $res = number_format($number, $decimals);
        return $this->return($res);
    }
}