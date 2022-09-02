<?php

declare(strict_types=1);
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
    public $traitsMap;
    private $sessionId;
    function __construct()
    {
        $this->traitsMap = new ArrayObject();
        $this->sessionId = time();
    }
    // san the traits folder and save to @traitsMap
    function scanTraitsFolderAndSaveToTraitsMapProperty($traitsFolder)
    {
        $dir = $traitsFolder ?: $this->traitsFolder;
        // 创建 目录 对象
        $folder = dir($dir);
        // 遍历目录
        while ($value = $folder->read()) {
            // .目录跳过
            if (!trim($value, '.')) {
                continue;
            }
            // 如果是目录就继续本函数
            if (is_dir("$dir/$value")) {
                $this->scanTraitsFolderAndSaveToTraitsMapProperty("$dir/$value");
            }
            // 此时确认是文件了, 从文件中提取标签 得到一个数组
            // $tags = $this->extractTags($value);
            $tags = (function () use ($value) {
                //:: 闭包里, 只有 this
                preg_match_all('/_([a-zA-Z]+)/', $value, $matches, PREG_PATTERN_ORDER);
                return $matches[1];
            })();
            // 将文件加入到 $this->traitsMap[xxtag] 中
            if (count($tags)) {
                $filePath = "$dir/$value";
                $lineInfo = (object) $this->getLineInfo($filePath,'/^(?:namespace)\\s.*\\;$/');
                $line = trim($lineInfo->line);
                $line = rtrim($line,';');
                $line = preg_replace('/^namespace/','',$line);
                $line = trim($line);
                $traitName = pathinfo($value,PATHINFO_FILENAME);
                array_map(
                    fn ($tag) => $this->traitsMap[$tag][] = 'use \\'.$line.'\\'.$traitName.';',
                    $tags
                );
            }
        }
        $folder->close();
        return $this;
    }
    function saveTraitsMapTo($path)
    {
        if ($this->traitsMap->count()) {
            file_put_contents(
                $path,
                (function () {
                    return '<?php' . PHP_EOL
                        . 'return '
                        . var_export($this->traitsMap->getArrayCopy(), True)
                        . ';';
                })()
            );
        }
        return $this;
    }
    /**
     * 遍历目录
     */
    function listFiles(string $folder)
    {
        $recursive = false;
        if (!is_dir($folder)) throw new UnexpectedValueException("提供的路径 $folder 不是目录");
        $folderObject = dir($folder);
        while ($fileName = $folderObject->read()) {
            $fileName = trim($fileName, '.');
            if (empty($fileName)) {
                continue;
            }
            $filePath = "$folder/$fileName";
            if ($recursive && is_dir($filePath)) {
                $res = $this->listFiles($filePath, true);
                foreach ($res as $value) {
                    yield $value;
                }
            }
            if (!is_dir($filePath)) {
                yield $filePath;
            }
        }
    }
    function listFilesRecursive(string $folder)
    {
        $recursive = true;
        $folderObject = dir($folder);
        while ($fileName = $folderObject->read()) {
            $fileName = trim($fileName, '.');
            if (empty($fileName)) {
                continue;
            }
            $filePath = "$folder/$fileName";
            if ($recursive && is_dir($filePath)) {
                $res = $this->listFilesRecursive($filePath);
                foreach ($res as $value) {
                    yield $value;
                }
            }
            if (!is_dir($filePath)) {
                yield $filePath;
            }
        }
    }

    /**
     * 读取生成的配置文件, 放到 src 的类里
     * @ 闭包处理文件名(无后缀)
     */
    function addTraitsToClass(string $classFolder, string $classBackupFolder,string $RegExpOfTraitAreaHeader ,?Closure $convertor = null)
    {
        foreach ( $this->listFiles($classFolder) as $filePath){
            $fileName = pathinfo($filePath,PATHINFO_FILENAME);
            if($convertor){
                $fileName = $convertor($fileName);
            }
            if($this->traitsMap->offsetExists($fileName)){
                // 获取 标记行的 行号, 以及缩进 得到数组  key 有 lineNumber 和 space
                $lineInfo = (object) $this->getLineInfo($filePath,$RegExpOfTraitAreaHeader);
                // 把类文件存到数组
                $lineArray = new ArrayObject(file($filePath));
                // 读取映射的 traits , 拼成串
                foreach($this->traitsMap[$fileName] as $traitsNamespace){
                    $lineArray[$lineInfo->lineNumber] .= $lineInfo->space.$traitsNamespace.PHP_EOL;
                }
                // echo $lineArray[$lineInfo->lineNumber].PHP_EOL;

                file_put_contents($filePath,$lineArray->getArrayCopy());

            }
        }

    }
    function getLineInfo(string $filePath, string $regExp){
        $fileObj = new SplFileObject($filePath);
        foreach($fileObj as $lineNumber => $line){
            if(preg_match($regExp,$line)){
                preg_match('/^\\s+/',$line,$space);
                return [
                    'lineNumber'=>$lineNumber,
                    'space'=>$space?$space[0]:'',
                    'line' => $line,
                ];
            }
        }
    }

    /**
     * 批量修改 trait 文件名 和 文件内第一个类的类名
     */
    function renameTrait($file, $newName)
    {
    }
    /**
     * safe move file 同时修改命名空间
     * 本想同时修改 类 中的引用, 但是, 重新生成一次就好了, 也没多少文件
     */
    function safeMoveFile($file, $target)
    {
    }
    /**
     * renameTag 同时修改类名
     */
    function renameTag()
    {
    }
    /**
     * refreshClass 清空文件里的 trait 区
     * 做成通用方法 , 开始标志, 结束标志, 删除标志中间的内容 , 保留标志所在行
     * // ##====== Traits Start ======## //
     * // ##====== Traits End ======## //
     * 发现 php 没有修改中间行的方法, 搜索后听说了 sed 以后再调用这个实现看看, 现在就随便了
     */
    function refreshClassFile(string $filePath, $start, $end)
    {
        $file = new ArrayObject(file($filePath));
        $startLine = -1;
        $space = '';
        foreach ($file->getIterator() as $lineNumber => $line) {
            if (preg_match($end, $line)) break;

            if (preg_match($start, $line)) {
                $startLine = $lineNumber;
                // 保存行首空格
                if (preg_match('/^\\s+/', $line, $space)) {
                    $space = $space[0];
                };
                continue;
            }
            if ($startLine > -1 && !preg_match($end, $line)) {
                $file[$lineNumber] = '';
            }
        }
        file_put_contents($filePath, $file->getArrayCopy());
        return compact('startLine', 'space');
    }
    function refreshClassFolder(string $folder, string $start, string $end, string $backupFolder)
    {
        $backupFolder = $backupFolder . '/' . $this->sessionId;
        mkdir($backupFolder);


        foreach ($this->listFiles($folder) as $filePath) {
            
            copy($filePath, $backupFolder . '/' . pathinfo($filePath, PATHINFO_BASENAME));
            $this->refreshClassFile($filePath, $start, $end);
        }
        return $this;
    }

}
$ex = new Express();
/**
 * 清空类里的 trait
 */
