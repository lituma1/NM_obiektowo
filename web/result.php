<?php

require_once '../src/Table.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST)) {
        $arrayWithValues = $_POST;
        $numberOfRows = $_SESSION['rows'];
        $numberOfColumns = $_SESSION['columns'];
        $table = new Table($numberOfRows, $numberOfColumns);
        $table->addValues($arrayWithValues);
        echo '<table style="border: solid black 1px">';
        $values = $table->getValues();

        for ($i = 0; $i < $table->getNumberOfRows(); $i++) {
            echo '<tr>';
            for ($j = 0; $j < $table->getNumberOfColumns(); $j++) {
                $value = $values[$i][$j];
                echo "<td style='border: solid black 1px'>$value</td>";
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<br> Rezultat: ' . $table->printValuesWithSnail();
    } else {
        echo 'metodą post przesłano nieprawidłowe dane';
    }
}

