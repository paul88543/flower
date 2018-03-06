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
use Windwalker\Core\Model\Exception\ValidateFailException;
use Windwalker\Data\Data;
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
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
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


        // 下方註解是在$model變數Alt + Enter跑出來的
        /** @var SakuraModel $model */
        $model = $this->getModel('Sakura');

        try {
            $data = $model->save($data);
        } catch (ValidateFailException $e) {
            $this->addMessage('[Invlid Data]: ' .  $e->getMessage(), 'danger');
            $this->setRedirect($this->router->route('sakura', [ 'id' => $data['id']]));

            return true;
        }

        // 不透過model的寫法 開始

//        $mapper = new DataMapper('sakuras');

//        if ($id) {
//            $mapper->updateOne($data);
//        } else {
//            $data = $mapper->createOne($data);
//        }

//        不透過model的寫法 結束

        $this->addMessage('Save Success', 'success');
        $this->setRedirect($this->router->route('sakura', [ 'id' => $data['id']]));
    }
}
