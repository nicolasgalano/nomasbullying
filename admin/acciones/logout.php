<?php
require '../autoload.php';

Auth::logout();

header('Location: ../index.php');
