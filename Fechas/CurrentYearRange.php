<?php

class CurrentYearRange extends Range {
    private int|false $start;
    private int|false $end;

    public function __construct() {
        $this->start = strtotime(date("Y-01-01 00:00:00"));
        $this->end = strtotime(date("Y-12-31 23:59:59"));
    }

    public function getStart(): int {
        return $this->start;
    }

    public function getEnd(): int {
        return $this->end;
    }
}
