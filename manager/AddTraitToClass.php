<?php

/**
 * 目标, 根据规则 , 把 trait 加到指定的类中
 * 第一步
 * 在 Traits 中,所有具有下划线xxx 的, 提取 xxx 比如取出 Object, 生成配置文件
 * 形如
 * [ classname =>  
 *      [
 *          filePath1,
 *          rilePath2,
 *      ]
 * ]
 * 
 * 第二步
 * 
 */

class Express
{
    public $traitsFolder = '/home/vagrant/code/rino/src/Traits';
    public $allFiles;
    function __construct()
    {
        $this->allFiles = new ArrayObject();
    }
    function bundle($folder = null)
    {
    }
    function scanDir($dir = null)
    {
        $dir = $dir ?: $this->traitsFolder;
        $folder = dir($dir);
        while ($value = $folder->read()) {
            // .目录跳过
            if (!trim($value, '.')) {
                continue;
            }
            // 如果是目录就继续本函数
            if (is_dir("$dir/$value")) {
                $this->scanDir("$dir/$value");
            }
            // 此时确认是文件了, 从文件中提取标签 得到一个数组
            $tags = $this->extractTags($value);
            // 将文件加入到 $this->allFiles[xxtag] 中
            if (count($tags)) {
                array_map(
                    fn ($tag) => $this->allFiles[$tag][] = "$dir/$value",
                    $tags
                );
            }
        }
        file_put_contents(
            '/home/vagrant/code/rino/manager/TraitsMap/TraitsMap.php',
            (function () {
                return '<?php' . PHP_EOL
                    . 'return '
                    . var_export($this->allFiles->getArrayCopy(), True)
                    . ';';
            })()
        );
    }

    function extractTags($fileName)
    {
        // 从文件名中, 取出 _\w+
        preg_match_all('/_([a-zA-Z]+)/', $fileName, $matches, PREG_PATTERN_ORDER);
        return $matches[1];
    }
}
$ex = new Express();
$ex->bundle();
$ex->scanDir();
