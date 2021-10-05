<?php

session_unset();
session_destroy();

header('Location: ' . $GLOBALS["base"] .'home');
exit;