<?php
    error_reporting(E_ALL ^ E_WARNING);
    $db = new PDO('mysql:host=127.0.0.1:3306', 'root', 'root');
    $db->query('USE rubicon;');

