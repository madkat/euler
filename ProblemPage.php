<?php
	function __autoload($class_name)
	{
		if (strpos($class_name, "Problem") !== false)
		{
			include "problems/" . $class_name . '.php';
		}
	}

	function __errorHandler($errno, $errstr, $errfile = "", $errline = "")
	{
		echo json_encode(array("debug" => "Error $errno in file $errfile on line $errline: $errstr"));
	}

	set_error_handler("__errorHandler");

	$problemPage = new ProblemPage();
    echo $problemPage;

	class ProblemPage
	{
		var $req_function;
		var $req_id;
		var $req_parameters;
        var $json_result = "";

		function __construct()
		{
			if (isset($_REQUEST["f"]))
				$this->req_function = $_REQUEST["f"];
			else
				$this->req_function = "exec";

			if (isset($_REQUEST["id"]))
				$this->req_id = $_REQUEST["id"];
			else
				$this->req_id = "1";

			switch ($this->req_function)
			{
				case "desc":
                    $this->ProblemGetDescription();
                    break;
                case "list":
                	$this->ProblemGetList();
                	break;
				case "exec":
				default:
					$this->ProblemExecute();
					break;
			}
		}

        function __toString()
		{
            return $this->json_result;
		}

		function ProblemGetDescription()
		{
			$exec_class = "Problem" . $this->req_id;
			$problem = new $exec_class();
            $description = $problem->GetDescription();
            $this->json_result = json_encode(array("description" => $description));
		}

		function ProblemExecute()
		{
			$exec_class = "Problem" . $this->req_id;
			$problem = new $exec_class();

            $answer = $problem->Execute();
            $time = $problem->GetTimeElapsed();
            $debug = $problem->GetDebugOutput();
            $this->json_result = json_encode(array("answer" => $answer, "time" => $time, "debug" => $debug));
		}

		function ProblemGetList()
		{
			$fileList = scandir("problems");
			$parsedFiles = array();

			foreach ($fileList as $file)
			{
				if (strlen($file) > 11 && strpos($file, "Problem") !== false)
				{
					$extension = substr($file, strrpos($file, "."));
					$problem_id = substr($file, 7, strrpos($file, ".") - 7);
					$parsedFiles[] = array($problem_id => "Problem $problem_id");
				}
			}

			$this->json_result = json_encode($parsedFiles);
		}
	}
?>
