<?php
if ($queryServer !== null) {
    $server = $queryServer;
    require dirname(__FILE__) . '/partials/online.php';
} else if ($pingServer !== null) {
    $server = $pingServer;
    require dirname(__FILE__) . '/partials/online.php';
} else {
    require dirname(__FILE__) . '/partials/offline.php';
}
?>
