<?php
################################ Desenvolvido pela CODINTEC - SEMED #####################################
#                                                           											#
#       				Conversor de valor num�rico para extenso            							#
#																										#
#								 exemplo de como utilizar												#		
#						     echo Monetary::numberToExt(3000100.70);									#
#           o exemplo acima ira imprimir: tr�s milh�es, cem reais e setenta centavos					#
#	     	No valor do cheque n�o se usa "," e se usa "." antes do valor dos centavos			     	#
#																										#	
#########################################################################################################


class Monetary {
    private static $unidades = array("um", "dois", "tr&#234s", "quatro", "cinco", "seis", "sete", "oito", "nove", "dez", "onze", "doze",
                                     "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove");
    private static $dezenas = array("dez", "vinte", "trinta", "quarenta","cinq&#252enta", "sessenta", "setenta", "oitenta", "noventa");
    private static $centenas = array("cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", 
                                     "seiscentos", "setecentos", "oitocentos", "novecentos");
    private static $milhares = array(
        array("text" => "mil, ", "start" => 1000, "end" => 999999, "div" => 1000),
        array("text" => "milh&#227o, ", "start" =>  1000000, "end" => 1999999, "div" => 1000000),
        array("text" => "milh&#245es, ", "start" => 2000000, "end" => 999999999, "div" => 1000000),
        array("text" => "bilh&#227o, ", "start" => 1000000000, "end" => 1999999999, "div" => 1000000000),
        array("text" => "bilh&#245es, ", "start" => 2000000000, "end" => 2147483647, "div" => 1000000000)        
    );
    const MIN = 0.01;
    const MAX = 2147483647.99;
    const MOEDA = " real ";
    const MOEDAS = " reais ";
    const CENTAVO = " centavo ";
    const CENTAVOS = " centavos ";    
     
    static function numberToExt($number, $moeda = true) {
        if ($number >= self::MIN && $number <= self::MAX) {
            $value = self::conversionR((int)$number);       
            if ($moeda) {
                if (floor($number) == 1) {
                    $value .= self::MOEDA;
                }
                else if (floor($number) > 1) $value .= self::MOEDAS;
            }
 
            $decimals = self::extractDecimals($number);            
            if ($decimals > 0.00) {
                $decimals = round($decimals * 100);
                $value .= " e ".self::conversionR($decimals);
                if ($moeda) {
                    if ($decimals == 1) {
                        $value .= self::CENTAVO;
                    }   
                    else if ($decimals > 1) $value .= self::CENTAVOS;
                }
            }
        }
        return trim($value);
    }
     
    private static function extractDecimals($number) {
        return $number - floor($number);
    }
     
    static function conversionR($number) {
        if (in_array($number, range(1, 19))) {
            $value = self::$unidades[$number-1];
        }
        else if (in_array($number, range(20, 90, 10))) {
             $value = self::$dezenas[floor($number / 10)-1]." ";           
        }     
        else if (in_array($number, range(21, 99))) {
             $value = self::$dezenas[floor($number / 10)-1]." e ".self::conversionR($number % 10);           
        }     
        else if (in_array($number, range(100, 900, 100))) {
             $value = self::$centenas[floor($number / 100)-1]." ";           
        }          
        else if (in_array($number, range(101, 199))) {
             $value = ' cento e '.self::conversionR($number % 100);         
        }   
        else if (in_array($number, range(201, 999))) {
             $value = self::$centenas[floor($number / 100)-1]." e ".self::conversionR($number % 100);        
        }  
        else {
            foreach (self::$milhares as $item) {
                if ($number >= $item['start'] && $number <= $item['end']) {
                    $value = self::conversionR(floor($number / $item['div']))." ".$item['text']." ".self::conversionR($number % $item['div']);
                    break;
                }
            }
        }        
        return $value;
    }
}
?>
