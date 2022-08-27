<?php

namespace Rino\Traits\ClassTraits;

trait DadClassTrait
{
    use \Rino\Traits\Cat\helpTrait;
    use \Rino\Traits\Cat\OutputTrait;
    use \Rino\Traits\Buildin\VariableHandlingTrait;
    public function value()
    {
        return $this->value;
    }

    // TODO：允许 无参数 ， 单参数 ， 以及只需要一个必要参数的函数
    //       不需要判断传进来的参数类型是否匹配，目标函数自己会判断
    public function __call($function, $params)
    {
        if (!function_exists($function)) return null;
        $ref = new \ReflectionFunction($function);
        $numberOfParameters = $ref->getNumberOfParameters();
        $numberOfRequiredParameters = $ref->getNumberOfRequiredParameters();

        // 当用户没有传参
        if (count($params) === 0) {
            // 这里需要判断一下, 如果参数不能是string 那就不要用, 比如 chr
            if ($numberOfParameters === 1 || $numberOfRequiredParameters === 1) {
                $res = call_user_func($function, $this->value);
            } else if ($numberOfParameters === 0) {
                $res = call_user_func($function);
            } else {
                throw new \Error('函数他需要参数');
            }
        }
        return $this->return($res, $this);
    }
}
