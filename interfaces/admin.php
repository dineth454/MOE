<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<h1>Hi i'm the ADMIN bro!!</h1><br><br>

<?php
echo "Favorite color is " . $_SESSION["roleTypeID"] . ".<br>";
echo "Favorite animal is " . $_SESSION["fullName"] . ".";
?>
</body>
</html> 