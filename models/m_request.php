<?php
	include("../controls/c_config.php");
	$House = getAllHouses($db);
	$h="007E";
/* 	foreach($House as $h){
		if ($h['Link'] != null)
		{ */
			$date = getSQL($db,"SELECT Date FROM trames WHERE Link=\"".$h."\" ORDER BY TrameID DESC LIMIT 1");
			if (count($date) != 0)
			{
			$date = $date[0]['Date'];
			//var_dump($date);
			$date = str_replace("-","",$date);
			$date = str_replace(" ","",$date);
			$date = 0+str_replace(":","",$date);
			}
			else
				$date = 0;
			//var_dump($date);
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=".$h);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			$d = str_split($data,33);
			foreach($d as $t){
				if ($date < (0+substr($t,19,14)))
				{
					$CaptorType =substr($t,6,1);
					$CaptorNumber = substr($t,7,2);
					$Value = substr($t,9,4);
					$Date = substr($t,19,14);
					$Link = $h;
					$requete = $db->prepare("INSERT INTO trames(CaptorType,CaptorNumber,Value,Date,Link) values (:CaptorType,:CaptorNumber,:Value,:Date,:Link)");
					
					$requete->bindParam(':CaptorType',$CaptorType);
					$requete->bindParam(':CaptorNumber',$CaptorNumber);
					$requete->bindParam(':Value',$Value);
					$requete->bindParam(':Date',$Date);
					$requete->bindParam(':Link',$Link);
					
					$requete->execute();
					$requete->closeCursor();
				}
				/*
				var_dump($t);
				var_dump(substr($t,1,4));
				var_dump(substr($t,6,1));
				var_dump(substr($t,7,2));
				var_dump(substr($t,9,4));
				var_dump(0+substr($t,19,14));
				*/
			}
			
			$val = getSQL($db,"SELECT DISTINCT CaptorNumber FROM trames");
			$ar = array();
			foreach($val as $v){
				$tra = getSQL($db,"SELECT * FROM trames WHERE CaptorNumber=".$v['CaptorNumber']." ORDER BY TrameID DESC LIMIT 1")[0];
				array_push($ar,$tra);
				doSQL($db,"UPDATE captors SET Value='".hexdec($tra['Value'])."' WHERE link='".$tra['Link']."' AND captorlink='".$tra['CaptorNumber']."'");
			}
			echo json_encode($ar);
/* 		}
	} */

?>