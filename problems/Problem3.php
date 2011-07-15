
<?php

	class Problem3 extends Problem
	{
        function __construct()
		{
            $this->description = "The prime factors of 13195 are 5, 7, 13 and 29." .
								 "<br /><br />What is the largest prime factor of the number 600851475143 ?";
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

		function CheckTimeout()
		{
			if (($this->PHP5_MicrotimeFloat() - $this->time) > 150)
			{
				$this->AddDebugLine("Timeout reached");
				return true;
			}
			return false;
		}

        function ExecuteEuler()
		{
			$this->TimerStart();

			$primes = array();
			$answer = 0;
			$num = 600851475143;
			$limit = floor(sqrt($num));
			if ($limit % 2 == 0)
			{
				$limit++;
			}

			// List of all odd numbers from 3 to the sqrt
			for ($i = 3; $i < $limit; $i+=2)
			{
				$primes[count($primes)] = $i;
			}

			$limit = count($primes);
			$index = 0;
			// Execute Eulers sieve
			// For each number in the array, remove all remaining numbers
			// that are divisible by the current number. This guarantees that the
			// next number is always going to be a prime and the operation can continue.
			while (true)
			{
				$prime = $primes[$index];
				$new_primes = array();
				for ($i = 0; $i < $index; $i++)
				{
					$new_primes[count($new_primes)] = $primes[$i];
				}
				for ($i = $index + 1; $i < $limit; $i++)
				{
					if (isset($primes[$i]))
					{
						if ($this->Mod($primes[$i], $prime) != 0)
						{
							$new_primes[count($new_primes)] = $primes[$i];
						}
					}
				}
				$primes = array();
				$primes = $new_primes;
				$limit = count($primes);

				if ($this->Mod($num, $prime) == 0)
				{
					$this->AddDebugLine("Found prime factor " . $prime);
					$answer = $prime;
				}

				if ($this->CheckTimeout())
				{
					$this->AddDebugLine("Current prime: $prime");
					$this->AddDebugLine("Current limit: $limit");
					break;
				}

				$index++;
				if ($index >= $limit)
					break;
			}

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}

        function Execute()
		{
			$this->TimerStart();

			$primes = array(3, 5, 7, 11);
			$prime_factor = array();
			$num = 600851475143;
			$limit = floor(sqrt($num));
			if ($limit % 2 == 0)
			{
				$limit++;
			}

			for ($i = $primes[count($primes)-1]; $i <= $limit; $i+=2)
			{
				if ($this->isPrime($i, $primes))
				{
					$primes[] = $i;

					if ($this->Mod($num, $i) == 0)
					{
						$prime_factor[] = $i;
					}
				}
			}

			$answer = $prime_factor[count($prime_factor)-1];

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}

        function ExecuteCPP()
		{
			$this->TimerStart();

			$num = 600851475143;
			$divisor = 2;

			while ($num > 1)
			{
				if ($this->Mod($num, $divisor) == 0)
				{
					$number /= $divisor;
					$divisor--;
				}
				$divisor++;
			}

			$answer = $divisor;

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