if(0){
    $ex->refreshClassFolder(
        '/home/vagrant/code/rino/src/',
        start: '/\/\/\s*##\s*=+\s*Traits Start\s*=+\s*##\s*\/\//i',
        end: '/\/\/\s*##\s*=+\s*Traits End\s*=+\s*##\s*\/\//i',
        backupFolder: '/home/vagrant/code/rino/manager/BackupClassFiles',
    );
}
/**
 * 生成映射文件
 */
if(0){
    $ex
        -> scanTraitsFolderAndSaveToTraitsMapProperty('/home/vagrant/code/rino/src/Traits')
        -> saveTraitsMapTo('/home/vagrant/code/rino/manager/TraitsMap/TraitsMap.php');
}

/**
 * 提取映射
 * 存到文件 
 * 清空类 
 * 把 trait 加到 类里
 */
if(1){
    $ex
        -> scanTraitsFolderAndSaveToTraitsMapProperty('/home/vagrant/code/rino/src/Traits')
        -> saveTraitsMapTo('/home/vagrant/code/rino/manager/TraitsMap/TraitsMap.php')
        -> refreshClassFolder(
            folder:'/home/vagrant/code/rino/src/',
            start: '/\/\/\s*##\s*=+\s*Traits Start\s*=+\s*##\s*\/\//i',
            end: '/\/\/\s*##\s*=+\s*Traits End\s*=+\s*##\s*\/\//i',
            backupFolder: '/home/vagrant/code/rino/manager/BackupClassFiles',    
        )
        -> addTraitsToClass(
            classFolder:'/home/vagrant/code/rino/src/',
            classBackupFolder:'/home/vagrant/code/rino/manager/BackupClassFiles',
            RegExpOfTraitAreaHeader: '/\/\/\s*##\s*=+\s*Traits Start\s*=+\s*##\s*\/\//i'
        )
        ;
}