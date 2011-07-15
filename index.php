<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">

			#header {
			    margin-left: auto;
				margin-right: auto;
				padding: 10px;
				width: 550px;
				height: 40px;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
				background-color: #dfdfdf;
				color: #000000;
				font-weight: 600;
				font-size: 24pt;
				font-family: sans-serif;
				letter-spacing: 2px;
			}

			#page_frame {
				position: relative;
				margin-left: auto;
				margin-right: auto;
				margin-top: 11px;
				padding: 10px;
				width: 600px;
				height: 505px;
				border-bottom-left-radius: 10px;
				border-bottom-right-radius: 10px;
				background-color: #dfdfdf;
				color: #000000;
			}

			#sidebar {
				position: relative;
				border-radius: 7px;
				margin: 0 0 0 0px;
				margin-left: -50px;
				padding: 10px;
				width: 120px;
				height: 467px;
				border: 7px solid #999999;
				background-color: #ffffff;
				float: left;
				font-family: sans-serif;
				font-size: 9pt;
				overflow: auto;
			}

			#page {
				position: relative;
				border-radius: 7px;
				margin: 0 0 0 0px;
				margin-right: -50px;
				padding: 10px;
				width: 505px;
				height: 467px;
				border: 7px solid #999999;
				background-color: #ffffff;
				float: right;
				overflow: auto;
			}

			#loader {
				position: absolute;
				width: 55px;
				height: 55px;
				background-image: url("i/ajax-loader.gif");
				left: 215px;
				top: 215px;
				display: none;
			}

			#side-loader {
				position: absolute;
				width: 55px;
				height: 55px;
				background-image: url("i/ajax-loader.gif");
				left: 35px;
				top: 215px;
				display: none;
			}

			.indent {
				padding-left: 30px;
			}

			.small {
				font-size: 8pt;
				font-family: sans-serif;
			}

			ul.problem-menu {
				list-style-type: none;
				padding-left: 15px;
			}

			li.problem-entry {
				margin-bottom: 3px;
			}

			dl {
				margin-top: 5px;
				border-radius: 5px;
				background-color: #dddddd;
				overflow: auto;
			}

			dt {
				padding-left: 10px;
				padding-right: 10px;
				padding-top: 2px;
				padding-bottom: 2px;
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;
				background-color: #999999;
				color: #ffffff;
				font-family: sans-serif;
				font-size: 10pt;
				font-weight: 600;
			}

			dd {
				margin-left: 15px;
				padding-top: 5px;
				padding-bottom: 5px;
				padding-right: 10px;

			}

			#content-description {
				display: none;
			}
			#content-answer {
				display: none;
			}
			#content-time {
				display: none;
			}
			#content-debug {
				display: none;
			}

			#problem-menu {
				padding-bottom: 10px;
			}

			#problem-menu dt {
				font-size:9pt;
			}

			dd.problem-entry {
				font-size: 9pt;
				margin-top: 3px;
			}

			dd.problem-entry a:visited {
				color: #000000;
			}

			dd.problem-entry a:link {
				color: #000000;
			}

		</style>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			loadSidebar();
		});

		function loadSidebar()
		{
			$.getJSON('ProblemPage.php?f=list', function(data) {
				$("#problem-menu dd").fadeOut();
				$("#side-loader").fadeIn(function() {
					$("#problem-menu dd").remove();
					var i;
					for (i = 1; i <= data.length; i++)
					{
						$("#problem-menu").append('<dd class="problem-entry">' +
												  '<a data-id="' + i + '" href="ProblemPage.php?id=' + i + '">' +
												  'Problem ' + i + '</a></dd>');
					}
					bindLinks();
					$("#side-loader").fadeOut();
					setTimeout(loadSidebar, 30000);
				});
			});
		}

		function bindLinks()
		{
			$("a").click(function(event){
				event.preventDefault();
				$("#content-description").fadeOut();
				$("#content-answer").fadeOut();
				$("#content-time").fadeOut();
				$("#content-debug").fadeOut();
				$("#loader").fadeIn(function(){
					var id = $(event.currentTarget).attr("data-id");
					requestDescription(id);
					requestAnswer(id);
				});
			});
		}

		function requestDescription(id)
		{

			$.getJSON('ProblemPage.php?f=desc&id=' + id, function(data) {
				$("#content-description > dd").html(data.description);
				$("#content-description").slideDown();
			});
		}

		function requestAnswer(id)
		{

			$.getJSON('ProblemPage.php?f=exec&id=' + id, function(data) {
				$("#content-answer > dd").html(data.answer);
				$("#content-answer").slideDown();
				$("#content-time > dd").html(data.time + " seconds");
				$("#content-time").slideDown();
				if (data.debug != undefined && data.debug != "")
				{
					$("#content-debug > dd").html(data.debug);
					$("#content-debug").slideDown();
				}
				$("#loader").fadeOut();
			});
		}

		</script>
	</head>
	<body>
		<div id="header">
			/madkat/euler
		</div>
		<div id="page_frame">
			<div id="sidebar">
				<dl id="problem-menu">
					<dt>Euler Problems</dt>

				</dl>
				<div id="side-loader"></div>
			</div>
			<div id="page">
				<div id="content">
					<dl id="content-description">
						<dt>Description</dt>
						<dd>
							If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.
							<br /><br />Find the sum of all the multiples of 3 or 5 below 1000.
						</dd>
					</dl>
					<dl id="content-answer">
						<dt>Answer</dt>
						<dd>
							Large farva
						</dd>
					</dl>
					<dl id="content-time">
						<dt>Time Elapsed</dt>
						<dd>
							Literacola
						</dd>
					</dl>
					<dl id="content-debug">
						<dt>Debug Output</dt>
						<dd>
							Literacola
						</dd>
					</dl>
				</div>
				<div id="loader"></div>
			</div>
		</div>
	</body>
</html>



<?php
	function RenderMenu()
	{
		$fileList = scandir("problems");

		echo "<dl id='problem-menu'>\n";
		echo "<dt>Euler Problems</dt>\n";

		foreach ($fileList as $file)
		{
			if (strlen($file) > 11 && strpos($file, "Problem") !== false)
			{
				RenderListItem($file);
			}
		}

		echo "</dl>\n";
	}

	function RenderListItem($file)
	{
		echo "<dd class='problem-entry'>\n";

		$extension = substr($file, strrpos($file, "."));
		$problem_id = substr($file, 7, strrpos($file, ".") - 7);
		$file = substr($file, 0, strrpos($file, "."));

		echo "<a href='ProblemPage.php?id=" . $problem_id . "' data-id='" .$problem_id . "'>";
		echo $file;
		echo "</a>\n";

		echo "</dd>\n";
	}

?>

