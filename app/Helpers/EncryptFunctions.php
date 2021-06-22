<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class EncryptFunctions {    
    public static function encrypt($_cpalabra = null) {
    $_creturn = "";

	if (gettype($_cpalabra) <> 'string' || strlen(trim($_cpalabra)) < 1 || empty($_cpalabra) || is_null($_cpalabra)) return "";

	$_nlong = mb_strlen(trim($_cpalabra)) - 1;
	$_adicion = ($_nlong % 100);
	$_aoldasc = array();
	$_anewasc = array();

	for ($_w=0; $_w <= $_nlong ; $_w++) { 
		$_aoldasc[$_w] = self::ord(mb_substr($_cpalabra, $_w,1));

		if ($_aoldasc[$_w] >= 32 && $_aoldasc[$_w] <= 126 or $_aoldasc[$_w] >= 161 && $_aoldasc[$_w] <= 255) {
			true;
		} else {
			$_creturn = 2;
		}

		if ($_aoldasc[$_w] < 127) {
			$_nfactor = 128;
			$_anewasc[$_w] = ($_aoldasc[$_w] + $_nfactor) + $_adicion + 7;
				
			if ($_anewasc[$_w] > 255) {
				$_nnewadd = $_anewasc[$_w] - 255;
				$_anewasc[$_w] = 161 + $_nnewadd;
			}
		} else {
			$_nfactor = -128;
			$_anewasc[$_w] = ($_aoldasc[$_w] + $_nfactor) + $_adicion + 7;

			if ($_anewasc[$_w] > 126) {
				$_nnewadd = $_anewasc[$_w] - 126 ;
				$_anewasc[$_w] = 32 + $_nnewadd;
			}
		}

		$_creturn = $_creturn.self::chr($_anewasc[$_w]) ;
	}

	    return $_creturn;
    }

    public static function decrypt($_cpalabra = null) {
        $_creturn = "";

	    if (gettype($_cpalabra) <> 'string' || strlen(trim($_cpalabra)) < 1 || empty($_cpalabra) || is_null($_cpalabra)) return '';

	$_nlong = mb_strlen(trim($_cpalabra)) - 1;
	$_adicion = ($_nlong % 100);
	$_aoldasc = array();
	$_anewasc = array();

	for ($_w=0; $_w <= $_nlong ; $_w++) { 
		$_aoldasc[$_w] = self::ord(mb_substr($_cpalabra, $_w,1));

		if ($_aoldasc[$_w] >= 32 && $_aoldasc[$_w] <= 126 or $_aoldasc[$_w] >= 161 && $_aoldasc[$_w] <= 255) {
			true;
		} else {
			$_creturn = 2;
		}

		if ($_aoldasc[$_w] < 127) {
			$_nfactor = 128;
			$_anewasc[$_w] = $_aoldasc[$_w] + $_nfactor - $_adicion - 7;
				
			if ($_anewasc[$_w] < 161) {
				$_nnewadd = 161 - $_anewasc[$_w];
				$_anewasc[$_w] = 255 - $_nnewadd;
			}
		} else {
			$_nfactor = -128;
			$_anewasc[$_w] = $_aoldasc[$_w] + $_nfactor - $_adicion - 7;

			if ($_anewasc[$_w] < 32) {
				$_nnewadd = 32 - $_anewasc[$_w];
				$_anewasc[$_w] = 126 - $_nnewadd;
			}
		}

		$_creturn = $_creturn.self::chr($_anewasc[$_w]) ;
	}

	    return $_creturn;
    }

    private static function ord($u) {
        $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
        $k1 = ord(substr($k, 0, 1));
        $k2 = ord(substr($k, 1, 1));
        
        return $k2 * 256 + $k1;
    }

    private static function chr($u) {
        return mb_convert_encoding('&#' . intval($u) . ';', 'UTF-8', 'HTML-ENTITIES');
    }
}
?>