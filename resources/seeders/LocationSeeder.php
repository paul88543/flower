<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */
// 該檔案不需要Namespace
use Windwalker\Core\Seeder\AbstractSeeder;
use Windwalker\Data\Data;
use Windwalker\DataMapper\DataMapper;

/**
 * The LocationSeeder class.
 *
 * @since  __DEPLOY_VERSION__
 */
class LocationSeeder extends AbstractSeeder
{

    /**
     * doExecute
     *
     * @return  void
     * @throws \InvalidArgumentException
     */
    public function doExecute()
    {
        $faker = \Faker\Factory::create('zh_TW');
        $mapper = new DataMapper('locations');

        foreach (range(1,10) as $i) {
            $data = new Data();

            $data->title = $faker->country;
            $data->state = 1;

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
        $this->truncate('locations');
    }
}
