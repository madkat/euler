
<?php

	class Problem7 extends Problem
	{
        function __construct()
		{
            $this->description = "By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13." .
            "<br /><br />What is the 10001st prime number?";
		}

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

		function Mod($number, $divisor)
		{
			if ($number > PHP_INT_MAX)
				return fmod($number, $divisor);
			else
				return $number % $divisor;
		}

        function Execute()
		{
			$this->TimerStart();

			$primes = array(3);
			$destinationPrime = 10001;
			$num = 3;

			while (count($primes) < ($destinationPrime - 1))
			{
				$num += 2;
				if ($this->isPrime($num, $primes))
				{
					$primes[] = $num;
				}
			}

			$answer = $primes[count($primes)-1];

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

