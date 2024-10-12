<?php

interface FibonacciInterface {
    public function getFibonacciInRange(int $start, int $end): array;

    public function showMenu(): string;

    public function getUserChoice(): string;

    public function getUserInputDate(string $prompt): string;
}
