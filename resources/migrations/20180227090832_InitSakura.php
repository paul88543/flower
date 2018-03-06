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
 * Migration class, version: 20180227090832
 */
class InitSakura extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->createTable('sakuras', function (Schema $schema) {
            $schema->primary('id');
            $schema->varchar('title');
            $schema->char('location')->length(10);
            $schema->tinyint('state')->length(1)->signed('true');
            $schema->datetime('created');
//          $schema->decimal('price'); 把數字當成字串處理 購物車的價格一定要用這個
            $schema->varchar('color');
            $schema->varchar('age')->signed('true');
            $schema->integer('height')->comment('Sakura height');

            $schema->addIndex('location');
            $schema->addIndex('color');
        });
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->drop('sakuras');
    }
}
