<?php
/**
 * logout.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

session_start();
session_unset();
session_destroy();

header('Location: connexion.php');
?>
