<html>
<body>
	You posted "
	<?php
	$file = "Blog.txt";
	$new = "<newPost>";
	// The new person to add to the file
	$content = $_GET[content];
	// Write the contents to the file, 
	// using the FILE_APPEND flag to append the content to the end of the file
	// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
	file_put_contents($file, $new, FILE_APPEND | LOCK_EX);
	file_put_contents($file, $content, FILE_APPEND | LOCK_EX);	
	echo $_GET[content]; 
	?>
	"
</body>
</html>