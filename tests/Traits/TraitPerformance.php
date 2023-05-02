<?php

namespace Tests\Traits;

trait TraitPerformance
{
    public function assertExecutionTime($max_time, callable $callback)
    {
        $start_time = microtime(true);
        $callback();
        $end_time = microtime(true);

        $execution_time = $end_time - $start_time;

        $this->assertLessThanOrEqual($max_time, $execution_time, "Execution time exceeded {$max_time} seconds.");
    }
}
