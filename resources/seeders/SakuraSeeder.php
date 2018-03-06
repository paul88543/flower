<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\DataMapper\DataMapper;

/**
 * The SakuraSeeder class.
 *
 * @since  __DEPLOY_VERSION__
 */
class SakuraSeeder extends AbstractSeeder
{

    /**
     * doExecute
     *
     * @return  void
     */
    public function doExecute()
    {
        $faker          = \Faker\Factory::create('zh_TW');
        $locationMapper = new DataMapper('locations');
        $mapper         = new DataMapper('sakuras');

        // DataMapper::find*() -> DataSet -> Data()
//        DataSet 物件
//        轉為Data ->dump()
        $locations = $locationMapper->findAll()->dump();

        foreach (range(0, 100) as $i) {
            $data = new Data();
            $location = $faker->randomElement($locations);

            $data->location_id = $location->id;
            $data->title       = $faker->name;
            $data->alias       = \Windwalker\Filter\OutputFilter::stringURLUnicodeSlug($data->title);
            $data->color       = $faker->colorName;
            $data->state       = $faker->randomElement([1, 0, 1]);
            $data->location       = $location->title;

            // $this->getDateFormat() 根據資料庫結構自動帶入適合的格式
            $data->created = $faker->dateTimeThisYear->format($this->getDateFormat());

            $data->price  = random_int(100, 2000);
            $data->age    = random_int(10, 60);
            $data->height = random_int(150, 200);

            $mapper->createOne($data);

            // 於Terminal顯示計數器
            $this->outCounting();
        }
    }

    /**
     * doClear
     *
     * @return  void
     */
    public function doClear()
    {
        $this->truncate('sakuras');
    }
}
