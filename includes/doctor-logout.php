<?php

session_start();
session_unset();
session_destroy();

?>

<?php

session_start();

$_SESSION['logout'] = 1;

header("Location: ../doctor.php?logout=success");
exit();
