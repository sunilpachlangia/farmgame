<?php 

if(!empty($_REQUEST['count'])){
    
    $count = $_REQUEST['count'];
    $personToFeed = '';
    $toFeedArr = ['f','c1','c2','b1','b2','b3','b4'];

    $feededArr = [];
    $farmerExist = $cowExist = $bunnyExist = 0;
    if(!empty($_REQUEST['feedStr'])){
        $feedArr = explode(',', $_REQUEST['feedStr']);
        foreach ($feedArr as $key => $value) {
            $idArr = explode('_', $value);
            $feededArr[$idArr[1]] = $idArr[0];
        }

        if(count($feededArr) >= 15){
            $arrF = array_chunk($feededArr, 15);
            for ($i=0;$i<3;$i++){
                if(!empty($arrF[$i]) && count($arrF[$i]) == 15){
                    if(!in_array('f', $arrF[$i])){
                        $farmerExist++;
                    }
                }
            }
        }
        if(count($feededArr) >= 10){
            $arrC = array_chunk($feededArr, 10);
            for ($j=0;$j<5;$j++){
                if(!empty($arrC[$j]) && count($arrC[$j]) == 10){
                    if(count(array_intersect($arrC[$j], ['c1','c2'])) == 0){
                        $cowExist++;
                    }
                }
            }
        }
        if(count($feededArr) >= 8){
            $arrB = array_chunk($feededArr, 8);
            for ($k=0;$k<6;$k++){
                if(!empty($arrB[$k]) && count($arrB[$k]) == 8){
                    if(count(array_intersect($arrB[$k], ['b1','b2','b3','b4'])) == 0){
                        $bunnyExist++;
                    }
                }
            }
        }
    }
    if($farmerExist > 0 || $cowExist > 0 || $bunnyExist > 0){
        echo "gameover";
    } else {
        $chooseToFeed = array_rand($toFeedArr);
        echo $personToFeed = $toFeedArr[$chooseToFeed]."_".$count;
    }
}

?>

