# php-rat
A simple remote access tool (RAT) for PHP

1. For learning purpose only

2. "main.php" is curated for Linux server. If you want it to work in Windows environment, simply edit the commands to Windows-equivalent command. Such as "ifconfig" (Linux) into "ipconfig" (Windows).

3. When uploaded to a target server, their system will probably rename the file name "main.php" into something else. When this happen, the program functions will not work because it still refers itself to the original name "main.php" when processing POST request. In order to make it work, you need to somehow edit the "main.php" into their system-decided name.

4. I recommend you upload this RAT into your own test environment first to practice.

