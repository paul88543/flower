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
 * The SaveController class.
 *
 * @since  __DEPLOY_VERSION__
 */
class SaveController extends AbstractController
{

    /**
     * The main execution process.
     *
     * @return  mixed
     * @throws \OutOfRangeException
     */
    protected function doExecute()
    {
//        抓到Sakura 的form丟出來的資料
        show($this->input->getString('location'));

        $id = $this->input->get('id');
        $title = $this->input->getString('title');
        $age = $this->input->getInt('age');
        $height = $this->input->getInt('height');

        $data = [
            'id' => $id,
            'title' => $title,
            'age' => $age,
            'height' => $height,
        ];

        $mapper = new DataMapper('sakuras');

        if ($id) {
            $mapper->updateOne($data);
        } else {
            $data = $mapper->createOne($data);
        }

        $this->setRedirect($this->router->route('sakura', [ 'id' => $data['id']]));
    }
}
