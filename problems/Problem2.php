
<?php
	
	class Problem2 extends Problem
	{
        function __construct()
		{
            $this->description = "Each new term in the Fibonacci sequence is generated by adding the previous two terms. By starting with 1 and 2, the first 10 terms will be:".
								 "<br /><br /><span class='indent'>1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...</span>" .
								 "<br /><br />By considering the terms in the Fibonacci sequence whose values do not exceed four million, find the sum of the even-valued terms.";
		}

        function Execute()
		{
			$this->TimerStart();

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

			$this->TimerEnd();
			$this->answer = $sum;
			return $this->answer;
		}
	}
?>

