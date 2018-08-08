<?php
session_start();

function __autoload($className) {
    require_once 'classes/' . $className . ".php";
}
