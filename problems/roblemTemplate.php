
<?php

	class ProblemT extends Problem
	{
        function __construct()
		{
            $this->description = "Problem Description";
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

