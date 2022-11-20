<?php
	function get_badge($channel_name=FALSE): string
	{
		if ($channel_name==FALSE) {
			return "https://img.shields.io/badge/dynamic/json.svg?url=https://coven.irc4fun.net/stats.json&label=IRC4Fun&query=$.usercount&suffix=%20online&link=https:%2F%2Firc4fun.net&link=https:%2F%2Fapocalypse.irc4fun.net%2F&colorB=%2300cc00";
		}
		$name_url = urlencode($channel_name);
		$name_link = urlencode(substr($channel_name,1));
		$stats = json_decode(file_get_contents("https://coven.irc4fun.net/stats.json")) ?? array("channels"=>[]);
		foreach ($stats->channels as $key=>$channel) {
			if ($channel->name==$channel_name) {
				return "https://img.shields.io/badge/dynamic/json.svg?url=https://coven.irc4fun.net/stats.json&label=IRC4Fun&query=$.channels[$key].usercount&suffix=%20online%20on%20$name_url&link=https:%2F%2Fapocalypse.irc4fun.net&link=https:%2F%2Fapocalypse.irc4fun.net/%2F$name_link&colorB=%2300cc00";
			}
		}
		return "https://img.shields.io/badge/IRC4Fun-invalid%20channel-red.svg";
	}