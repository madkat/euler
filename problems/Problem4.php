
<?php
	include "Problem.php";

	class Problem4 extends Problem
	{
        function __construct()
		{
            $this->description = "A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91*99." .
								 "<br /><br />Find the largest palindrome made from the product of two 3-digit numbers.";
		}

        function Execute()
		{
			$this->TimerStart();

			function isPalindrome($number)
			{
				$stringNum = strval($number);
				$numArray = array();
				$len = strlen($stringNum);
				$odd = $len % 2;
				if ($odd)
				{
					$len--;
					$odd = $len / 2;
				}
				for ($i = 0; $i < $len; $i++)
				{
					if ($odd && $i == $odd)
					{

					}
					else
					{
						$numArray[] = substr($stringNum, $i, 1);
					}
				}


				for ($i = 0; $i < $len / 2; $i++)
				{
					if ($numArray[$i] != $numArray[$len - 1 - $i])
						return false;
				}

				return true;
			}

			$largestVal = 999 * 999;
			$smallestVal = 100 * 100;
			$found = false;
			$answer = 0;

			for ($i = $largestVal; $i > $smallestVal; $i--)
			{
				if (isPalindrome($i))
				{
					for ($x = 999; $x >= 100; $x--)
					{
						if ($i % $x == 0 && strlen(strval($i / $x)) < 4)
						{
							$this->AddDebugLine("Found Palindrome: $i");
							$this->AddDebugLine("$x * " . $i / $x);
							$found = true;
							$answer = $i;
							break;
						}
					}
					if ($found)
						break;
				}
			}

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

