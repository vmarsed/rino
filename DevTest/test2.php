<?php
// # ok print 123 123 123 .............
// $a = [1,2,3];
// while(count($a)){
//     $n = array_pop($a);
//     echo "$n\n";
//     array_unshift($a,$n);
// }


// # ok print 333333333333333333333333333333
// $a = [1,2,3];
// while(count($a)){
//     $n = array_pop($a);
//     echo "$n\n";
//     array_push($a,$n);
// }

// # no 非动态, 只打印出 123
if(0){
    $a = [1,2,3];
    foreach($a as $key => $value){
        echo "$value\n";
        array_push($a,$key+1);
    }
}

// # ok 性能超强, 一下就5位数了..只好加了个 break看看
if(0){
    $a = [1,2,3];
    $a = new ArrayObject($a);
    $iterator = $a->getIterator();
    foreach($iterator as $key => $value){
        echo "$value\n";
        $a->append($value+1);
        if($value>9) break;
    }
}
// # No work 说明不是引用传递
if(0){
    $a1 = [1,2,3];
    $a = new ArrayObject($a1);
    $iterator = $a->getIterator();
    foreach($iterator as $key => $value){
        echo "$value\n";
        // $a->append($value+1);
        array_push($a1,$value+1);
        if($value>9) break;
    }
}

// 迭代器都是单向的, 实验不出来双向的, 也就是说, 迭代器可以实现 队列, 还是只能入队的队列, 
// 队列里的东西似乎无法跳过?
// 可以从数据库读取记录, 根据 id 读取更多字段, 如果队列字段的值不是本队列,那就跳过
// 结合 redis 应该类似
// 现在是, 如何迭代读取出 数据库 或 redis 里的数据?
// 所谓数据库分页, 就是指定 orderby id offset 1 limit 10 读取10条, 下一次再 orderby offset 11 limit 10
// 可是, 如何判断迭代到多少了, 要不要再读库? PHP 有个无限迭代器, 那就自己写个 next 的判断方法?
// 另一个问题
// 队列是动态的, 有多个 worker 你读1-10条后, 再读 11-20 条 时, 任务可能处理完了, 那没事, 接着读 21-30条
// 但这个时候, 可能第8条被移交给你了,那怎么办?等下一轮?
// 我想, 这可以在移交时, 就标记为 重新提交 , 然后追加到最后?
// 这样会不会导致都不敢删除数据库条目?, 不会吧, 迭代器应该在 next 读不到, 而且数据库队列表中读不出来, 的时候重新从第一条开始获取 直到队里没有东西了
// 才停止


if(0){
    $a1 = [1,2,3];
    $a = new ArrayObject($a1);
    $iterator = $a->getIterator();
    foreach($iterator as $key => $value){
        echo "$value\n";
        // $a->append($value+1);
        array_push($a1,$value+1);
        if($value>9) break;
    }
}



