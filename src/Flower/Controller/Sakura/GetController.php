<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\Controller\Sakura;

use Flower\model\SakuraModel;
use Windwalker\Core\Controller\AbstractController;
use Windwalker\Data\Data;
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
     * @throws \Exception
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

        /** @var SakuraModel $model */
        $model = $this->getModel('Sakura');

//        $sakura = $model->getItem(['id' => $id]);

        $sakura = $id ? $model->getById($id) : new Data();

//        $mapper = new DataMapper('sakuras');
//        $sakura = $mapper->findOne($id);

//        return $this->renderView('Sakura', 'default', 'edge', [
//            'sakura' => $sakura
//        ]);

        $layout = $this->input->get('layout','default');

        $view = $this->getView('Sakura');
        $view['sakura'] = $sakura;

        return $view->setLayout($layout)->render();
    }
}
