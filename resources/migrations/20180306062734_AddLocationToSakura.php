<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) {YEAR} LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

use Windwalker\Core\Migration\AbstractMigration;
use Windwalker\Database\Schema\Column;
use Windwalker\Database\Schema\DataType;
use Windwalker\Database\Schema\Schema;

/**
 * Migration class, version: 20180306062734
 */
class AddLocationToSakura extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->updateTable('sakuras', function (Schema $schema) {
            $schema->integer('location_id')->position('AFTER id');

            $schema->addIndex('location_id');
        });

        // 另一種updateTable方法 『改名』
        $this->getTable('sakuras')
            ->modifyColumn(
//                寫法1
//                new Column\Bigint('age', 15, false)
//                寫法2
                (new Column\Bigint('age'))
                ->length(15)
                ->signed(false)
            );
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->getTable('sakuras')
            ->dropColumn('location_id')
            ->modifyColumn('age', 'integer(10)', false,false,0);
    }
}
