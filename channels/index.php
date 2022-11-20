<?php
$stats = json_decode(file_get_contents("https://coven.irc4fun.net/stats.json"));
include __DIR__."/header.php";
?>
<font face="monospace" size="9">

	<a name="top"></a>
	<ul>
	<li> <font face="monospace" size="4"><img src="https://irc4fun.net/wp-content/uploads/2021/01/find.png"> There are <img src="https://irc4fun.net/wp-content/uploads/2021/01/group-1.png"> <strong><?=$stats->usercount?></strong> users & <img src="https://irc4fun.net/wp-content/uploads/2021/01/user_suit.png"> <strong><?=$stats->opercount?></strong> staff members across <img src="https://irc4fun.net/wp-content/uploads/2021/01/chat.png"> <strong><?=$stats->channelcount?></strong> channels.</li>
	<li> <font face="monospace" size="4"><img src="https://irc4fun.net/wp-content/uploads/2021/01/chat.png"> Channels with <a href="https://irc4fun.net/kb/general/other/channel-modes/" target="_top">chanmode +s</a> set will be excluded from the list. <img src="https://irc4fun.net/wp-content/uploads/2021/01/srvr_info.png"></li>
	<li> <font face="monospace" size="3">(the table is sortable by clicking on the column headers -- click on a <strong>#ChannelName</strong> to join it via <img src="https://irc4fun.net/wp-content/uploads/2021/01/chat-icon.png"> <a href="https://apocalypse.irc4fun.net/" target="_blank"><strong>WebChat</strong></a>, in a new window)</li>
	</ul>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th bgcolor="#1e73be"><font color="#FFFFFF">Name</th>
					<th bgcolor="#1e73be"><font color="#FFFFFF">Users</th>
					<th bgcolor="#1e73be"><font color="#FFFFFF">Topic</th>
				</tr>
			</thead>
			<tbody data-link="row" class="rowlink">
				<?php foreach($stats->channels as $channel): ?>
					<tr>
						<td><a href="<?=$channel->webchatlink?>" target="_blank"><img src="https://irc4fun.net/wp-content/uploads/2021/01/chat-icon.png"> <?=$channel->name?></a></td>
						<td><?=$channel->usercount?></td>
						<td style="word-wrap: break-word; white-space: pre-wrap; max-width:700px"><?=$channel->topic?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<hr>
	<p>(Also available in <a href="https://coven.irc4fun.net/stats.json">json</a>) [ <a href="https://irc4fun.net/" target="_top">Home</a> - <a href="https://apocalypse.irc4fun.net/#IRC4Fun" target="_blank">Web Chat</a> - <a href="https://webserv.irc4fun.net/" target="_blank">Services Web Panel</a> - <a href="#top">Back to Top</a> ]</p>
	<script>
		// sort stats page
		const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;
		const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
			v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
			)(getCellValue(asc ? b : a, idx), getCellValue(asc ? a : b, idx));
		// do the work...
		document.querySelectorAll('th').forEach(function(th) {
		  th.addEventListener('click', (() => {
			const table = th.closest('table').querySelector("tbody");
			Array.from(table.querySelectorAll('tr'))
				.sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
				.forEach(tr => table.appendChild(tr) );
		  }));
		  th.style.cursor = 'pointer';
		});
	</script>
</font>
