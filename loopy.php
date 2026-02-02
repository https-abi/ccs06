<?php
for($i = 1; $i <=5; $i++){
    echo  str_repeat("*", $i);
    echo  "<br>";
}

for($i = 5; $i >0; $i--){
    echo  str_repeat("*", $i);
    echo  "<br>";
}


// for($i = 5; $i >0; $i--){
//     for($j = 1; $j <=5; $j++){
//         echo  str_repeat("-", $i);
//         echo  str_repeat("*", $j);
//         echo  "<br>";
//     }
//     echo  "<br>";
// }

?>

<?php
    $maxRows = $_GET['maxRows'] ?? 10; //?? -> NULL-COALESCENCE
    $maxCols = $_GET['maxCols'] ?? 10;
?>

<html>

    <body>
        <h1>Exercise 3: output asterisk (*) on every alternate columns</h1>
        <table border="1" cellspacing="5" cellpadding="5">
            <?php for($row = 1; $row <= $maxRows; $row++){ ?>
                <tr>
                    <?php for($col = 1; $col <= $maxCols; $col++){ 
                        if(($row + $col) % 2 ==0){ ?>
                            <td>*</td>
                        <?php } else { ?>
                            <td>&nbsp;</td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>    
        </table>
        <table border="1" cellspacing="5" cellpadding="5">
            <?php for($row = 1; $row <= $maxRows; $row++){ ?>
                <tr>
                    <?php for($col = 1; $col <= $maxCols; $col++){ 
                        if(($row==1 || $row == $maxRows) || ($col==1 || $col == $maxCols)){ ?>
                            <td>*</td>
                        <?php } else { ?>
                            <td>&nbsp;</td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>    
        </table>
    </body>
</html>