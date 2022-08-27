<?php
namespace Marstormad\Rino\Traits\Cat;
trait OutputTrait
{
    // echo , print, printf ...
    public function echo()
    {
        if (is_array($this->value)) {
            print_r($this->value);
        } else if (is_bool($this->value)) {
            echo 'bool(' . ($this->value ? 'true' : 'false') . ')';
        } else {
            echo $this->value . PHP_EOL;
        }
        return $this;
    }
    /** 来自 Variable handling Functions ****************************************
     * https://www.php.net/manual/en/function.print-r.php
     * debug_​zval_​dump
     * print_​r    
     * var_​dump
     * var_​export
     */
    // https://www.php.net/manual/en/function.debug-zval-dump.php
    public function debug_zval_dump(...$values)
    {
        $value = $this->value;
        $res = debug_zval_dump($value, ...$values);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.print-r.php
    public function print_r(bool $return = false)
    {
        $value = $this->value;
        $res = print_r($value, $return);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.var-dump.php
    public function var_dump(...$values)
    {
        $value = $this->value;
        $res = var_dump($value, ...$values);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.var-export.php
    public function var_export(bool $return = false)
    {
        $value = $this->value;
        $res = var_export($value, $return);
        return $this->return($res);
    }
}
