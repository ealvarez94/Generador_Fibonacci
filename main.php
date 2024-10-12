<?php

// Incluir las clases de Fibonacci
require_once 'Fibonacci.php';
require_once 'FibonacciInterface.php';

// Incluir las clases de fecha
require_once 'Fechas/Range.php';
require_once 'Fechas/DateRange.php';
require_once 'Fechas/CurrentMonthRange.php';
require_once 'Fechas/CurrentYearRange.php';

date_default_timezone_set('UTC');

// Función para obtener los números de Fibonacci en el rango dado
function printFibonacciInRange(Range $range): void
{
    $fibonacci = new Fibonacci();
    $numbers = $fibonacci->getFibonacciInRange($range->getStart(), $range->getEnd());
    echo "Números de Fibonacci entre {$range->getStart()} y {$range->getEnd()}:\n";
    echo implode(", ", $numbers) . "\n";
}

// Main
$fibonacci = new Fibonacci();
do {
    try {
        $choice = $fibonacci->getUserChoice();

        switch ($choice) {
            case '1':
                // Rango del mes actual
                $currentMonthRange = new CurrentMonthRange();
                printFibonacciInRange($currentMonthRange);
                break;

            case '2':
                // Rango del año actual
                $currentYearRange = new CurrentYearRange();
                printFibonacciInRange($currentYearRange);
                break;

            case '3':
                // Rango de fechas personalizado
                $start = $fibonacci->getUserInputDate("Ingrese la fecha de inicio (formato: Y-m-d H:i:s): ");
                $end = $fibonacci->getUserInputDate("Ingrese la fecha de fin (formato: Y-m-d H:i:s): ");
                $customRange = new DateRange($start, $end);
                printFibonacciInRange($customRange);
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
