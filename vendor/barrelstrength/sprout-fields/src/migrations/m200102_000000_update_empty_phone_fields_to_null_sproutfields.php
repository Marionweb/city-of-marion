<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   https://craftcms.github.io/license
 */

namespace barrelstrength\sproutfields\migrations;

use barrelstrength\sproutbasefields\migrations\m200102_000000_update_empty_phone_fields_to_null;
use craft\db\Migration;
use yii\base\NotSupportedException;

/**
 * m200102_000000_update_empty_phone_fields_to_null_sproutfields migration.
 */
class m200102_000000_update_empty_phone_fields_to_null_sproutfields extends Migration
{
    /**
     * @return bool
     * @throws NotSupportedException
     */
    public function safeUp(): bool
    {
        $migration = new m200102_000000_update_empty_phone_fields_to_null();

        ob_start();
        $migration->safeUp();
        ob_end_clean();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m200102_000000_update_empty_phone_fields_to_null_sproutfields cannot be reverted.\n";

        return false;
    }
}
