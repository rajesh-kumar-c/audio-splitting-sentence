<?php

$filename = "_3.mp3";
$now 	  = date("Ymdhis");
$txtfile  = explode(".",$filename);
$txtfile1 = $now."_".$txtfile[0].".txt";
@exec('ffmpeg -i "'.$filename.'" -af silencedetect=noise=-30dB:d=0.5 -f null - 2> "'.$txtfile1.'" ');

$getCont = file_get_contents($txtfile1);

preg_match_all("/silence_start:(.*)silencedetect.*silence_end:(.*)silence_duration/simU", $getCont, $getContVal);
for($Cnt=0;$Cnt<count($getContVal[1]);$Cnt++)
{
	
	$silence_start 	= preg_split("/[\s]/", $getContVal[1][$Cnt]);
	$silence_end 	= preg_split("/[\s]/", $getContVal[2][$Cnt]);
	if($Cnt==0)
	{
		$end[0]		= 0;
	}
	$start[$Cnt] 	= $silence_start[1];	
	$end[$Cnt+1] 	= $silence_end[1];
}
for($Cnt1=0;$Cnt1<count($start);$Cnt1++)
{
	$file = ($Cnt1+1).".mp3";
	@exec("ffmpeg -i $filename -ss $end[$Cnt1] -to $start[$Cnt1] $file");
}

?>