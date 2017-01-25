<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST)) {
        $arrayToCreateValues = $_POST;
        $numberOfRows = $_SESSION['rows'];
        $numberOfColumns = $_SESSION['columns'];
        $table = new Table($numberOfRows, $numberOfColumns);
        
        echo '<br> Rezultat: '.$table->printValuesWithSnail();
    } else {
        echo 'metodą post przesłano nieprawidłowe dane';
    }
}
?>
<table>
    
</table>
