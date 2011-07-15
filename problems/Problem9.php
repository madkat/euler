
<?php

	class Problem9 extends Problem
	{
        function __construct()
		{
            $this->description = "A Pythagorean triplet is a set of three natural numbers, a < b < c, for which," .
			'<br /><br /><span class="indent">a^2 + b^2 = c^2</span>' .
			'<br /><br />For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.' .
			'<br /><br />There exists exactly one Pythagorean triplet for which a + b + c = 1000.' .
			"Find the product abc.";
		}

        function Execute()
		{
			$this->TimerStart();

			$answer = "Not yet solved";

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>

