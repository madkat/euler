
<?php

	class Problem6 extends Problem
	{
        function __construct()
		{
            $this->description = "The sum of the squares of the first ten natural numbers is," .
								 '<br /><br /><span class="indent">1^2 + 2^2 + ... + 10^2 = 385</span>' .
								 '<br /><br />The square of the sum of the first ten natural numbers is,' .
								 '<br /><br /><span class="indent">(1 + 2 + ... + 10)^2 = 55^2 = 3025</span>' .
								 '<br /><br />Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 - 385 = 2640.' .
								 "<br /><br />Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.";
		}

		function SumOfSquares($number)
		{
			$sum = 0;
			for ($i = 1; $i <= $number; $i++)
			{
				$sum += $i * $i;
			}
			return $sum;
		}

		function SquareOfSums($number)
		{
			$sum = 0;
			for ($i = 1; $i <= $number; $i++)
			{
				$sum += $i;
			}
			return $sum * $sum;
		}

        function Execute()
		{
			$this->TimerStart();
			$answer = $this->SquareOfSums(100) - $this->SumOfSquares(100);

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

