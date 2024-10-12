<?php

require_once 'Fibonacci.php';
require_once 'Fechas/Range.php';
require_once 'Fechas/DateRange.php';
require_once 'Fechas/CurrentMonthRange.php';
require_once 'Fechas/CurrentYearRange.php';

class Menu {
    private $fibonacci;

    public function __construct(Fibonacci $fibonacci) {
        $this->fibonacci = $fibonacci;
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

    public function printFibonacciInRange(Range $range): void {
        $numbers = $this->fibonacci->getFibonacciInRange($range->getStart(), $range->getEnd());
        echo "Números de Fibonacci entre {$range->getStart()} y {$range->getEnd()}:\n";
        echo implode(", ", $numbers) . "\n";
    }

    public function run() {
        do {
            try {
                $choice = $this->getUserChoice();

                switch ($choice) {
                    case '1':
                        // Rango del mes actual
                        $currentMonthRange = new CurrentMonthRange();
                        $this->printFibonacciInRange($currentMonthRange);
                        break;

                    case '2':
                        // Rango del año actual
                        $currentYearRange = new CurrentYearRange();
                        $this->printFibonacciInRange($currentYearRange);
                        break;

                    case '3':
                        // Rango de fechas personalizado
                        $start = $this->getUserInputDate("Ingrese la fecha de inicio (formato: Y-m-d H:i:s): ");
                        $end = $this->getUserInputDate("Ingrese la fecha de fin (formato: Y-m-d H:i:s): ");
                        $customRange = new DateRange($start, $end);
                        $this->printFibonacciInRange($customRange);
                        break;

                    case '4':
                        echo "Saliendo...\n";
                        exit;

                    default:
                        echo "Opción no válida. Intente nuevamente.\n";
                }

                // Preguntar si desea realizar otra consulta
                do {
                    echo "¿Desea realizar otra consulta? (s/n): ";
                    $again = trim(fgets(STDIN));
                    if ($again !== 's' && $again !== 'n') {
                        echo "Entrada no válida. Por favor ingrese 's' para sí o 'n' para no.\n";
                    }
                } while ($again !== 's' && $again !== 'n');

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
                $again = 's'; // Forzar que vuelva a intentar
            }
        } while (strtolower($again) === 's');
    }
}
