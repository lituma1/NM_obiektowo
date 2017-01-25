<?php
require_once '../src/Table.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($_POST['rows']) && is_numeric($_POST['columns'])) {
        $rows = $_POST['rows'];
        $columns = $_POST['columns'];
        $_SESSION['rows'] = $rows;
        $_SESSION['columns'] = $columns;
        $table = new Table($rows, $columns);
        $table->addRandomValues();
        var_dump($table);
    } else {
        echo 'metodą post przesłano nieprawidłowe dane';
    }
}
?>
<form action="result.php" method="POST">
    <?php
    $values = $table->getValues();
    $index = 0;
    for ($i = 0; $i < $table->getNumberOfRows(); $i++) {
        for ($j = 0; $j < $table->getNumberOfColumns(); $j++) {
            $value = $values[$i][$j];
            echo "<input type='text' style='width: 50px;' name='$index' value='$value'>";
            $index++;
        }
        echo '<br>';
    }
    ?>
    <input type="submit" value="Oblicz">
</form>

