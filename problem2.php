
<?php
	$title = "Euler Problem 2";
	include('euler_header.php');

    function fib(&$sequence)
    {
        $count = count($sequence);
        $sequence[] = $sequence[$count-2] + $sequence[$count-1];
    }

    $fib_sequence = array(1, 1);
    $sum = 0;

    while (true)
    {
        fib($fib_sequence);
        if ($fib_sequence[count($fib_sequence)-1] > 4000000)
        {
            break;
        }
        if ($fib_sequence[count($fib_sequence)-1] % 2 == 0)
        {
            $sum += $fib_sequence[count($fib_sequence)-1];
        }
    }
    

    echo "Answer: $sum";

	include('euler_footer.php');
?>

