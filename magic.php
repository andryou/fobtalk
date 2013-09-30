<?php

if ($_POST['s'] && $_POST['l']) {
	$s = $_POST['s'];
	$l = $_POST['l'];
	echo translate(' '.stripslashes($s).' ', $l);
}

function translate($s, $l) {

	$genericasianpattern = array(
				'/([[:punct:][:space:]])(fork|knife)([[:punct:][:space:]])/',
				'/([[:punct:][:space:]])(Fork|Knife)([[:punct:][:space:]])/',
				'/([[:punct:][:space:]])([Hh])our([[:punct:][:space:]])/',
				'/([aiou])l([k])/i',
				'/([^aeiouy[:punct:][:space:]])(a|e|o|ou)r([gdpst[:punct:][:space:]])/i',
				'/([^aeiou])ould([[:punct:][:space:]])/i',
				'/le(s)?([[:punct:][:space:]])/i',
				'/ere([[:punct:][:space:]])/',
				'/([[:punct:][:space:]])are([[:punct:][:space:]])/',
				'/([[:punct:][:space:]])Are([[:punct:][:space:]])/',
				'/([^[:punct:][:space:]])([aeiou])r[lr]/',
				'/([^tTdDWwBb])R([^EeSstTKkCc\.[:space:]])/',
				'/([^tTdDWwBb\'])r([^EeSstTKkCc\.[:space:]])/',
				'/([^\'l])L/',
				'/([^\'l])l/',
				'/([^\'l[:punct:][:space:]])l/',
				'/([[:punct:][:space:]])?the([[:punct:][:space:]])/',
				'/([[:punct:][:space:]])?The([[:punct:][:space:]])/',
				'/ no\./i',
				'/[\']t/i',
				'/#####R#####/',
				'/#####r#####/'
			);

	$genericasianreplace = array(
				'$1chopsticks$3',
				'$1Chopsticks$3',
				'$1$2owah$3',
				'$1h$2',
				'$1ah$3',
				'$1ud$2',
				'el$1$2',
				'al$1',
				'$1ale$2',
				'$1Ale$2',
				'$1$2hl#####l#####',
				'$1#####L#####$2',
				'$1#####l#####$2',
				'$1R',
				'$1r',
				'$1rl',
				'$1dee$2',
				'$1Dee$2',
				' Nao!',
				'',
				'L',
				'l'
			);
	
	$chinesematch = array(
				'/\?([[:punct:][:space:]])/i',
				'/([^\'aeiou])v([aeiou])/'				
			);
	
	$chinesereplace = array(
				' ra?$1',
				'$1w$2'
			);

	$l = strtolower($l);
	if ($l == 'mandarin') {
		$patterns = array_merge(
						$creditspattern,
						$chinesematch,
						$genericasianpattern,
						array('/t[hH]/','/T[hH]/','/([[:punct:][:space:]])(dinnah|lunch)([[:punct:][:space:]])/','/([[:punct:][:space:]])(Dinnah|Lunch)([[:punct:][:space:]])/')
					);
		$replaces = array_merge(
						$creditsreplace,
						$chinesereplace,
						$genericasianreplace,
						array('s','S','$1wonton$3','$1Wonton$3')
					);
	} elseif ($l == 'british') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([^aeiouys])u([^[:punct:][:space:]])([aeiou])/',
							'/([^[:punct:][:space:]])ttle([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Ass([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])ass([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Man([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])man([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])boy([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Boy([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Crazy([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])crazy([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Child([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])child([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(Children|Kids|Babies)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(children|kids|babies)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(Crap|Fuck)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(crap|fuck)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(Great|Excellent)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])(great|excellent)([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Garbage([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Trash([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])garbage([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])trash([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Faucet([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])faucet([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Were([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])were([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Schedule([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])schedule([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Wa([t])/',
							'/([[:space:][:punct:]])wa([t])/',
							'/([[:space:][:punct:]])At all([[:space:][:punct:]])/',
							'/([[:space:][:punct:]])at all([[:space:][:punct:]])/',
							'/([^[:space:][:punct:]])ter/',
							'/([^[:space:][:punct:]])ther/',
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1ew$2$3',
							'$1-ill$2',
							'$1Arse$2',
							'$1arse$2',
							'$1Lad$2',
							'$1lad$2',
							'$1chap$2',
							'$1Chap$2',
							'$1Batty$2',
							'$1batty$2',
							'$1Ankle-biter$3',
							'$1ankle-biter$3',
							'$1Ankle-biters$3',
							'$1ankle-biters$3',
							'$1Bloody hell$3',
							'$1bloody hell$3',
							'$1Brilliant$3',
							'$1brilliant$3',
							'$1Rubbish$2',
							'$1Rubbish$2',
							'$1rubbish$2',
							'$1rubbish$2',
							'$1Tap$2',
							'$1tap$2',
							'$1Wur$2',
							'$1wur$2',
							'$1Shedule$2',
							'$1shedule$2',
							'$1War$2',
							'$1war$2',
							'$1A tall$2',
							'$1a tall$2',
							'$1tah',
							'$1tah'							
						)
					);
	} elseif ($l == 'cantonese') {
		$patterns = array_merge(
						$creditspattern,
						array('/([[:punct:][:space:]])person([[:punct:][:space:]])/i','/t[hH]/','/T[hH]/'),
						$chinesematch,
						$genericasianpattern,
						array('/! /i','/\? /i','/([[:punct:][:space:]])fuck you([[:punct:][:space:]])/i', '/([[:punct:][:space:]])(dinnah|lunch)([[:punct:][:space:]])/','/([[:punct:][:space:]])(Dinnah|Lunch)([[:punct:][:space:]])/')
					);
		$replaces = array_merge(
						$creditsreplace,
						array('$1Gwai Ro$2','t','T'),
						$chinesereplace,
						$genericasianreplace,
						array(' la! ','?! ','Diu Lei','$1dimsum$3','$1Dimsum$3')
					);
	} elseif ($l == 'japanese') {
		$patterns = array_merge(
						$creditspattern,
						array('/ou([^r])/i'),
						$genericasianpattern,
						array('/([[:punct:][:space:]])Herro([[:punct:][:space:]])/','/([[:punct:][:space:]])herro([[:punct:][:space:]])/','/([[:punct:][:space:]])cute([[:punct:][:space:]])/','/([[:punct:][:space:]])Cute([[:punct:][:space:]])/','/v/','/V/','/t[hH]/','/T[hH]/','/\? /i','/([[:punct:][:space:]])[Cc]ah([[:punct:][:space:]])/','/([[:punct:][:space:]])[Cc]amela([[:punct:][:space:]])/','/([[:punct:][:space:]])(hambulgah|steak|flies|dinner|lunch)([[:punct:][:space:]])/','/([[:punct:][:space:]])(Hambulgah|Steak|Flies|Dinner|Lunch)([[:punct:][:space:]])/','/([[:punct:][:space:]])(bideo game|praystation|x(-)?box)([[:punct:][:space:]])/i','/([[:punct:][:space:]])how are you([[:punct:][:space:]])/','/([[:punct:][:space:]])How are you([[:punct:][:space:]])/','/([pk])([[:punct:][:space:]])([^a-z])/i')
					);
		$replaces = array_merge(
						$creditsreplace,
						array('oo$1'),
						$genericasianreplace,
						array('$1Konnichiwa$2','$1konnichiwa$2','$1kawaii$2','$1Kawaii$2','b','B','s','S',' ne? ','$1Toyota$2','$1Fujifilm$2','$1sushi$3','$1Sushi$3','$1Nintendo$4','$1genki$3','$1Genki$3','$1-o$3')
					);
	} elseif ($l == 'filipino') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])([Oo])f([[:punct:][:space:]])/',
							'/v/',
							'/V/',
							'/b/',
							'/B/',
							'/f/',
							'/F/',
							'/Ph/',
							'/ph/',
							'/([[:punct:][:space:]])?th([^[:punct:][:space:]])/',
							'/([[:punct:][:space:]])?Th([^[:punct:][:space:]])/',
							'/([bp])er([[:punct:][:space:]])/i',
							'/#####v#####/',
							'/#####V#####/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1$2b$3',
							'#####b#####',
							'#####B#####',
							'v',
							'V',
							'p',
							'P',
							'P',
							'p',
							'$1d$2',
							'$1D$2',
							'$1ur$2',
							'b',
							'B'
						)
					);
	} elseif ($l == 'portuguese') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([^[:space:][:punct:]][^ascexh[:space:][:punct:]])t([[:punct:][:space:]])/',
							'/([^[:space:][:punct:]])([^ailen])d([[:punct:][:space:]])/',
							'/([^[:space:][:punct:]])uese([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Our([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])our([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])M[ae]n([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])m[ae]n([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Lady([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])lady([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])Bye([[:punct:][:space:]])/',
							'/([[:space:][:punct:]])bye([[:punct:][:space:]])/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1tche$2',
							'$1$2tche$3',
							'$1uesh$2',
							'$1Nossa$2',
							'$1nossa$2',
							'$1Homem$2',
							'$1homem$2',
							'$1Senhora$2',
							'$1senhora$2',
							'$1Ciao$2',
							'$1ciao$2'
						)
					);
	} elseif ($l == 'caribbean') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])you([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])You([[:punct:][:space:]])/',
							'/\? /i',
							'/([^aeiouy[:punct:]])(a|e|o|ou)r([[:punct:][:space:]]|[gdps])/i',
							'/([[:punct:][:space:]])?the([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])?The([[:punct:][:space:]])/',
							'/oor([[:punct:][:space:]])/',
							'/th([[:punct:][:space:]])/',
							'/([^aeio])ing([[:punct:][:space:]])/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1chu$2',
							'$1Chu$2',
							' mon? ',
							'$1ah$3',
							'$1da$2',
							'$1Da$2',
							'oar$1',
							't$1',
							'$1in\'$2'
						)
					);
	} elseif ($l == 'french') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])Hello([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])hello([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Cheese([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])cheese([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(tired|hungry|happy|sad|running|party)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Tired|Hungry|Happy|Sad|Running|Party)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Cc])ool([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Rr])ed([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Bb])lue([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Yellow([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yellow([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Green([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])green([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Purple([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])purple([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(dinner|lunch)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Dinner|Lunch)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])H/i',
							'/([[:punct:][:space:]])The([[:space:]])([AEIOUaeiou])/',
							'/([[:punct:][:space:]])The([[:space:]])([^AEIOUaeiou])/',
							'/([[:punct:][:space:]])the([[:space:]])([AEIOUaeiou])/',
							'/([[:punct:][:space:]])the([[:space:]])([^AEIOUaeiou])/',
							'/([[:punct:][:space:]])Thank(s| [Yy]ou)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])thank(s| [Yy]ou)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])?th/',
							'/([[:punct:][:space:]])?Th/',
							'/der([[:punct:][:space:]])/',
							'/([b])er([[:punct:][:space:]])/',
							'/([^AEIOUaeiou[:punct:][:space:]])or([[:punct:][:space:]]|[gdpstGDPST])/',
							'/([^AEIOUaeiou[:punct:][:space:]])Or([[:punct:][:space:]]|[gdpstGDPST])/',
							'/([^AEIOUaeiou[:punct:][:space:]])i([[:punct:][:space:]]|[gdpstGDPST])/',
							'/([^AEIOUaeiou[:punct:][:space:]])I([[:punct:][:space:]]|[gdpstGDPST])/',
							'/([[:punct:][:space:]])Monday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Tuesday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Wednesday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Zursday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Freeday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Saturday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Sunday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])monday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])tuesday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])wednesday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])zursday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])freeday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])saturday([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])sunday([[:punct:][:space:]])/',
							'/,/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1Bonjour$2',
							'$1bonjour$2',
							'$1Fromage$2',
							'$1fromage$2',
							'$1le $2$3',
							'$1Le $2$3',
							'$1$2hic$3',	
							'$1$2ouge$3',	
							'$1$2leu$3',	
							'$1Jaune$3',	
							'$1jaune$3',	
							'$1Vert$3',	
							'$1vert$3',	
							'$1Violette$3',	
							'$1violette$3',	
							'$1baguette$3',	
							'$1Baguette$3',	
							'$1\'',
							'$1L\'$3',
							'$1Le$2$3',
							'$1l\'$3',
							'$1le$2$3',
							'$1Merci$3',
							'$1merci$3',
							'$1z$2',
							'$1Z$2',
							'dur$1',
							'$1re$2',
							'$1aw$2',
							'$1Aw$2',
							'$1ee$2',
							'$1Ee$2',
							'$1Lundi$2',			
							'$1Mardi$2',			
							'$1Mercredi$2',			
							'$1Jeudi$2',			
							'$1Vendredi$2',			
							'$1Samedi$2',			
							'$1Dimanche$2',		
							'$1lundi$2',			
							'$1mardi$2',			
							'$1mercredi$2',			
							'$1jeudi$2',			
							'$1vendredi$2',			
							'$1samedi$2',			
							'$1dimanche$2',
							', euuhh...'
						)
					);
	} elseif ($l == 'german') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])Yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Yeah([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yeah([[:punct:][:space:]])/',
							'/([^aeiou[:punct:][:space:]])ow/i',
							'/([[:punct:][:space:]])German([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])german([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Car([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])car([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Hello([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])hello([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Hi([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])hi([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Gg])ood([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Thank(s| [Yy]ou)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])thank(s| [Yy]ou)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(water|juice|wine|soda|coke)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Water|Juice|Wine|Soda|Coke)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(kids|children)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Kids|Children)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(guitar|drums|trumpet|tuba)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Guitar|Drums|Trumpet|Tuba)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(hip(-)?[Hh]op|oldies|alternative rock|jazz|(pop|rock) music)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Hip(-)?[Hh]op|Oldies|Alternative [Rr]ock|Jazz|(Pop|Rock) [Mm]usic)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(dinner|lunch)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Dinner|Lunch)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])very([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Very([[:punct:][:space:]])/',
							'/s([^ch])/',
							'/S/',
							'/([AEIOUaeiou])ct/',
							'/([[:punct:][:space:]])That([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Thiz([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])that([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])thiz([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])And([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])and([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Nn])ot([[:punct:][:space:]])/',
							'/t[hH]([^iy[:punct:][:space:]])/',
							'/T[hH]([^iy[:punct:][:space:]])/',
							'/t[hH]i([^[:punct:][:space:]])/',
							'/T[hH]i([^[:punct:][:space:]])/',
							'/([aeiou[:punct:][:space:]])w([^qwrtpsdfghjklzxcvbnm[:punct:][:space:]])/',
							'/([aeiou[:punct:][:space:]])W([^qwrtpsdfghjklzxcvbnm[:punct:][:space:]])/',
							'/([[:punct:][:space:]])v/',
							'/([[:punct:][:space:]])V/',
							'/#####w#####/',
							'/#####W#####/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1Ja$2',
							'$1ja$2',
							'$1Ja$2',
							'$1ja$2',
							'$1au',
							'$1Deutsche$2',
							'$1deutsche$2',
							'$1Auto$2',
							'$1auto$2',
							'$1Guten tag$2',
							'$1guten tag$2',
							'$1Guten tag$2',
							'$1guten tag$2',
							'$1$2ut$3',
							'$1Danke$3',
							'$1danke$3',
							'$1beer$3',
							'$1Beer$3',
							'$1kinder$3',
							'$1Kinder$3',
							'$1accordian$3',
							'$1Accordian$3',
							'$1polka$5',
							'$1Polka$5',
							'$1bratwurst and sauerkraut$3',
							'$1Bratwurst and sauerkraut$3',
							'$1über$2',
							'$1Über$2',
							'z$1',
							'Z',
							'$1kt',
							'$1Das$2',
							'$1Das$2',
							'$1das$2',
							'$1das$2',
							'$1Und$2',
							'$1und$2',
							'$1$2icht$3',
							'd$1',
							'D$1',
							'zi$1',
							'Zi$1',
							'$1#####v#####$2',
							'$1#####V#####$2',
							'$1w',
							'$1W',
							'v',
							'V'
						)
					);
	} elseif ($l == 'russian') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])Yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Yeah([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yeah([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(water|juice|wine|soda|coke)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(Water|Juice|Wine|Soda|Coke)([[:punct:][:space:]])/',
							'/([^aeiou[:punct:][:space:]])ow/i',
							'/([[:punct:][:space:]])([Gg])ood([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])have sex([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Have sex([[:punct:][:space:]])/',
							'/s([^h])/',
							'/S/',
							'/([^aeiou[:punct:][:space:]])u([^[:punct:][:space:]])/',
							'/([^aeiou[:punct:][:space:]])U([^[:punct:][:space:]])/',
							'/([^aeiou[:punct:][:space:]])i([^o[:punct:][:space:]])/',
							'/([^aeiou[:punct:][:space:]])I([^o[:punct:][:space:]])/',
							'/t[hH]([^iy[:punct:][:space:]])/',
							'/T[hH]([^iy[:punct:][:space:]])/',
							'/t[hH]i([^[:punct:][:space:]])/',
							'/T[hH]i([^[:punct:][:space:]])/',
							'/([[:punct:][:space:]])([Gg])o([^aeiou])/',
							'/([aeiou[:punct:][:space:]])w([^qwrtpsdfghjklzxcvbnm[:punct:][:space:]])/',
							'/([aeiou[:punct:][:space:]])W([^qwrtpsdfghjklzxcvbnm[:punct:][:space:]])/',
							'/([[:punct:][:space:]])v/',
							'/([[:punct:][:space:]])V/',
							'/#####w#####/',
							'/#####W#####/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1Da$2',
							'$1da$2',
							'$1Da$2',
							'$1da$2',
							'$1vodka$3',
							'$1Vodka$3',
							'$1au',
							'$1$2ut$3',
							'$1make sexy-time$2',
							'$1Make sexy-time$2',
							'z$1',
							'Z',
							'$1oo$2',
							'$1Oo$2',
							'$1ee$2',
							'$1Ee$2',
							'd$1',
							'D$1',
							'z$1',
							'Z$1',
							'$1$2ah$3',
							'$1#####v#####$2',
							'$1#####V#####$2',
							'$1w',
							'$1W',
							'v',
							'V'
						)
					);
	} elseif ($l == 'singaporean') {
		$patterns = array_merge(
						$creditspattern,
						$genericasianpattern,
						array(
							'/([^[:punct:][:space:]])nt([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])oke([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])lied([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])uhrly([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])ave([[:punct:][:space:]])/',
							'/\? /i',
							'/([[:punct:][:space:]])v/',
							'/([[:punct:][:space:]])V/',
							'/([[:punct:][:space:]])Yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Yeah([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yes([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])yeah([[:punct:][:space:]])/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						$genericasianreplace,
						array(
							'$1n$2',
							'$1ok$2',
							'$1ly$2',
							'$1ali$2',
							'$1af$2',
							' ar? ',
							'$1b',
							'$1B',
							'$1Arrr$2',
							'$1Arrr$2',
							'$1arrr$2',
							'$1arrr$2'
						)
					);
	} elseif ($l == 'cat') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/n\?([[:space:]])/i',
							'/([^n])\?([[:space:]])/i',
							'/n\.([[:space:]])/i',
							'/([^n])\.([[:space:]])/i',
							'/!([[:space:]])/i',
							'/([[:punct:][:space:]])now([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])Now([[:punct:][:space:]])/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'nyan~?$1',
							'$1 nya~?$2',
							'nyan.$1',
							'$1 nya.$2',
							' nyaa~!$1',
							'$1meow$2',
							'$1Meow$2'
						)
					);
	} elseif ($l == 'indian') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])V([^[:punct:][:space:]])/',
							'/([[:punct:][:space:]])v([^[:punct:][:space:]])/',
							'/([[:punct:][:space:]])W([Hh])?([^[:punct:][:space:]])/',
							'/([[:punct:][:space:]])w(h)?([^[:punct:][:space:]])/',
							'/#####V#####/',
							'/#####v#####/',
							'/([^[:punct:][:space:]])MENT([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])ment([[:punct:][:space:]])/',
							'/([QWRTPSDFGHJKLZXCVBNM])A([QWRTPSDFGHJKLZXCVBNM])/',
							'/([qwrtpsdfghjklzxcvbnm])a([qwrtpsdfghjklzxcvbnm])/',
							'/OO/',
							'/oo/',
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1#####V#####$2',
							'$1#####v#####$2',
							'$1V$3',
							'$1v$3',
							'W',
							'w',
							'$1MINT$2',
							'$1mint$2',
							'$1AH$2',
							'$1ah$2',
							'$1UU$2',
							'$1uu$2',
						)
					);
	} elseif ($l == 'ermahgerd') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([[:punct:][:space:]])awesome([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])banana([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])bayou([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])favou?rite([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])goosebumps([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])long([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])my([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])the([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])they([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])we\'re([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])you([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])you\'re([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])two([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])y/i',
							'/low?([[:punct:][:space:]])/i',
							'/ice([[:punct:][:space:]])/i',
							'/tched([[:punct:][:space:]])/i',
							'/pped([[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])([^[:punct:][:space:]]{2,})[aeiou]([[:punct:][:space:]])/i',
							'/{(.)\1+}/i',
							'/[AEIOUY]{2,}/i',
							'/ow/i',
							'/akes/i',
							'/[AEIOUY]([^[:punct:][:space:]])/i',
							'/erh/i',
							//'/mer/i',
							'/erng/i',
							'/erpered/i',
							'/mahm/i',
							'/#####y#####/i',
							'/#####lo#####/i',
							'/#####erc#####/i',
							'/t#####cherd#####/i',
							'/p#####perd#####/i',
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1ersum$2',
							'$1banana$2',
							'$1beru$2',
							'$1fravrit$2',
							'$1gersberms$2',
							'$1lerng$2',
							'$1mah$2',
							'$1da$2',
							'$1dey$2',
							'$1wer$2',
							'$1u$2',
							'$1yer$2',
							'$1ter$2',
							'$1#####y#####',
							'#####lo#####$1',
							'#####ice#####$1',
							't#####ched#####$1',
							'p#####ped#####$1',
							'$1$2$3',
							'$1',
							'e',
							'er',							
							'erks',
							'er$1',
							'er',
							//'mah',
							'in',
							'erped',
							'merm',
							'y',
							'lo',
							'erce',
							'tched',
							'pped',
						)
					);
	} elseif ($l == 'australian') {
		$patterns = array_merge(
						$creditspattern,
						array(
							'/([^[:punct:][:space:]])(ch|pp|c)ed([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])lia/',
							'/([^[:punct:][:space:]])LIA/',
							'/([^[:punct:][:space:]])parmesan([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])PARMESAN([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])a([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])A([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])ane([[:punct:][:space:]])/',
							'/([^[:punct:][:space:]])ANE([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])H([^[:punct:][:space:]])/i',
							'/([[:punct:][:space:]])and([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])AND([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])I([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])i([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])idea([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])IDEA([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])coffee([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])COFFEE([[:punct:][:space:]])/',
							'/law([[:punct:][:space:]])/',
							'/LAW([[:punct:][:space:]])/',
							'/########e########/',
							'/([[:punct:][:space:]])(guy|girl|woman|man|boy|confidant|companion|friend|acquaintance|ally|associate|buddy|chum|classmate|cohort|colleague|comrade|crony|familiar|pal|partner|playmate|roommate|schoolmate|sidekick|soulmate|bud|bro)([[:punct:][:space:]])/',
							'/([[:punct:][:space:]])(GUY|GIRL|WOMAN|MAN|BOY|CONFIDANT|COMPANION|FRIEND|ACQUAINTANCE|ALLY|ASSOCIATE|BUDDY|CHUM|CLASSMATE|COHORT|COLLEAGUE|COMRADE|CRONY|FAMILIAR|PAL|PARTNER|PLAYMATE|ROOMMATE|SCHOOLMATE|SIDEKICK|SOULMATE|BUD|BRO)([[:punct:][:space:]])/',
							'/([b-df-hj-np-tv-z])i([b-df-hj-np-tv-z])/'
						)
					);
		$replaces = array_merge(
						$creditsreplace,
						array(
							'$1$2########e########d$3',
							'$1iya$2',
							'$1IYA$2',
							'$1parma$2',
							'$1PARMA$2',
							'$1er$2',
							'$1ER$2',
							'$1in$2',
							'$1IN$2',
							'$1\'$2',
							'$1oynd$2',
							'$1OYND$2',
							'$1Oy$2',
							'$1oy$2',
							'$1idear$2',
							'$1IDEAR$2',
							'$1long black$2',
							'$1LONG BLACK$2',
							'laur$1',
							'LAUR$1',
							'e',
							'$1mate$3',
							'$1MATE$3',
							'$1oi$2'
						)
					);
	}
	$s = preg_replace($patterns, $replaces, $s);
	if ($l == 'ermahgerd')
		$s = preg_replace('{(.)\1+}', '$1', $s);
	if ($l == 'german' || $l == 'russian' || $l == 'ermahgerd')
		$s = strtoupper($s);
	return trim($s);
}
?>