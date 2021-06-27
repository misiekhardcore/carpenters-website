<?php
session_start();
session_unset();
header('Location: ../upload.php?log=out');