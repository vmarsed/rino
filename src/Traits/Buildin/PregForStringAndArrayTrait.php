<?php
namespace Rino\Traits\Buildin;

trait PregForStringAndArrayTrait
{
    // https://www.php.net/manual/zh/function.preg-replace-callback-array.php
    public function preg_replace_callback_array(array $pattern, int $limit = -1, int &$count = null, int $flags = 0)
    {
        $subject = $this->value;
        $res = preg_replace_callback_array($pattern, $subject, $limit, $count, $flags);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.preg-filter
    // PHP 不认得 问号是可选参数, 会报错, 所以要把 &$count 放到 $limit 前面, 调用时如果要跳过 $count 就直接用命名参数法 limit:值
    public function preg_filter(mixed $pattern, mixed $replacement, ?int &$count, int $limit = -1)
    {
        $subject = $this->value;
        $res = preg_filter($pattern, $replacement, $subject, $limit, $count);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.preg-replace-callback.php
    public function preg_replace_callback(string|array $pattern, callable $callback, int $limit = -1, int &$count = null, int $flags = 0)
    {
        $subject = $this->value;
        $res = preg_replace_callback($pattern, $callback, $subject, $limit, $count, $flags);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.preg-replace.php
    public function preg_replace(string|array $pattern, string|array $replacement, int $limit = -1, int &$count = null)
    {
        $subject = $this->value;
        $res = preg_replace($pattern, $replacement, $subject, $limit, $count);
        return $this->return($res);
    }
}
