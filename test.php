<?php

/**
 * Class BigNumber
 */
class BigNumber
{
    /**
     * Fill the string with zeros
     *
     * @param $sBigNumber
     * @param $iMaxLength
     * @return string
     */
    static function completeZero($sBigNumber, $iMaxLength)
    {
        if(strlen($sBigNumber) < $iMaxLength)
        {
            $diff = $iMaxLength - strlen($sBigNumber);
            for ($i = 0; $i < $diff; $i++)
            {
                $sBigNumber = '0' . $sBigNumber;
            }
        }

        return $sBigNumber;
    }

    /**
     * Returns the sum of large numbers in a string.
     *
     * @param $sNumberA
     * @param $sNumberB
     * @return string
     */
    static function sum($sNumberA, $sNumberB)
    {
        $maxLength = strlen($sNumberA) >= strlen($sNumberB) ? strlen($sNumberA) : strlen($sNumberB);

        $a = self::completeZero($sNumberA, $maxLength);
        $b = self::completeZero($sNumberB, $maxLength);

        $result = '';
        $buf = 0;

        //Culumn additional
        for ($i = $maxLength - 1; $i >= 0; $i--) {
            $aPart = $a[$i] ?? 0;
            $bPart = $b[$i] ?? 0;

            $sum = (string)((int)$aPart + (int)$bPart + $buf);
            $buf = 0;

            if (strlen($sum) > 1) {
                $buf = (int)$sum[0];
                $sum = (int)$sum[1];
            }

            $result = $sum . $result;
        }

        return $result;
    }
}

echo BigNumber::sum('123456', '123456');