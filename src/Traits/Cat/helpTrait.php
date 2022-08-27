<?php
namespace Marstormad\Rino\Traits\Cat;

use \Marstormad\Rino\Oarray;
use \Marstormad\Rino\Obool;
use \Marstormad\Rino\Onumber;
use \Marstormad\Rino\Oresource;
use \Marstormad\Rino\Ostr;
use \Marstormad\Rino\Oobject;

trait helpTrait
{
    // 所有类型方法都能用的方法
    static public function new($value = null)
    {
        return new static($value);
    }
    function return($res)
    {
        if (gettype($res) === gettype($this->value)) {
            $this->value = $res;
            return $this;
        }
        switch (gettype($res)) {
            case 'boolean':
                return new Obool($res);
            case 'integer':
            case 'double':
                return new Onumber($res);
            case 'array':
                return new Oarray($res);
            case 'string':
                return new Ostr($res);
            case 'resource':
            case 'resource (closed)':
                return new Oresource($res);
            case 'object':
                return new Oobject($res);
                // NULL , unknown type
            default:
                return $res;
        }
    }
    // https://www.php.net/manual/zh/function.preg-last-error-msg.php
    public function preg_last_error_msg()
    {
        $thisValueValue = $this->value;
        $res = preg_last_error_msg();
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.preg-last-error.php
    public function preg_last_error()
    {
        $thisValueValue = $this->value;
        $res = preg_last_error();
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.setlocale.php
    // 在Windows中，setlocale(LC_ALL, '')要从系统中的区域/语言设置(通过控制面板访问) 。
    // 原样函数
    static public function setlocale(int $category, string $locale, ...$string)
    {
        $res = setlocale($category, $locale, ...$string);
        return static::new()->return($res);
    }
}
