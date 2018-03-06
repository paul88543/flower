<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\Controller\Sakura;

use Windwalker\Core\Controller\AbstractController;
use Windwalker\DataMapper\DataMapper;

/**
 * The GetController class.
 *
 * @since  __DEPLOY_VERSION__
 */
class GetController extends AbstractController
{

    /**
     * The main execution process.
     *
     * @return  mixed
     * @throws \LogicException
     */
    protected function doExecute()
    {
//        $location = $this->input->getString('location');
//        $age = $this->input->getInt('age');
//        $height = $this->input->getInt('height', 123);
//        $ids = $this->input->getArray('id');

//        簡易寫法
//        $data = [
//            'goo' => 'yoo',
//            'location' => $location,
//            'age' => $age,
//            'height' => $height,
//        ];

//        進階寫法
//        $data = compact(['location','age', 'height', 'ids']);

        // 直接抓取以上所有的變數
//        $data = get_defined_vars();

//        由input compact寫
        $data['info'] = $this->input->compact([
            'location' => 'string',
            'age' => 'int',
            'height' => 'int',
            'color' => 'string',
        ]);

        $id = $this->input->get('id');

        $mapper = new DataMapper('sakuras');

        $sakura = $mapper->findOne($id);

        return $this->renderView('Sakura', 'default', 'edge', [
            'sakura' => $sakura
        ]);
    }
}
