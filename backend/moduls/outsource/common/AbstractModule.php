<?php
namespace backend\moduls\outsource\common;

abstract class AbstractModule
{
    protected $defaultError = [99 => 'System error'];

    /** send request to out server */
    abstract protected function GetOutXMLData($ReturnXML = false);

    /** Prepare outsource url(set data to get str) and set it to private property $outURL*/
    abstract protected function PrepareUrl($URLstr = false, $date = null, $mask = false);

    abstract protected function XML2Array();

    abstract protected function SetError($code = null, $text = '');
    abstract protected function GetLastError();
}

?>