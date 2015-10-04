<?php

use yii\db\Migration;

class m151004_095100_AddDataMask extends Migration
{
    private $tableName = 'curr_source';

    public function up()
    {
        $this->addColumn('{{%'.$this->tableName.'}}', 'cs_DateMask', $this->string(50));

        $this->update('{{%'.$this->tableName.'}}',['cs_DateMask' => 'dd.mm.YYYY'],['cs_code' => 'UA']);
        $this->update('{{%'.$this->tableName.'}}',['cs_DateMask' => 'dd/mm/YYYY'],['cs_code' => 'RU']);

        return true;
    }

    public function down()
    {
        $this->dropColumn('{{%'.$this->tableName.'}}', 'cs_DateMask');

        return true;
    }
}
