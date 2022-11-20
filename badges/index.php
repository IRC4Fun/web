<?php

?>
<h1>IRC4Fun online status badges</h1>
<p>Thanks to <a href="https://shields.io/">shields.io</a> and custom badge support, we now have user count badges!</p>
<table>
	<thead>
		<tr>
			<th>Example</th><th>URL</th><th>Result</th>
		</tr>
	</thead>
	<tr>
		<td>Network user count</td><td>https://irc4fun.net/badges/badge.php</td><td><img src="badge.php" alt="user count badge"></td>
	</tr>
	<tr>
		<td>User count for #IRC4Fun</td><td>https://irc4fun.net/badges/badge.php?channel=%23irc4fun</td><td><img src="badge.php?channel=%23irc4fun" alt="#IRC4Fun badge"></td>
	</tr>
	<tr>
		<td>Invalid channel name (error handling)</td><td>https://irc4fun.net/badges/badge.php?channel=invalid</td><td><img src="badge.php?channel=invalid" alt="invalid badge"></td>
	</tr>
</table>
