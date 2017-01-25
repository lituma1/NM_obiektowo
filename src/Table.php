<?php


class Table {

    private $numberOfRows;
    private $numberOfColumns;
    private $values;

    public function __construct($numberOfRows, $numberOfColumns) {
        $this->numberOfRows = $numberOfRows;
        $this->numberOfColumns = $numberOfColumns;
        $this->values = [];
        
    }

    public function getNumberOfRows() {
        return $this->numberOfRows;
    }

    public function getNumberOfColumns() {
        return $this->numberOfColumns;
    }

    public function getValues() {
        return $this->values;
    }

    public function printValuesWithSnail() {
        $result = '';
        $firstRow = 0;
        $firstColumn = 0;

        while ($firstRow < $this->numberOfRows && $firstColumn < $this->numberOfColumns) {

            for ($i = $firstColumn; $i < $this->numberOfColumns; $i++) {
                $result .= $this->values[$firstRow][$i] . ', ';
            }
            $firstRow++;


            for ($i = $firstRow; $i < $this->numberOfRows; $i++) {
                $result .= $this->values[$i][$this->numberOfColumns - 1] . ', ';
            }
            $this->numberOfColumns--;


            if ($firstRow < $this->numberOfRows) {
                for ($i = $this->numberOfColumns - 1; $i >= $firstColumn; $i--) {
                    $result .= $this->values[$this->numberOfRows - 1][$i] . ', ';
                }
                $this->numberOfRows--;
            }


            if ($firstColumn < $this->numberOfColumns) {
                for ($i = $this->numberOfRows - 1; $i >= $firstRow; $i--) {
                    $result .= $this->values[$i][$firstColumn] . ', ';
                }
                $firstColumn++;
            }
        }

        return substr($result, 0, -2);
    }

    public function addRandomValues() {
        for ($i = 0; $i < $this->numberOfRows; $i++) {
            $array = [];
            for ($j = 0; $j < $this->numberOfColumns; $j++) {
                $value = $this->randomString(2);
                $array[] = $value;
            }
            $this->values[] = $array;
        }
    }
    public function addValues($arrayWithValues){
        $index = 0;
        for ($i = 0; $i < $this->numberOfRows; $i++) {
            $array = [];
            for ($j = 0; $j < $this->numberOfColumns; $j++) {
                
                $array[] = $arrayWithValues[$index];
                $index++;
            }
            $this->values[] = $array;
        }
    }

    public function randomString($length) {
        $original_string = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $original_string2 = implode("", $original_string);
        return substr(str_shuffle($original_string2), 0, $length);
    }

}



