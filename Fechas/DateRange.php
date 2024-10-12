<?php

class DateRange extends Date {
    private int $start;
    private int $end;

    public function __construct(string $start, string $end) {
        $this->setStart($start);
        $this->setEnd($end);
    }

    public function setStart(string $start): void
    {
        $startTimestamp = strtotime($start);
        if ($startTimestamp === false) {
            throw new InvalidArgumentException("Fecha de inicio no válida: " . $start);
        }
        $this->start = $startTimestamp;
    }

    public function setEnd(string $end): void
    {
        $endTimestamp = strtotime($end);
        if ($endTimestamp === false) {
            throw new InvalidArgumentException("Fecha de fin no válida: " . $end);
        }
        if ($endTimestamp <= $this->start) {
            throw new InvalidArgumentException("La fecha de fin debe ser posterior a la fecha de inicio.");
        }
        $this->end = $endTimestamp;
    }

    public function getStart(): int {
        return $this->start;
    }

    public function getEnd(): int {
        return $this->end;
    }
}
