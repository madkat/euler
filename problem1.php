<?php
	$title = "Euler Problem 1";
	include('euler_header.php');

    $mult3 = array();
    $mult5 = array();

    for ($i = 3; $i < 1000; $i += 3)
    {
        if ($i % 5 != 0)
        {
            $mult3[] = $i;
        }
    }

    for ($i = 5; $i < 1000; $i += 5)
    {
        $mult5[] = $i;
    }

    $sum = 0;
    foreach ($mult3 as $item)
    {
        $sum += $item;
    }

    foreach ($mult5 as $item)
    {
        $sum += $item;
    }

    echo "Answer: $sum";

	include('euler_footer.php');
?>

