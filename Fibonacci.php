<?php

require_once 'FibonacciInterface.php';

class Fibonacci implements FibonacciInterface {
    public function getFibonacciInRange(int $start, int $end): array {
        $fibonacciNumbers = [];
        $a = 0;
        $b = 1;

        while ($a <= $end) {
            if ($a >= $start) {
                $fibonacciNumbers[] = $a;
            }
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }

        return $fibonacciNumbers;
    }
}
