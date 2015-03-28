<?php

class Quarter {

    public $quarter;
    public $month;
    public $year;

//this function display the current
    public function quarter() {
        $this->month = date('m');
        $this->year = date('Y');


        if ($this->month==1 || $this->month==2 || $this->month==3 || $this->month==4) {
            $this->quarter = 'first';
            return $this->quarter;
        }
        else if ($this->month==5 || $this->month==6 || $this->month==7 || $this->month==8) {
            $this->quarter = 'second';
            return $this->quarter;
        }

        else if ($this->month==9 || $this->month==10 || $this->month==11 || $this->month==12) {
            $this->quarter = 'third';
            return $this->quarter;
        }
    }

//this function displays the current active/inactive status of quarter
    public function quarterFirstActiveStatus() {
        $month = date('m');
        if ($month==1 || $month==2 || $month==3 || $month==4 ) {
            echo "Active";
        }
        else {
            echo "Inactive";
        }
    }

    //this function displays the current active/inactive status of quarter
    public function quarterSecondActiveStatus() {
        $month = date('m');
        if ($month==5|| $month==6 || $month==7 || $month==8 ) {
            echo "Active";
        }
        else {
            echo "Inactive";
        }
    }

    //this function displays the current active/inactive status of quarter
    public function quarterThirdActiveStatus() {
        $month = date('m');
        if ($month==9 || $month==10 || $month==11 || $month==12 ) {
            echo "Active";
        }
        else {
            echo "Inactive";
        }
    }

    public function getMonth() {
        $this->month = date('m');
        if ($this->month==1) {
            $this->month="Jan";
            echo $this->month;
        }

        else if ($this->month==2) {
            $this->month="Feb";
            echo $this->month;
        }

        else if ($this->month==3) {
            $this->month="Mar";
            echo $this->month;
        }

        else if ($this->month==4) {
            $this->month="Apr";
            echo $this->month;
        }

        else if ($this->month==5) {
            $this->month="May";
            echo $this->month;
        }

        else if ($this->month==6) {
            $this->month="June";
            echo $this->month;
        }

        else if ($this->month==7) {
            $this->month="July";
            echo $this->month;
        }

        else if ($this->month==8) {
            $this->month="Aug";
            echo $this->month;
        }

        else if ($this->month==9) {
            $this->month="Sep";
            return $this->month;
        }

        else if ($this->month==10) {
            $this->month="Oct";
            echo $this->month;
        }

        else if ($this->month==11) {
            $this->month="Nov";
            echo $this->month;
        }

        else if ($this->month==12) {
            $this->month="Dec";
            echo $this->month;
        }
    }
}
?>