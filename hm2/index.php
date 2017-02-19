<?php header("Content-Type: text/html;charset=UTF-8");?>
<?php
	$a=file_get_contents("http://retarcorp.by/edu/php/data.csv");
	$stroki=explode("\n", $a);
	$kol_strok=count($stroki);
	for($i=0; $i<$kol_strok; $i++){
		$data[$i]=explode(";", $stroki[$i]);
	}
	for($i=0; $i<$kol_strok; $i++){
		for($j=0; $j<6; $j++){
			$people[$i]["name"]=$data[$i][0];
			$people[$i]["job"]=$data[$i][1];
			$people[$i]["city"]=$data[$i][2];
			$people[$i]["age"]=$data[$i][3];
			$people[$i]["children"]=$data[$i][4];
			$people[$i]["balance"]=$data[$i][5];
		}
	}

	//////////////////Самое длинное отчество
	for($i=0; $i<$kol_strok; $i++){
		$name_data[$i]=explode(" ", $people[$i]["name"]);
	}
	for($i=0; $i<$kol_strok; $i++){
		for($j=0; $j<6; $j++){
			$name[$i]["secondName"]=$name_data[$i][0];
			$name[$i]["firstName"]=$name_data[$i][1];
			$name[$i]["fatherName"]=$name_data[$i][2];
		}
	}
	$zero=strlen(""); $longest_fatherName_number=0; $longest_fatherName=0;
	for($i=1; $i<$kol_strok; $i++){
		$len=strlen($name[$i]["fatherName"]);
		if($len>$zero) {$zero=$len; $longest_fatherName=$name[$i]["fatherName"];}
	}
	for($i=0; $i<$kol_strok; $i++){
		if($name[$i]["fatherName"]==$longest_fatherName) $longest_fatherName_number++;
	}

	//////////////////Количество детей
	$without_chidren=0;
	$one_children=0;
	$two_children=0;
	$three_children=0;
	$four_children=0;
	$five_children=0;
	for($i=1; $i<$kol_strok; $i++){
		if ($people[$i]["children"]==0) $without_children++;
		if ($people[$i]["children"]==1) $one_children++;
		if ($people[$i]["children"]==2) $two_children++;
		if ($people[$i]["children"]==3) $three_children++;
		if ($people[$i]["children"]==4) $four_children++;
		if ($people[$i]["children"]==5) $five_children++;
	}

	//////////////////Люди с максимальным бюджетом
	$max_balance=0;
	$people_max_balance=" ";
	for($i=1; $i<$kol_strok; $i++){
		$q=max(array($people[$i]["balance"]));
		if($q>$max_balance) $max_balance=$q;
	}
	for($i=0; $i<$kol_strok; $i++){
		if($people[$i]["balance"]==$max_balance) $people_max_balance.=$people[$i]["name"]."; ";
	}

	//////////////////Количество журналистов
	$number_journalist=0;
	for($i=1; $i<$kol_strok; $i++){
		if($people[$i]["job"] == "Журналист") $number_journalist++;
	}

	///////////////////Профессии, в которых работвет N человек
	$proffesions = array();
	$number_workers=3;
	$rab_array=$people;
	$list_workers="";
	for($i=1; $i<$kol_strok; $i++){
		$proffesions[$rab_array[$i]["job"]]++;
	}
	for($i=1; $i<$kol_strok; $i++){
		if($number_workers == $proffesions[$people[$i]["job"]]) {
			$list_workers.=$rab_array[$i]["job"]."; ";
			$point=$i;
			for($j=$point; $j<$kol_strok; $j++){
				$rab_array[$j]=$rab_array[$j+1];
			}
		}
	}

	///////////////////Город с самым большим количеством людей
	$cities = array();
	$list_livers="";
	$maxLivers=0;
	for($i=1; $i<$kol_strok; $i++){
		$cities[$people[$i]["city"]]++;
	}
	for($i=1; $i<$kol_strok; $i++){
		$rabNumber=$cities[$people[$i]["city"]];
		if($rabNumber > $maxLivers) {
			$maxLivers=$rabNumber;
			$pointCity=$people[$i]["city"];
		}
	}
	for($i=1; $i<$kol_strok; $i++){
		if($pointCity==$people[$i]["city"])	$list_livers.=$people[$i]["name"]."; ";
	}

	///////////////////Город с самым длинным названием
	$zero_str=strlen(""); 
	$sum_balance=0; 
	$longest_cityName=0;
	for($i=1; $i<$kol_strok; $i++){
		$cityLen=strlen($people[$i]["city"]);
		if($cityLen>$zero_str) {$zero_str=$cityLen; $longest_cityName=$people[$i]["city"];}
	}
	for($i=1; $i<$kol_strok; $i++){
		if($people[$i]["city"]==$longest_cityName) $sum_balance+=$people[$i]["balance"];
	}

	///////////////////Среднее медианное значение
	$moneySize = array();
	$avarege_med=$kol_strok-1;
	for($i=1; $i<$kol_strok; $i++){
		$moneySize[]=$people[$i]["balance"];
	}
	function compare($a, $b){
		if ($a < $b ) {return -1;}
		else {return 1;}
	}
	usort($moneySize, "compare");
	if($avarege_med%2 == 0) {
		$avarege_med/=2;
		$median=$people[$avarege_med]["balance"]+$people[$avarege_med+1]["balance"];
		$median/=2;
	}
	else {
		$avarege_med=$kol_strok/2;
		$median=$people[$avarege_med]["balance"];
	}

	//////////////////Количество людей за чертой бедности
	$sum_avarege_balance=0; 
	$poor_people=0;
	$number_people=0;
	for($i=1; $i<$kol_strok; $i++){
		$sum_avarege_balance=$sum_avarege_balance+$people[$i]["balance"];
		$number_people+=$people[$i]["children"]+1;
	}
	$avarege_balance=$sum_avarege_balance/$number_people;
	for($i=1; $i<$kol_strok; $i++){
		if($people[$i]["balance"]/3 < $avarege_balance) $poor_people++;
	}

	///////////////////
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
			echo "Самое длинное отчество - $longest_fatherName<br>
			Количество людей с таким отчеством - $longest_fatherName_number<br>
			Людей без детей - $without_children<br>
			Людей с одним ребенком - $one_children<br>
			Людей с двумя детьми - $two_children<br>
			Людей с тремя детьми - $three_children<br>
			Людей с четырмя детьми - $four_children<br>
			Людей с пятью детьми - $five_children<br>
			Максимальный бюджет - $max_balance<br>
			Люди с максимальным бюджетом: $people_max_balance<br>
			Количество журналистов - $number_journalist<br>
			Профессии, в которых работает $number_workers человек: $list_workers<br>
			Город с наибольшим количеством жителей - $pointCity<br>
			Люди, проживающие в этом городе - $list_livers<br>
			Город с самым длинным названием - $longest_cityName<br>
			Суммарный баланс его жителей - $sum_balance<br>
			Среднее медианное значение - $median<br>
			Средний доход на душу населения - $avarege_balance<br> 
			Количество людей за чертой бедности - $poor_people<br>	
			";
		?>
	</body>
</html>