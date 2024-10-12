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

    public function showMenu(): string {
        return "Seleccione una opción:\n" .
            "1. Obtener Fibonacci del mes actual\n" .
            "2. Obtener Fibonacci del año actual\n" .
            "3. Ingresar fechas personalizadas\n" .
            "4. Salir\n";
    }

    public function getUserChoice(): string {
        echo $this->showMenu();
        return trim(fgets(STDIN));
    }

    public function getUserInputDate(string $prompt): string {
        echo $prompt;
        return trim(fgets(STDIN));
    }
}
