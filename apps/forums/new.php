<html>
	<head>
		<script>
			function SubmitForm()
			{
				var frm = document.getElementById("editSubmit");

				frm.submit();
			}
		</script>
	</head>
</html>

<?php
	session_start();

	$title = $_POST['title'];
	$body = $_POST['body'];
  	$images = $_POST['images'];
	$user = $_SESSION['username'];
  
	include("../../../password.php");
  
	$conn = new mysqli($servername, $server_user, $serverpassword, "forums");
	  
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

  	$images = str_replace(" ", "⎖", $images);

	$result = $conn->query("INSERT INTO posts(title, body, image_links, user) VALUES ('$title', '$body', '$images', '$user')");

	$conn->close();

	echo "<script>location.href = 'browse.php';</script>";
?>