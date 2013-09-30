<?php
$language = array('Mandarin','British','Caribbean','French','Japanese','Cantonese','Filipino','German','Portuguese','Russian','Singaporean','Australian', 'Cat','Ermahgerd');
include('magic.php');
$opening = 'Hello, ladies, look at your man, now back to me, now back at your man, now back to me. Sadly, he isn\'t me, but if he stopped using ladies scented body wash and switched to Old Spice, he could smell like he\'s me. Look down, back up, where are you? You\'re on a boat with the man your man could smell like. What\'s in your hand, back at me. I have it, it\'s an oyster with two tickets to that thing you love. Look again, the tickets are now diamonds! Anything is possible when your man smells like Old Spice and not a lady. I\'m on a horse.';
$slogans = array(
			'Helping people talk different languages like a fob since 2010, la.',
			'Simpricity at its best.',
			'So fresh off the boat, you can still smell the saltwater.',
			'Be Fobulous in two simple steps: 1) type in words; 2) read the translation out loud.'
		);
$rand = array_rand($slogans);
$noColumns = 5;
if ($_GET['l']) $i = $_GET['l'];
else if ($_SERVER['QUERY_STRING']) $i = $_SERVER['QUERY_STRING'];
if (!is_int($i)) {
	$i = array_search(ucfirst($i), $language)+1;
}
if (!$i) $i = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us" > 
<head>
	<meta name="title" content="FobTalk" />
	<link rel="image_src" href="http://fobtalk.com/fobtalk.fb.png" />
	<meta property="og:image" content="http://fobtalk.com/fobtalk.fb.png" />
	<meta name="google-site-verification" content="bapBsMJ8lwYL5Q38NW1rqfiqDlcuOFw-taG513A0Jw4" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<meta name="description" content="FobTalk translates any words you enter according to a language of your choice in real-time!" />
	<meta name="keywords" content="fobtalk, fob, talk, fobby, translation, english, chinese, mandarin, cantonese, japanese, filipino, german, french, caribbean, russian, cat, australian, singaporean, portuguese, fobtalk" />
	<title>FobTalk</title>
	<script type="text/javascript" charset="UTF-8" src="jquery.js"></script> 
	<script type="text/javascript" charset="UTF-8">
		$(function() {
			$("#a").bind("keyup", function(){ if ($("#a").val()) { $.post("magic.php", { s: $("#a").val(), l: $("input[name='language']:checked").val() }, function(data){ $("#b").val(data); }); } else { $("#b").val(""); } }).focus().select();
			$("input[name='language']").bind("click", function(){ $.post("magic.php", { s: $("#a").val(), l: this.value }, function(data){ $("#b").val(data); }); $("#a").focus().select(); $("#url").val('http://fobtalk.com/?'+this.value).mouseenter(function() { this.select(); }); $("#sellang").html($(this).attr("title")); $("#shareurl").show(); });
		});
	</script>
	<style type="text/css">
		body { font-family: arial, sans-serif; font-size: 12px; background: #F0F0E6; text-align: center; }
		a { text-decoration: none; font-weight: bold; color: #55ce00; }
		a:hover { text-decoration: underline; }
		textarea { font-family: arial, sans-serif; font-size: 12px; width: 387px; border: 1px solid #ccc; padding: 3px; }
		textarea:hover { border: 1px solid #bbb; }
		table { margin: 0 auto; }
		td td { padding-right: 35px; }
		div#box { width: 800px; margin: 0 auto; text-align: center; border: 1px solid #ccc; background: #fff; padding: 10px; }
		#copyright { font-size: 11px; padding-top: 15px; color: #777; }
		#url { width: 200px; }
		#a { margin-bottom: 10px; }
		#b { background: #efffe4; }
		td { vertical-align: top; text-align: left; }
		h1 { margin: 0 auto; }
		h2 { color: #666; }
		h3 { margin: 0; font-size: 14px; }
		#shareurl { display: none; font-size: 12px; color: #555; font-weight: bold; }
	</style>
</head> 
 
<body> 
	<img src="fobtalk.png" alt="FobTalk" title="FobTalk" />
	<h2><?=$slogans[$rand]?></h2>
	<div id="box">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr><td>
			<h3>English</h3>
			<textarea id="a" rows="10" cols="30"><?=$opening?></textarea><br />
			</td><td>
				<h3>Fobbish</h3>
				<textarea id="b" rows="10" cols="30" readonly="readonly"><?=harro(' '.$opening.' ', $language[$i-1])?></textarea>
			</td></tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="0" width="75%">
			<tr>
			<?
			$k = 1;
			foreach ($language as &$value) {
				echo '<td><input type="radio" name="language" value="'.strtolower($value).'" rel="'.$k.'" id="a_'.$value.'" title="'.$value.'"';
				if ($i == $k || $i == strtolower($value)) echo ' checked="checked"';
				if ($value == 'Ermahgerd') echo ' /> <label for="a_'.$value.'" title="'.strtoupper($value).'">'.strtoupper($value).'</label></td>';
				else echo ' /> <label for="a_'.$value.'" title="'.$value.'">'.$value.'</label></td>';
				if ($k % $noColumns == 0) echo '</tr><tr>';
				$k++;
			}
			?>
			</tr>
		</table>
		<div id="shareurl" class="hide"><br />Share the <span id="sellang"></span> love: <input type="text" id="url" value="" readonly="readonly" /></div>
		<div id="copyright"><b>Do you use Google Chrome? Add the <a href="https://chrome.google.com/extensions/detail/hjhecmmednfhjmcenacamhcekjpiggmi" target="_blank">Official FobTalk.com Extension</a>!</b><br /><br /><a href="http://www.youtube.com/user/fobtalker" target="_blank"><img src="youtube.png" alt="FobTalk on YouTube" title="FobTalk on YouTube" border="0" /></a> <a href="https://twitter.com/fobtalk/" target="_blank"><img src="twitter.png" alt="@fobtalk" title="@fobtalk" border="0" /></a> <a href="http://www.facebook.com/sharer.php?u=http://fobtalk.com/" target="_blank"><img src="facebook.png" alt="Share FobTalk.com on Facebook" title="Share FobTalk.com on Facebook" border="0" /></a> <a href="mailto:fobtalk@gmail.com"><img src="email.png" alt="fobtalk@gmail.com" title="fobtalk@gmail.com" border="0" /></a>
		<br />&copy; Naryan W. and Andrew Y.</div>
	</div>
	<script type="text/javascript">
		var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-XXXXXXXX-1']); _gaq.push(['_trackPageview']);
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>