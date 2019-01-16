<?php

//http://php.net/manual/en/function.str-split.php#107658

function widrick_format_hostName($string)
{
	wp_enqueue_style('widrick_format_HostName');
	$inSpan = false;
	$skipChar = false;

	$stringArr = str_split($string);

	$formattedHostName = "<span class='widrick_minecraft_motd'>";
	$formatState = Array();


	foreach($stringArr as $key => $char)
	{
		if($skipChar === true)
		{
			$skipChar = false;
			continue;
		}
		if(ord($char) === 167)
		{
			$nextChar = $stringArr[$key+1];
			if(ord($nextChar) <= ord('f'))
			{
				$colorCode = widrick_format_colorCode($nextChar);
				if($colorCode !== null)
				{
					//--New color = end all formats per spec
					$formattedHostName .= widrick_format_reset($formatState);
					if($inSpan === true)
					{
						$formattedHostName .= "</span>";
						$inSpan = false;
					}
					$formattedHostName .= "<span style='color:" . $colorCode . "'>";
					$inSpan = true;
				}	
				$skipChar = true;
				continue;	
			}
			elseif(ord($nextChar) >= ord('k') && ord($nextChar) <= ord('r'))
			{
				$formatCode = widrick_format_formatCode($nextChar);
				if($formatCode !== null && $formatCode != "RESET")
				{
					$formattedHostName .= $formatCode;
					$formatState[$formatCode] = substr($formatCode,0,1) . '/' . substr($formatCode,1);
				}
				elseif($formatCode == "RESET")
				{
					$formattedHostName .= widrick_format_reset($formatState);
				}
				$skipChar = true;
                                continue;
			}
			elseif(ord($nextChar) == 167)
				continue; //STAHP!
		}
		//Throw out unicode decorations
		$formattedHostName .= $char;
	}

	//clean up
	$formattedHostName .= widrick_format_reset($formatState);
	if($inSpan === true)
		$formattedHostName .= '</span>';
	return $formattedHostName . '</span>';
	
}
function widrick_format_reset(&$formatState)
{
	$retStr = "";
	foreach(array_reverse($formatState) as $key => $state)
        {
 	       $retStr .= $state;
               unset($formatState[$key]);
        }
	return $retStr;
}
function widrick_format_formatCode($code)
{
	$code = strtolower($code);
	switch($code)
	{
		case "k":
			return null;// Unimplemented
		case "l":
			return "<b>";
		case "m":
			return null;//Not implemented
		case "n":
			return "<u>";
		case "r":
			return "RESET";
		default:
			return null;
	}
}
		

function widrick_format_colorCode($code)
{

	$code = strtolower($code);
	switch($code)
	{
		case "0":
			return "#000";
		case "1":
			return "#0000AA";
		case "2":
			return "#00AA00";
		case "3":
			return "#00AAAA";
		case "4":
			return "#AA0000";
		case "5":
			return "#AA00AA";
		case "6":
			return "#FFAA00";
		case "7":
			return "#AAAAAA";
		case "8":
			return "#555555";
		case "9":
			return "#5555FF";
		case "a":
			return "#55ff55";
		case "b":
			return "#55ffff";
		case "c":
			return "#ff5555";
		case "d":
			return "#ff55ff";
		case "e":
			return "#ffff55";
			
		case "f":
			return "#ffffff";
		default:
			return null;
	}
}
			
wp_register_style('widrick_format_HostName',plugin_dir_url(__FILE__).'css/widrick_style.css');
