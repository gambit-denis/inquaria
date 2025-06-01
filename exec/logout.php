<?php
session_start();
session_unset();    // Fshin të gjitha të dhënat nga sesioni
session_destroy();  // Shkatërron sesionin

header("Location: ../index.php");  // Ridrejto në faqen kryesore
exit;
