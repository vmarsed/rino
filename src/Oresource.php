<?php
namespace Rino;
require_once './../vendor/autoload.php';

class Oresource extends Adad
{
    use \Rino\Traits\ClassTraits\DadClassTrait;
    protected $value;
    public function __construct($value)
    {
        if (is_resource($value)) {
            $this->value = $value;
        } else {
            throw new \Error('参数不是资源类型,无法实例化');
        }
    }

    // https://www.php.net/manual/zh/function.vfprintf.php
    public function vfprintf(string $format, array $args)
    {
        $handle = $this->value;
        $res = vfprintf($handle, $format, $args);
        return $this->return($res, $this);
    }

    // https://www.php.net/manual/zh/function.fprintf.php
    public function fprintf(string $format, ...$args)
    {
        $handle = $this->value;
        $res = fprintf($handle, $format, ...$args);
        return $this->return($res);
    }
    // https://www.php.net/manual/en/function.get-resource-id.php
    public function get_resource_id()
    {
        $resource = $this->value;
        $res = get_resource_id($resource);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.get-resource-type.php
    public function get_resource_type()
    {
        $handle = $this->value;
        $res = get_resource_type($handle);
        return $this->return($res, $this);
    }
}