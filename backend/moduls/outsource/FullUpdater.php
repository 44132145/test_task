<?php
namespace backend\moduls\outsource;

class FullUpdater
{
    private $classes = ['backend\moduls\outsource\UpdaterRU',
                        'backend\moduls\outsource\UpdaterUA'];

    public function __construct(&$date)
    {
        for($i = 0; $i<count($this->classes); $i++){
            $obj = new $this->classes[$i]($date);
            $obj->AddUpdateData();
            unset($obj);
        }
    }
}
?>