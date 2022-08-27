<?php
namespace Marstormad\Rino\Traits\Buildin;

trait PregForStringTrait
{
    ##  https://www.php.net/manual/zh/function.preg-filter
    ## subject 类型是 mixed 可以是字符串或数组, 按说可能还有别的类型, 我想不出来, 放在 PregForStringTraitAndArrayTrait

    ## preg_grep 做为数组方法 而不是字符串
    ## PHP: preg_grep [🔗php.net](https://www.php.net/manual/zh/function.preg-grep.php)

    ## https://www.php.net/manual/zh/function.preg-last-error-msg.php
    ## 无参函数 Returns the error message of the last PCRE regex execution
    ## 暂定弄给 help 谁都能调用? 好!

    // https://www.php.net/manual/zh/function.preg-match-all.php
    public function preg_match_all(string $pattern, array &$matches = null, int $flags = 0, int $offset = 0)
    {
        $subject = $this->value;
        $res = preg_match_all($pattern, $subject, $matches, $flags, $offset);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.preg-match.php
    public function preg_match(string $pattern, array &$matches = null, int $flags = 0, int $offset = 0)
    {
        $subject = $this->value;
        $res = preg_match($pattern, $subject, $matches, $flags, $offset);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.preg-quote.php
    public function preg_quote(string $delimiter = null)
    {
        $str = $this->value;
        $res = preg_quote($str, $delimiter);
        return $this->return($res);
    }

    ## PHP: preg_replace_callback_array [🔗php.net](https://www.php.net/manual/zh/function.preg-replace-callback-array.php)
    ## PHP: preg_replace_callback [🔗php.net](https://www.php.net/manual/zh/function.preg-split.php)
    ## PHP: preg_replace [🔗php.net](https://www.php.net/manual/zh/function.preg-replace.php)
    ## 这些都同时支持 String|Array 所以移到 PregForStringTraitAndArrayTrait

    // https://www.php.net/manual/zh/function.preg-split.php
    public function preg_split(string $pattern, int $limit = -1, int $flags = 0)
    {
        $subject = $this->value;
        $res = preg_split($pattern, $subject, $limit, $flags);
        return $this->return($res);
    }
}