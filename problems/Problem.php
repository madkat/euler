<?php

	class Problem
	{
        protected $description = null;
        protected $answer = null;
        protected $time = null;
        protected $debug = "";

        function __construct()
		{

		}

		protected function AddDebug($data = "")
		{
			$this->debug .= $data;
		}

		protected function AddDebugLine($data = "")
		{
			$this->debug .= $data . "<br />\n";
		}

        public function GetDescription()
		{
            return $this->description;
		}

        public function GetTimeElapsed()
		{
            return $this->time;
		}

		public function GetDebugOutput()
		{
			return $this->debug;
		}

        public function GetAnswer()
		{
            return $this->answer;
		}

        public function Execute()
		{
		}

		protected function TimerStart()
		{
            $this->time = $this->PHP5_MicrotimeFloat();
		}

        protected function TimerEnd()
		{
            $this->time = $this->PHP5_MicrotimeFloat() - $this->time;
		}

		public function PHP5_MicrotimeFloat()
		{
			list($usec, $sec) = explode(" ", microtime());
			return ((float)$usec + (float)$sec);
		}
	}

?>

