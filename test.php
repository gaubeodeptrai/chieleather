<?php
function roman2number($roman){
    $conv = array(
        array("letter" => 'I', "number" => 1),
        array("letter" => 'V', "number" => 5),
        array("letter" => 'X', "number" => 10),
        array("letter" => 'L', "number" => 50),
        array("letter" => 'C', "number" => 100),
        array("letter" => 'D', "number" => 500),
        array("letter" => 'M', "number" => 1000),
        array("letter" => 0, "number" => 0)
    );
    $arabic = 0;
    $state = 0;
    $sidx = 0;
    $len = strlen($roman);
    while ($len >= 0) {
        $i = 0;
        $sidx = $len;
        while ($conv[$i]['number'] > 0) {
            if (strtoupper(@$roman[$sidx]) == $conv[$i]['letter']) {
                if ($state > $conv[$i]['number']) {
                    $arabic -= $conv[$i]['number'];
                } else {
                    $arabic += $conv[$i]['number'];
                    $state = $conv[$i]['number'];
                }
            }
            $i++;
        }
        $len--;
    }
    return($arabic);
}

function number2roman($num,$isUpper=true) {
    $n = intval($num);
    $res = '';
    /*** roman_numerals array ***/
    $roman_numerals = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );
    foreach ($roman_numerals as $roman => $number)
    {
        /*** divide to get matches ***/
        $matches = intval($n / $number);
        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);
        /*** substract from the number ***/
        $n = $n % $number;
    }
    /*** return the res ***/
    if($isUpper) return $res;
    else return strtolower($res);
}
/* TEST */
echo $s=number2roman(1965,true);
echo "\\n and bacK:\\n";
echo roman2number($s);


function sortromans($a, $b){
    $alphabet = array('M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I');
    $pos = 0;
    if ($a == $b) {
        return 0;
    }

    //compare the strings, position by position, as long as they are equal
    while(isset($a[$pos]) && isset($b[$pos]) && $a[$pos] === $b[$pos]){
        $pos++;
    }

    //if string is shorter than $pos, return value
    if(!isset($a[$pos])){
        return -1;
    } else if(!isset($b[$pos])){
        return 1;
    } else {

      //check the ´character´ at position $pos, and pass the array index to a variable
      foreach($alphabet as $i=>$ch){
            if(isset($a_index) && isset($b_index)){
         break;
        }
        $length = strlen($ch);
        if(!isset($a_index) && substr($a, $pos, $length) === $ch){
            $a_index = $i;
        }
        if(!isset($b_index) && substr($b, $pos, $length) === $ch){
            $b_index = $i;
        }
      }

    }

    return ($a_index > $b_index) ? -1 : 1;
}

$romans = array('III', 'IX', 'I', 'CM', 'LXII','IV');

usort($romans, "sortromans");

echo "<pre>";
print_r($romans);
echo "</pre>";

function electionWinner($votes) {
$countValues = array_count_values($votes);
  for($i=0; $i<=count($votes); $i++){
     if ($countValues[$votes[$i]] > $countValues[$votes[$i+1]]){
         $trungcu =  $votes[$i];
         sort($trungcu);
         print_r($trungcu);
     }  
  } 
}
$abc = array('VU', 'MINH', 'HA', 'MINH', 'NGUYEN','VU');
echo electionWinner($abc);
?>