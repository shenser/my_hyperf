<?php
declare(strict_types=1);

namespace App\Task;
use Hyperf\Coroutine\Coroutine;
use Hyperf\Context\ApplicationContext;
use Hyperf\Task\Annotation\Task;

class AnnotationTask
{
    #[Task]
    public function handle($cid)
    {
        Coroutine::sleep(2); // 模拟耗时操作
        echo 'task:' . getmypid() . PHP_EOL;
        return [
            'time' => date('Y-m-d H:i:s'),
            'pid' => getmypid(),
            'worker.cid' => $cid,
            // task_enable_coroutine=false 时返回 -1，反之 返回对应的协程 ID
            'task.cid' => Coroutine::id(),
        ];
    }
}
