
<?php

	class Problem8 extends Problem
	{
        function __construct()
		{
            $this->description = "Find the greatest product of five consecutive digits in the 1000-digit number.<br />" .
							'<br /><span class="indent small">73167176531330624919225119674426574742355349194934</span>' .
							'<br /><span class="indent small">96983520312774506326239578318016984801869478851843</span>' .
							'<br /><span class="indent small">85861560789112949495459501737958331952853208805511</span>' .
							'<br /><span class="indent small">12540698747158523863050715693290963295227443043557</span>' .
							'<br /><span class="indent small">66896648950445244523161731856403098711121722383113</span>' .
							'<br /><span class="indent small">62229893423380308135336276614282806444486645238749</span>' .
							'<br /><span class="indent small">30358907296290491560440772390713810515859307960866</span>' .
							'<br /><span class="indent small">70172427121883998797908792274921901699720888093776</span>' .
							'<br /><span class="indent small">65727333001053367881220235421809751254540594752243</span>' .
							'<br /><span class="indent small">52584907711670556013604839586446706324415722155397</span>' .
							'<br /><span class="indent small">53697817977846174064955149290862569321978468622482</span>' .
							'<br /><span class="indent small">83972241375657056057490261407972968652414535100474</span>' .
							'<br /><span class="indent small">82166370484403199890008895243450658541227588666881</span>' .
							'<br /><span class="indent small">16427171479924442928230863465674813919123162824586</span>' .
							'<br /><span class="indent small">17866458359124566529476545682848912883142607690042</span>' .
							'<br /><span class="indent small">24219022671055626321111109370544217506941658960408</span>' .
							'<br /><span class="indent small">07198403850962455444362981230987879927244284909188</span>' .
							'<br /><span class="indent small">84580156166097919133875499200524063689912560717606</span>' .
							'<br /><span class="indent small">05886116467109405077541002256983155200055935729725</span>' .
							'<br /><span class="indent small">71636269561882670428252483600823257530420752963450</span>';
		}

        function Execute()
		{
			$this->TimerStart();

			$numString  = "73167176531330624919225119674426574742355349194934";
			$numString .= "96983520312774506326239578318016984801869478851843";
			$numString .= "85861560789112949495459501737958331952853208805511";
			$numString .= "12540698747158523863050715693290963295227443043557";
			$numString .= "66896648950445244523161731856403098711121722383113";
			$numString .= "62229893423380308135336276614282806444486645238749";
			$numString .= "30358907296290491560440772390713810515859307960866";
			$numString .= "70172427121883998797908792274921901699720888093776";
			$numString .= "65727333001053367881220235421809751254540594752243";
			$numString .= "52584907711670556013604839586446706324415722155397";
			$numString .= "53697817977846174064955149290862569321978468622482";
			$numString .= "83972241375657056057490261407972968652414535100474";
			$numString .= "82166370484403199890008895243450658541227588666881";
			$numString .= "16427171479924442928230863465674813919123162824586";
			$numString .= "17866458359124566529476545682848912883142607690042";
			$numString .= "24219022671055626321111109370544217506941658960408";
			$numString .= "07198403850962455444362981230987879927244284909188";
			$numString .= "84580156166097919133875499200524063689912560717606";
			$numString .= "05886116467109405077541002256983155200055935729725";
			$numString .= "71636269561882670428252483600823257530420752963450";

			$answer = 1;
			$digits = "";
			$largeSum = 0;
			$index = 0;
			$valArray = array();

			for ($i = 0; $i < strlen($numString); $i++)
			{
				$valArray[] = intval(substr($numString, $i, 1));
			}

			for ($i = 0; $i < count($valArray) - 4; $i++)
			{
				$sum = 0;
				$tdigits = "";
				for ($x = 0; $x < 5; $x++)
				{
					$sum += $valArray[$x + $i];
					$tdigits .= strval($valArray[$x + $i]);
				}
				if ($sum > $largeSum)
				{
					$digits = $tdigits;
					$largeSum = $sum;
					$index = $i;
				}
			}

			for ($i = 0; $i < 5; $i++)
			{
				$answer *= $valArray[$index + $i];
			}

			$this->AddDebugLine("Largest digit string: $digits");

			$this->TimerEnd();
			$this->answer = $answer;
			return $this->answer;
		}
	}
?>
