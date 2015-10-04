<?php

use yii\db\Migration;

class m151001_105007_CurrSource extends Migration
{
    private $tableName = 'curr_source';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%'.$this->tableName.'}}',[
            'cs_id' => $this->primaryKey(),
            'cs_name' => $this->string(),
            'cs_url' => $this->string(),                                   # out source URL
            'cs_method_name' => $this->string()->defaultValue('default'),  # method of parse response of out source
            'cs_code' => $this->string(2),
        ], $tableOptions);

        //-- data for table curr_source

        $this->insert('{{%'.$this->tableName.'}}',[
            'cs_name' => 'НБУ',
            'cs_url' => 'http://www.bank.gov.ua/control/uk/curmetal/currency/search?formType=searchFormDate&time_step=daily&date=dd.mm.YYYY&outer=xml',
            'cs_code' => 'UA',
        ]);

        $this->insert('{{%'.$this->tableName.'}}',[
            'cs_name' => 'ЦБР',
            'cs_url' => 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=dd/mm/YYYY',
            'cs_code' => 'RU',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%'.$this->tableName.'}}');
        return true;
    }

}
