<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FormatTimeFunctions {
	public static function since($date = null) {
        if (!$date) return 'error';

        #$start_date = $date;
        $start_date = new \DateTime(date('Y-m-d H:i:s',strtotime($date)));
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));
 
        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' segundos';
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' segundo';
                                } else {
                                    $result = $since_start->s . ' segundos';
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' minuto';
                            } else {
                                $result = $since_start->i . ' minutos';
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' hora';
                        } else {
                            $result = $since_start->h . ' horas';
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' día';
                    } else {
                        $result = $since_start->d . ' días';
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' mes';
                } else {
                    $result = $since_start->m . ' meses';
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' año';
            } else {
                $result = $since_start->y . ' años';
            }
        }
 
        return "Hace " . $result;
	}

    /*****************************************************************************************
    | age
     ****************************************************************************************/
    public static function age($date = null) {
        if (!$date) return 'error';
        if ($date === '0000-00-00') return 'No Definido'; 

        $anionac = date('Y',strtotime($date));
        $anioact = date('Y');

        $mesdianac = date('md',strtotime($date));
        $mesdiaact = date('md');

        $anios = intval($anioact) - intval($anionac);

        if ($anios < 1) {
            return 0;
        }

        $anios = $anios - ((intval($mesdianac) < intval($mesdiaact)) ? 0 : 1 );

        return $anios . ' Años';
    }

    /*****************************************************************************************
    | names
     ****************************************************************************************/
    public static function monthName ($date = null) {
        if (!$date) return 'error';

        $monthNum = date('n',strtotime($date));

        if (intval($monthNum) < 0 || intval($monthNum) > 12) $monthNum = 0;

        $monts = [
            'error',
            'enero',
            'febrero',
            'marzo',
            'abril',
            'mayo',
            'junio',
            'julio',
            'agosto',
            'septiembre',
            'octubre',
            'noviembre',
            'diciembre'
        ];

        return $monts[$monthNum];
    }

    public static function dayName ($date = null) {
        if (!$date) return 'error';

        $dayNum = date('N',strtotime($date));

        if (intval($dayNum) < 0 || intval($dayNum) > 7) $dayNum = 0;

        $monts = [
            'error',
            'lunes',
            'martes',
            'miércoles',
            'jueves',
            'viernes',
            'sábado',
            'domingo'
        ];

        return $monts[$dayNum];
    }

    /*****************************************************************************************
    | times
     ****************************************************************************************/
    public static function time12 ($date = null) {
        if (!$date) return 'error';

        return date('h:i a',strtotime($date));
    }

    public static function time24 ($date = null) {
        if (!$date) return 'error';

        return date('H:i',strtotime($date));
    }

    /*****************************************************************************************
    | dates
     ****************************************************************************************/
    public static function shortDateLetter ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return date('d',strtotime($date)) . $separator . mb_substr(self::monthName($date),0,3) . $separator  . date('y',strtotime($date));
    }

    public static function longDateLetter ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return date('d',strtotime($date)) . $separator . self::monthName($date) . $separator .  date('y',strtotime($date));
    }

    public static function shortDateNumber ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return date('d'. $separator . 'm' . $separator . 'y',strtotime($date));
    }

    public static function longDateNumber ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return date('d' . $separator . 'm' . $separator . 'Y',strtotime($date));
    }

    /*****************************************************************************************
    | constructions with letter
     ****************************************************************************************/
    public static function shortDateLetterTime12 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::shortDateLetter($date, $separator) . ' ' . self::time12($date);
    }

    public static function shortDateLetterTime24 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::shortDateLetter($date, $separator) . ' ' . self::time24($date);
    }

    public static function longDateLetterTime12 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::longDateLetter($date, $separator) . ' ' . self::time12($date);
    }


    public static function longDateLetterTime24 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::longDateLetter($date, $separator) . ' ' . self::time24($date);
    }

    /*****************************************************************************************
    | constructions with number
     ****************************************************************************************/
    public static function shortDateNumberTime12 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::shortDateNumber($date, $separator) . ' ' . self::time12($date);
    }

    public static function shortDateNumberTime24 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::shortDateNumber($date, $separator) . ' ' . self::time24($date);
    }

    public static function longDateNumberTime12 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::longDateNumber($date, $separator) . ' ' . self::time12($date);
    }

    public static function longDateNumberTime24 ($date = null, $separator = ' ') {
        if (!$date) return 'error';

        return self::longDateNumber($date, $separator) . ' ' . self::time24($date);
    }
}
?>