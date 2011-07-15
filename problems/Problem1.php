<?php

	class Problem1 extends Problem
	{
        function __construct()
		{
            $this->description = "If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23." .
								 "<br /><br />Find the sum of all the multiples of 3 or 5 below 1000.";
		}

        function Execute()
		{
			$this->TimerStart();

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

			$this->TimerEnd();
			$this->answer = $sum;
			return $this->answer;
		}
	}
?>

