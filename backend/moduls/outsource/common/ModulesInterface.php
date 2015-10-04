<?php
namespace backend\moduls\outsource\common;

interface ModulesInterface
{
    /** parse out source response
     * [if $XMLstr = false then bee used response property outsourceModule] */
    public function ParseResponseError($XMLstr = false);

    /** update or add data to table currency from parsed response */
    public function AddUpdateData($dataArray = []);

    /** return Updater type for request to db */
    public function GetUpdaterType();

    /**  */
    public function getSimpleArray($allArray = false);
}
?>