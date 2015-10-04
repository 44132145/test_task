<?php

use yii\db\Migration;

class m151001_111210_CurrTable extends Migration
{
    private $tableName = 'currency';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%'. $this->tableName .'}}', [
            'id'              => $this->primaryKey(),
            'digital_code'    => $this->integer(3)->notNull(),
            'letter_code'     => $this->string(3)->notNull(),

            'currencyRU'      => $this->double()->defaultValue(NULL), # value / nominal
            'currencyUA'      => $this->double()->defaultValue(NULL), # exchange_rate / number_of_units
            'currDiff'        => $this->double()->defaultValue(NULL), # f=RUB/UAH; S = CURR[UAH] / f - CURR[RUB]

            'currency_name_RU'=> $this->string(),
            'currency_name_UA'=> $this->string(),

            'source_date'     => $this->date(),
            //'source_type'     => $this->integer()->notNull(),
            //'sysDate'         => $this->timestamp()->notNull(),
        ], $tableOptions);

        // ForeignKey curr_source.cs_id
        //$this->addForeignKey('FK_CS_id2C_type', '{{%'. $this->tableName.'}}', 'source_type', '{{%curr_source}}', 'cs_id');

        return true;
    }

    public function down()
    {
        //$this->dropForeignKey('FK_CS_id2C_type', '{{%'. $this->tableName.'}}');
        $this->dropTable('{{%'. $this->tableName .'}}');

        return true;
    }
}
