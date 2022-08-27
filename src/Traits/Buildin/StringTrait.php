<?php
namespace Marstormad\Rino\Traits\Buildin;


trait StringTrait
{
    public function addcslashes(string $charlist)
    {
        $res = addcslashes($this->value, $charlist);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.addslashes.php
    public function addslashes()
    {
        $str = $this->value;
        $res = addslashes($str);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.bin2hex.php
    public function bin2hex()
    {
        $str = $this->value;
        $res = bin2hex($str);
        return $this->return($res);
    }

    # 移除 chop 别名 , 直接用 rtrim 就好了

    # chr(int $ascii): string
    # 移动到 Onumber


    public function chunk_split(int $length = 76, string $separator = "\r\n")
    {
        $res = chunk_split($this->value, $length, $separator);
        return $this->return($res, $this);
    }

    // https://www.php.net/manual/zh/function.convert-uudecode.php
    public function convert_uudecode()
    {
        $data = $this->value;
        $res = convert_uudecode($data);
        return $this->return($res);
    }
    // https://www.php.net/manual/zh/function.convert-uuencode.php
    public function convert_uuencode()
    {
        $data = $this->value;
        $res = convert_uuencode($data);
        return $this->return($res);
    }
    public function count_chars(int $mode = 0)
    {
        $string = $this->value;
        $res = count_chars($string,  $mode);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.crc32.php
    public function crc32()
    {
        $str = $this->value;
        $res = crc32($str);
        return $this->return($res);
    }

    public function crypt(?string $salt)
    {
        $res = crypt($this->value, $salt);
        return $this->return($res, $this);
    }

    # echo 跳过

    public function explode(string $separator, int $limit = PHP_INT_MAX)
    {
        $string = $this->value;
        $res = explode($separator,  $string,  $limit);
        return $this->return($res, $this);
    }

    # fprintf(resource $handle, string $format, mixed $... = ?): int // 更适合做为 resource 的方法 典型地由 fopen() 创建的 resource(资源)
    # 移动到资源 Oresource 类

    // https://www.php.net/manual/zh/function.get-html-translation-table.php
    static public function get_html_translation_table(int $table = HTML_SPECIALCHARS, int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = 'UTF-8')
    {
        $res = get_html_translation_table($table, $flags, $encoding);
        return static::new()->return($res);
    }


    public function hebrev(int $max_chars_per_line = 0): string
    {
        $string = $this->value;
        $res = hebrev($string, $max_chars_per_line);
        return $this->return($res, $this);
    }

    public function html_entity_decode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, ?string $encoding = null)
    {
        $string = $this->value;
        $res = html_entity_decode($string,  $flags, $encoding);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.htmlentities.php
    public function htmlentities(int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = null, bool $double_encode = true)
    {
        $encoding = is_null($encoding) ? ini_get("default_charset") : $encoding;
        $string = $this->value;
        $res = htmlentities($string, $flags, $encoding, $double_encode);
        return $this->return($res);
    }

    public function htmlspecialchars_decode(int $flags = ENT_COMPAT | ENT_HTML401)
    {
        $string = $this->value;
        $res = htmlspecialchars_decode($string, $flags);
        return $this->return($res, $this);
    }

    // https://www.php.net/manual/zh/function.htmlspecialchars.php
    public function htmlspecialchars(int $flags = ENT_COMPAT | ENT_HTML401, string $encoding = null, bool $double_encode = true)
    {
        $encoding = is_null($encoding) ? ini_get("default_charset") : $encoding;
        $string = $this->value;
        $res = htmlspecialchars($string, $flags, $encoding, $double_encode);
        return $this->return($res);
    }



    # implode — 用字符串连接数组元素
    # implode(string $separator, array $array): string   也适合给数组用
    # join — 别名 implode()
    # 转移为数组方法


    // https://www.php.net/manual/zh/function.lcfirst.php
    public function lcfirst()
    {
        $str = $this->value;
        $res = lcfirst($str);
        return $this->return($res);
    }

    // levenshtein 函数拆成4个函数
    // 本串 变成 $str2 的编辑距离
    public function levenshteinMeToYou($you)
    {
        $me = $this->value;
        $res = levenshtein($me, $you);
        return $this->return($res, $this);
    }

    public function levenshteinYouToMe($you)
    {
        $me = $this->value;
        $res = levenshtein($you, $me);
        return $this->return($res, $this);
    }

    public function levenshteinMeToYouCustom($you, int $cost_ins, int $cost_rep, int $cost_del)
    {
        $me = $this->value;
        $res = levenshtein($me, $you, $cost_ins, $cost_rep, $cost_del);
        return $this->return($res, $this);
    }
    public function levenshteinYouToMeCustom($you, int $cost_ins, int $cost_rep, int $cost_del)
    {
        $me = $this->value;
        $res = levenshtein($you, $me, $cost_ins, $cost_rep, $cost_del);
        return $this->return($res, $this);
    }

    // https://www.php.net/manual/zh/function.localeconv.php
    static public function localeconv()
    {
        $res = localeconv();
        return (new static())->return($res);
    }
    public function ltrim(string $character_mask = " \t\n\r\0\x0B")
    {
        $str = $this->value;
        $res = ltrim($str,  $character_mask);
        return $this->return($res, $this);
    }

    // 参数是路径的字符串表示
    public function md5_file(bool $binary = false)
    {
        $filename = $this->value;
        $res = md5_file($filename,  $binary);
        return $this->return($res, $this);
    }

    public function md5(bool $binary = false)
    {
        $string = $this->value;
        $res = md5($string, $binary);
        return $this->return($res, $this);
    }

    public function metaphone(int $max_phonemes = 0)
    {
        $string = $this->value;
        $res = metaphone($string,  $max_phonemes);
        return $this->return($res, $this);
    }

    # 移除 # money_format(string $format, float $number) 适合数字对象 , 另外, 这个函数 windows没有, 所以要判断 function_exist
    # 提示无此函数, windows 没有这个函数 具有 strfmon 的系统才有 money_format() 函数
    # 文件是放在 ubuntu 的 , 这样也算 windows 本地的嘛

    // https://www.php.net/manual/zh/function.nl-langinfo.php
    // 没啥用的方法 仅 linux 可用
    static public function nl_langinfo(int $item)
    {
        $res = nl_langinfo($item);
        return static::new()->return($res);
    }

    public function nl2br(bool $is_xhtml = true)
    {
        $string = $this->value;
        $res = nl2br($string, $is_xhtml);
        return $this->return($res, $this);
    }

    # 移到数字方法 PHP: number_format [🔗php.net](https://www.php.net/manual/zh/function.number-format.php)

    // https://www.php.net/manual/zh/function.ord.php
    public function ord()
    {
        $string = $this->value;
        $res = ord($string);
        return $this->return($res);
    }
    // 把 first=value&arr[]=foo+bar&arr[]=baz 转成变量 $result['first']=xxx $result['arr'][0]=foo bar $result['arr'][1]=baz
    public function parse_str(array &$result)
    {
        $string = $this->value;
        $res = parse_str($string, $result);
        return $this->return($res, $this);
    }

    public function print()
    {
        $arg = $this->value;
        $res = print($arg);
        return $this->return($res, $this);
    }

    // https://www.php.net/manual/zh/function.printf
    public function printf(...$args)
    {
        $format = $this->value;
        $res = printf($format, ...$args);
        return $this->return($res, $this);
    }
    // 不懂做什么用
    public function quoted_printable_decode()
    {
        $str = $this->value;
        $res = quoted_printable_decode($str);
        return $this->return($res, $this);
    }
    public function quoted_printable_encode()
    {
        $string = $this->value;
        $res = quoted_printable_encode($string);
        return $this->return($res, $this);
    }
    public function quotemeta()
    {
        $string = $this->value;
        $res = quotemeta($string);
        return $this->return($res, $this);
    }
    public function rtrim(?string $character_mask)
    {
        $str = $this->value;
        $res = rtrim($str, $character_mask);
        return $this->return($res, $this);
    }
    # PHP: setlocale [🔗php.net](https://www.php.net/manual/zh/function.setlocale.php)
    # 移到 helpTrait 所有人可用

    // 文件名为字符串, 计算文件名的 sha1 值
    public function sha1_file(bool $binary = false)
    {
        $filename = $this->value;
        $res = sha1_file($filename, $binary);
        return $this->return($res, $this);
    }
    public function sha1(bool $binary = false)
    {
        $string = $this->value;
        $res = sha1($string, $binary);
        return $this->return($res, $this);
    }
    public function similar_text(string $second, ?float &$percent)
    {
        $first = $this->value;
        $res = similar_text($first, $second, $percent);
        return $this->return($res, $this);
    }
    public function soundex()
    {
        $string = $this->value;
        $res = soundex($string);
        return $this->return($res, $this);
    }
    public function sprintf(mixed ...$values)
    {
        $format = $this->value;
        $res = sprintf($format,  ...$values);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.sscanf.php
    public function sscanf(string $format, &...$args)
    {
        $str = $this->value;
        $res = sscanf($str, $format, ...$args);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-contains.php
    public function str_contains(string $needle)
    {
        $haystack = $this->value;
        $res = str_contains($haystack, $needle);
        return $this->return($res, $this);
    }
    // 自定义别名
    public function contains(string $needle)
    {
        return $this->str_contains($needle);
    }
    // https://www.php.net/manual/zh/function.str-ends-with.php
    public function str_ends_with(string $needle)
    {
        $haystack = $this->value;
        $res = str_ends_with($haystack, $needle);
        return $this->return($res, $this);
    }
    // 自定义别名
    public function endWith(string $needle)
    {
        return $this->str_ends_with($needle);
    }
    // https://www.php.net/manual/zh/function.str-getcsv.php
    public function str_getcsv(string $delimiter = ",", string $enclosure = '"', string $escape = "\\")
    {
        $input = $this->value;
        $res = str_getcsv($input, $delimiter, $enclosure, $escape);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-ireplace.php
    public function str_ireplace(mixed $search, mixed $replace, ?int &$count)
    {
        $subject = $this->value;
        $res = str_ireplace($search, $replace, $subject, $count);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-pad.php
    public function str_pad(int $pad_length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT)
    {
        $input = $this->value;
        $res = str_pad($input, $pad_length, $pad_string, $pad_type);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-repeat.php
    public function str_repeat(int $multiplier)
    {
        $input = $this->value;
        $res = str_repeat($input, $multiplier);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-replace.php
    public function str_replace(mixed $search, mixed $replace, ?int &$count)
    {
        $subject = $this->value;
        $res = str_replace($search, $replace, $subject, $count);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-rot13.php
    public function str_rot13()
    {
        $str = $this->value;
        $res = str_rot13($str);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-shuffle.php
    public function str_shuffle()
    {
        $str = $this->value;
        $res = str_shuffle($str);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-split.php
    public function str_split(int $split_length = 1)
    {
        $string = $this->value;
        $res = str_split($string, $split_length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.str-starts-with.php
    public function str_starts_with(string $needle)
    {
        $haystack = $this->value;
        $res = str_starts_with($haystack, $needle);
        return $this->return($res, $this);
    }
    public function startWith(string $needle)
    {
        return $this->str_starts_with($needle);
    }
    // https://www.php.net/manual/zh/function.str-word-count.php
    public function str_word_count(int $format = 0, ?string $characters = null)
    {
        $string = $this->value;
        $res = str_word_count($string, $format, $characters);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strcasecmp.php
    public function strcasecmp(string $str2)
    {
        $str1 = $this->value;
        $res = strcasecmp($str1, $str2);
        return $this->return($res, $this);
    }


    // https://www.php.net/manual/zh/function.strcmp.php
    public function strcmp(string $str2)
    {
        $str1 = $this->value;
        $res = strcmp($str1, $str2);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strcoll.php
    public function strcoll(string $str2)
    {
        $str1 = $this->value;
        $res = strcoll($str1, $str2);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strcspn.php
    // strcspn($s1 , $2)  比如 ($s1 , '@')  从 s1 中找出中不为 @ 的字符长度, (从下标0开始)
    // 也可以是 ($s1, '@#') 还可以是 ($s1,'@##')
    // 而 strspn() 与这相反, 是($1,'@') 是找出以 @ 开头的长度, 比如 @@@hello 长度是3  @ss 长度是1
    public function strcspn(string $str2, ?int $start, ?int $length)
    {
        $str1 = $this->value;
        $res = strcspn($str1, $str2, $start, $length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strip-tags.php
    public function strip_tags(?string $allowable_tags)
    {
        $str = $this->value;
        $res = strip_tags($str, $allowable_tags);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.stripcslashes.php
    // stripcslashes  会把 \n \t 输出为 换行 和 缩进
    // stripslashes 会把 \n \t 输出为 n 和 t , 也就是只是把 \ 去掉, \\ 变 没了 \\\ 或 \\\\ 变成一个
    public function stripcslashes()
    {
        $str = $this->value;
        $res = stripcslashes($str);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.stripos.php
    public function stripos(string $needle, int $offset = 0)
    {
        $haystack = $this->value;
        $res = stripos($haystack, $needle, $offset);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.stripslashes.php
    public function stripslashes()
    {
        $str = $this->value;
        $res = stripslashes($str);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.stristr.php
    public function stristr(mixed $needle, bool $before_needle = false)
    {
        $haystack = $this->value;
        $res = stristr($haystack, $needle, $before_needle);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strlen.php
    public function strlen()
    {
        $string = $this->value;
        $res = strlen($string);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strnatcasecmp.php
    public function strnatcasecmp(string $str2)
    {
        $str1 = $this->value;
        $res = strnatcasecmp($str1, $str2);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strnatcmp.php
    public function strnatcmp(string $str2)
    {
        $str1 = $this->value;
        $res = strnatcmp($str1, $str2);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strncasecmp.php
    public function strncasecmp(string $str2, int $len)
    {
        $str1 = $this->value;
        $res = strncasecmp($str1, $str2, $len);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strncmp.php
    public function strncmp(string $str2, int $len)
    {
        $str1 = $this->value;
        $res = strncmp($str1, $str2, $len);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strpbrk.php
    public function strpbrk(string $char_list)
    {
        $haystack = $this->value;
        $res = strpbrk($haystack, $char_list);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strpos.php
    public function strpos(mixed $needle, int $offset = 0)
    {
        $haystack = $this->value;
        $res = strpos($haystack, $needle, $offset);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strrchr.php
    public function strrchr(mixed $needle)
    {
        $haystack = $this->value;
        $res = strrchr($haystack, $needle);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strrev.php
    public function strrev()
    {
        $string = $this->value;
        $res = strrev($string);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strripos.php
    public function strripos(string $needle, int $offset = 0)
    {
        $haystack = $this->value;
        $res = strripos($haystack, $needle, $offset);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strrpos.php
    public function strrpos(string $needle, int $offset = 0)
    {
        $haystack = $this->value;
        $res = strrpos($haystack, $needle, $offset);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strspn.php
    public function strspn(string $mask, ?int $start, ?int $length)
    {
        $subject = $this->value;
        $res = strspn($subject, $mask, $start, $length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strstr.php
    public function strstr(mixed $needle, bool $before_needle = false)
    {
        $haystack = $this->value;
        $res = strstr($haystack, $needle, $before_needle);
        return $this->return($res, $this);
    }
    // 内置别名
    public function strchr(mixed $needle, bool $before_needle = false)
    {
        return $this->strstr($needle, $before_needle);
    }
    // https://www.php.net/manual/zh/function.strtok.php
    public function strtok(string $token)
    {
        $string = $this->value;
        $res = strtok($string, $token);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strtolower.php
    public function strtolower()
    {
        $string = $this->value;
        $res = strtolower($string);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strtoupper.php
    public function strtoupper()
    {
        $string = $this->value;
        $res = strtoupper($string);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.strtr.php
    // strtr 有两种调用方法, 这里弄成两个函数, 一个加 s[tring] 一个 加 a[rray]
    public function strtrs(string $from, string $to)
    {
        $str = $this->value;
        $res = strtr($str, $from, $to);
        return $this->return($res, $this);
    }
    public function strtra(array $replace_pairs)
    {
        $str = $this->value;
        $res = strtr($str, $replace_pairs);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.substr-compare.php
    public function substr_compare(string $str, int $offset, ?int $length, bool $case_insensitivity = false)
    {
        $main_str = $this->value;
        $res = substr_compare($main_str, $str, $offset, $length, $case_insensitivity);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.substr-count.php
    public function substr_count(string $needle, int $offset = 0, ?int $length = null)
    {
        $haystack = $this->value;
        $res = substr_count($haystack, $needle, $offset, $length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.substr-replace.php
    public function substr_replace(mixed $replacement, mixed $start, ?int $length)
    {
        $string = $this->value;
        $res = substr_replace($string, $replacement, $start, $length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.substr.php
    public function substr(int $offset, ?int $length = null)
    {
        $string = $this->value;
        $res = substr($string, $offset, $length);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.trim.php
    public function trim(string $character_mask = " \t\n\r\0\x0B")
    {
        $str = $this->value;
        $res = trim($str, $character_mask);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.ucfirst.php
    public function ucfirst()
    {
        $str = $this->value;
        $res = ucfirst($str);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.ucwords.php
    public function ucwords(string $delimiters = " \t\r\n\f\v")
    {
        $str = $this->value;
        $res = ucwords($str, $delimiters);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.utf8-decode.php
    // https://www.php.net/manual/zh/function.utf8-encode.php
    // utf8_decode 和 utf8_encode 在 PHP8.2 被 DEPRECATED , 此处不录入

    # https://www.php.net/manual/zh/function.vfprintf.php
    # vfprintf 归于 Oresource

    // https://www.php.net/manual/zh/function.vprintf.php
    public function vprintf(array $args)
    {
        $format = $this->value;
        $res = vprintf($format, $args);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.vsprintf.php
    public function vsprintf(array $values)
    {
        $format = $this->value;
        $res = vsprintf($format, $values);
        return $this->return($res, $this);
    }
    // https://www.php.net/manual/zh/function.wordwrap.php
    public function wordwrap(int $width = 75, string $break = "\n", bool $cut = false)
    {
        $str = $this->value;
        $res = wordwrap($str, $width, $break, $cut);
        return $this->return($res, $this);
    }
}