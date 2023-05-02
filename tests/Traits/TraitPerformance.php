<?php

namespace Tests\Traits;

trait TraitPerformance
{
    /**
     * 檢查 callback 的執行時間是否小於指定時間
     */
    public function assertExecutionTime(int|float $max_time, callable $callback)
    {
        $start_time = microtime(true);
        $callback();
        $end_time = microtime(true);

        $execution_time = $end_time - $start_time;

        $this->assertLessThanOrEqual($max_time, $execution_time, "Execution time exceeded {$max_time} seconds.");
    }
}
