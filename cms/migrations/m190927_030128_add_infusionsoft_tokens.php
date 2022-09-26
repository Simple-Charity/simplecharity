<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m190927_030128_add_infusionsoft_tokens migration.
 */
class m190927_030128_add_infusionsoft_tokens extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('infusionsoft_tokens', [
            'access_token' => 'string',
            'refresh_token' => 'string',
            'dateUpdated' => 'datetime'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190927_030128_add_infusionsoft_tokens cannot be reverted.\n";
        return false;
    }
}
