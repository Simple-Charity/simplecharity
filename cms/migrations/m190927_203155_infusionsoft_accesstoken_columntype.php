<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m190927_203155_infusionsoft_accesstoken_columntype migration.
 */
class m190927_203155_infusionsoft_accesstoken_columntype extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('infusionsoft_tokens', 'access_token', 'text');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190927_203155_infusionsoft_accesstoken_columntype cannot be reverted.\n";
        return false;
    }
}
