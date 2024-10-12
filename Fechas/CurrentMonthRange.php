<?php

class CurrentMonthRange extends Range {
    private $start;
    private $end;

    public function __construct() {
        $this->start = strtotime(date("Y-m-01 00:00:00"));
        $this->end = strtotime(date("Y-m-t 23:59:59"));
    }

    public function getStart(): int {
        return $this->start;
    }

    public function getEnd(): int {
        return $this->end;
    }
}
