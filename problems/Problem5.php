
<?php

	class Problem5 extends Problem
	{
        function __construct()
		{
            $this->description = "2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder." .
            "<br /><br />What is the smallest positive number that is evenly divisible (with no remainder) by all of the numbers from 1 to 20?";
		}

        function Execute()
		{
			$this->TimerStart();
			$values = array();
			for ($i = 1; $i <= 20; $i++)
			{
				$values[] = $i;
			}

			// Any likely value has to be a multiple of both
			// of the largest values.
			$increment = $values[count($values)-1] * $values[count($values)-2];
			$prospect = 0;
			$valueNotFound = true;

			while ($valueNotFound)
			{
				$prospect += $increment;
				for ($i = count($values) - 1; $i >= 0; $i--)
				{
					if ($prospect % $values[$i] != 0)
					{
						$valueNotFound = true;
						break;
					}
					else
					{
						$valueNotFound = false;
					}
				}
			}


			$answer = $prospect;

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

