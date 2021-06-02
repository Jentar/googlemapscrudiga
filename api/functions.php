<?php

function fail(String $msg) {
	exit(json_encode([
		"status" => 0,
		"msg" => $msg,
	]));
}
