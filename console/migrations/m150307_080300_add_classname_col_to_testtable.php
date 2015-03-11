<?php

use yii\db\Schema;
use yii\db\Migration;

class m150307_080300_add_classname_col_to_testtable extends Migration
{
    public function up()
    {
        $this->addColumn('test','classname','string');
    }

    public function down()
    {
        $this->dropColumn('test','classname');
    }
}
