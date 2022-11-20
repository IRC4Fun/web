<?php
include 'shieldsio.php';
if (!isset($_GET["channel"])) {
	$badge = get_badge();
} else {
	$badge = get_badge($_GET["channel"]);
}
header("Location: $badge");
die();