<?php
require '../autoload.php';

Auth::logout();

header('Location: /');
