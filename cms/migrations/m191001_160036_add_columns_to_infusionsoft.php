<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m191001_160036_add_columns_to_infusionsoft migration.
 */
class m191001_160036_add_columns_to_infusionsoft extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('infusionsoft_tokens', 'dateCreated', 'datetime');
        $this->addColumn('infusionsoft_tokens', 'uid', 'char(36)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m191001_160036_add_columns_to_infusionsoft cannot be reverted.\n";
        return false;
    }
}
