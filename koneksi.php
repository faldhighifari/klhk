<?php

// connecting, selecting database
// anda harus sesuaikan dbnam, user dan password sesuai dengan setting pada database server anda

$conn_string = "host=localhost port=5433 dbname=pkl user=postgres password=student";

$connection = pg_connect($conn_string);

