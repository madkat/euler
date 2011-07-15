
<?php

	class Problem10 extends Problem
	{
        function __construct()
		{
            $this->description = "The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17." .
								 "<br /><br />Find the sum of all the primes below two million.";
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
			$destinationNum = 2000000;
			$num = 3;

			while ($num < $destinationNum)
			{
				$num += 2;
				if ($this->isPrime($num, $primes))
				{
					$primes[] = $num;
				}
			}

            $answer = 2;
			for ($i = 0; $i < count($primes); $i++)
			{
                $answer += $primes[$i];
			}

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

