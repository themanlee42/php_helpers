<?php
/**
 * Convert PHP Scientific E Notation To Decimal Notation String
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT
 * @link       https://github.com/themanlee42/php_helpers/sci_to_dec.php
 * @author     Jason Lee
 */

/**
 * 
 * Convert a LARGE Scientific e notation to decimal notation in a string type. 
 * 
 * @param string $exp_number
 * @return string
 */
function sci_to_dec(string $exp_number)
{    
    if(is_numeric($exp_number) && stristr($exp_number,'e')){

        $exp_number_parts = explode('e', strtolower($exp_number));        
                
        if(!$exponent = (int) abs($exp_number_parts[1])){
            return $exp_number_parts[0];
        }
  
        if($exp_number_parts[1] > 0){
            if(strstr($exp_number_parts[0], '.')){
                $dot_pos = strpos($exp_number_parts[0], '.');                
                $long_str_number = str_replace(".", "", $exp_number_parts[0]);                            
            }
            else{                                
                $long_str_number = $exp_number_parts[0];
                $dot_pos = strlen($long_str_number);
            }
            
            $dot_inject_pos = $dot_pos + $exponent;                              
            $str_len = strlen($long_str_number);
            
            if($str_len == $dot_inject_pos){     
                return  ltrim($long_str_number, "0");
            }
            else if($str_len > $dot_inject_pos){
                
                $concat_str = '';
                $i = 1;
                $long_array_number = str_split($long_str_number);
                foreach($long_array_number as $each_char){
                    $concat_str .= $each_char;
                    if($i == $dot_inject_pos){
                        $concat_str .= '.';
                    }
                    $i++;
                }                    
                return ltrim($concat_str, "0");                    
            }
            else{
                
                $num_zeros = $dot_inject_pos - $str_len;
                $zeros = '';
                for($k = 0 ; $k < $num_zeros  ; $k++){
                    $zeros .= '0';
                }                
                return ltrim($long_str_number.$zeros, "0");                    
            }               
        }
        else{
            if(strstr($exp_number_parts[0], '.')){
                $dot_pos = strpos($exp_number_parts[0], '.');
                $long_str_number = str_replace(".", "", $exp_number_parts[0]);
                if($dot_pos == 0){
                    $long_str_number .= '0'.$long_str_number;
                }
            }
            else{
                $long_str_number = $exp_number_parts[0];
                $dot_pos = strlen($long_str_number);
            }
            
            $dot_inject_pos = $dot_pos - $exponent;
            $str_len = strlen($long_str_number);
          
            if($str_len - ($str_len - $dot_pos) >  abs($exponent)){
                
                $concat_str = '';
                $i = 1;
                $long_array_number = str_split($long_str_number);
                
                foreach($long_array_number as $each_char){
                    $concat_str .= $each_char;
                    if($i == $dot_inject_pos){
                        $concat_str .= '.';
                    }
                    $i++;
                }

                return rtrim(rtrim($concat_str, "0"),".");  
            }
            else{              
                //find out how many zeros needed
                if($dot_inject_pos == 0){
                    return '0.'.$long_str_number;
                }
                else{
                    $num_zeros = abs($dot_inject_pos);
                    $zeros = '';
                    for($k = 0 ; $k < $num_zeros  ; $k++){
                        $zeros .= '0';
                    }                    
                    return '0.'.$zeros.$long_str_number;
                }               
            }     
        }
    }
       
    return $exp_number;
    
}

$test = array(
    '1.426456123654165416513514E+24',
    '1.1345435345342424324234324329e-17',
    '3.32343242342344345e7',
    '12323432234325475234345456345435345345345345',
    '.00001134543534534242432423432432e+17',
    1.1e+17,
    '0.000010000023432432423432324321e+30',
    '0.000010000E+10',
    3.2343e-6,
    '0.002e-6',
    '23300.1e-3',
    23300.1e-5,
    '.233001e-5',
    '2e-6',
    2000e-5,
    '2000e-3',
    '2000e-4',
    '234327389473984739473892342454545434545342344542123274829374300.1e-7',
    '200.1e-234',
    '2343249483094834374890E233'
);


foreach($test as $e_notation){
    echo sci_to_dec((string)$e_notation);
  echo "<BR>";
}
