<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting array</title>
</head>
<body>
<?php
// Проверяем пустоту параметра
if (!empty(isset($_GET['array']))) {
    $array = explode(",", $_GET['array']);

    // Проверяем пустоту массива
    if (count($array) == 0) {
        print('Array is empty');

        exit(0);
    }

    print('Array: ' .
        implode(', ', $array));

    sortShell($array);

    print(nl2br("\r\n"));
    print('Sorted array: ' . implode(', ', $array));
}

function sortShell(&$a){
    $sort_length = count($a) - 1;
    $step = ceil(($sort_length + 1)/2);
    do{
        $i = ceil($step);
        do{
            $j=$i-$step;
            $c=1;
            do{
                if($a[$j]<=$a[$j+$step]){
                    $c=0;
                } 
                else {
                    $tmp=$a[$j];
                    $a[$j]=$a[$j+$step];
                    $a[$j+$step]=$tmp;
                }
                $j=$j-1;
            }
            while($j>=0 && ($c==1));
            $i = $i+1;
        }
        while($i<=$sort_length);
        $step = $step / 2;
    }
    while($step > 0);
}
?>
</body>
</html>