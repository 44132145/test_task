<?php
use common\models\User;
use yii\db\Migration;

class m151001_124205_AddNewUser extends Migration
{
    public function up()
    {
        $AdminUser = new User();
        $AdminUser->generateAuthKey();

        $AdminUser->setAttribute('username', 'admin');
        //$AdminUser->setAttribute('auth_key', 'admin');

        $AdminUser->setPassword('admin');
        $AdminUser->setAttribute('email', 'testAdmin@local.com');

        if ($AdminUser->save())
            return true;
        else
            return false;
    }

    public function down()
    {

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
