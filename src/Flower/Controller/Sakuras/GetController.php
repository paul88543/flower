<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\Controller\Sakuras;

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
        $sakuras = (new DataMapper('sakuras'))->findAll();

//        return $this->renderView('Sakuras', 'default', 'edge' ,[
//            'sakuras' => $sakuras
//        ]);

        $view = $this->getView('Sakuras');
        $view['sakuras'] = $sakuras;

        return $view->render();
    }
}
