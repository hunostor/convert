<?php

/**
 * Created by PhpStorm.
 * User: poroszkaiattila
 * Date: 2017.07.20.
 * Time: 16:31
 */

namespace Convert;

/**
 * Any string is converted to a 5-digit fixed number
 * Surface Methods
 * setString($string)
 * execute()
 * getResult()
 * Class Convert
 * @package Convert
 */
class Convert
{
    private $string;

    private $availableChar = array(
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );

    private $resultCharLength = 5;

    private $result;

    /**
     * Enter the string you want to convert
     * @param string $string
     */
    public function setString($string)
    {
        $this->string = $string;

        return $this;
    }

    /**
     * Ask the result, a 5-digit number
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * It does the conversion
     * Call in the code if you want to make the conversion
     * @return Convert
     */
    public function execute()
    {
        return $this->run();
    }

    private function run()
    {
        $md5string = $this->convertMD5String($this->string);
        $arrayString = $this->stringConvertArray($md5string);
        $onlyNumberString = $this->arrayFilterOnlyNumber($arrayString);
        $result=  $this->setResultCharLength($onlyNumberString);

        $this->result = $this->lengthCorrection($result);

        return $this;
    }


    private function convertMD5String($string)
    {
        return md5($string);
    }

    private function stringConvertArray($string)
    {
        return str_split($string);
    }

    private function arrayFilterOnlyNumber($array)
    {
        $resultString = '';
        foreach ($array as $item) {
            if (in_array($item, $this->availableChar)) {
                $resultString .= $item;
            }
        }

        return $resultString;
    }

    private function checkStringLength($string)
    {
        return strlen($string);
    }

    private function setResultCharLength($string)
    {
        return substr($string, 0, $this->resultCharLength);
    }

    private function lengthCorrection($string)
    {
        if ($this->checkStringLength($string) < $this->resultCharLength) {
            $string = $string . $string . $string . $string . $string;
            return $this->setResultCharLength($string);
        } else {
            return $string;
        }
    }
}