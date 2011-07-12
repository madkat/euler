

<?php
	$title = "Euler Problem 3";
	include('euler_header.php');

    /*
    The prime factors of 13195 are 5, 7, 13 and 29.

    What is the largest prime factor of the number 600851475143 ?
    */

    $primes = array(3, 5, 7, 11);
    $prime_factor = array();
    $num = 600851475143;
    $limit = $num / 11;
    if ($limit % 2 == 0)
    {
        $limit++;
    }

    for ($i = $primes[count($primes)-1]; $i <= $limit; $i+=2)
    {
        if (isPrime($i, $primes))
        {
            $primes[] = $i;
            
            if ($num % $i == 0)
            {
                $prime_factor[] = $i;
                echo "Found prime factor " . $i . "<br />";
            }
            else
            {
                $limit = $num / $i;
                if ($limit % 2 == 0)
                {
                    $limit++;
                }
            }
        }
    }

    $answer = $prime_factor[count($prime_factor)-1];

    function isPrime($number, &$primes)
    {
        foreach ($primes as $prime)
        {
            if ($number % $prime == 0)
            {
                return false;
            }
        }
        return true;
    }


    echo "Answer: $answer";

	include('euler_footer.php');
?>



