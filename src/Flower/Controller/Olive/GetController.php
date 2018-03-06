<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\Controller\Olive;

use Windwalker\Core\Controller\AbstractController;

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
//        show($this->input->getArray('tags'));
        return $this->renderView('Olive','yoo','edge');
    }
}
