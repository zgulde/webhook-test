<?php

// append $contents to $filename on a new line
function append($filename, $contents) {
    file_put_contents(
        $filename,
        file_get_contents($filename) . PHP_EOL . $contents
    );
}

$key = require '../key.php';
$timestamp = date('Y-m-d H:i:s');

$content = PHP_EOL;
$content .= '#####################################################' . PHP_EOL;
$content .= $timestamp . PHP_EOL;
$content .= '--- Headers ---' . PHP_EOL;
$content .= var_export(get_headers(), true) . PHP_EOL;
$content .= '--- Signature Matches ---' . PHP_EOL;
$content .= '--- http_get_request_body ---' . PHP_EOL;
$content .= http_get_request_body() . PHP_EOL;
$content .= '--- json_encode($_POST) ---' . PHP_EOL;
$contnet .= json_encode($_POST) . PHP_EOL;

append('./log.txt', $content);


// TODO
// verify signature
// .action == "closed" && .pull_request.merged == true
// .pull_request.base.ref == "master"

