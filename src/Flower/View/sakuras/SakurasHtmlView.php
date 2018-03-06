<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\View\sakuras;

use Windwalker\Core\DateTime\Chronos;
use Windwalker\Core\View\HtmlView;

/**
 * The SakurasHtmlView class.
 *
 * @since  __DEPLOY_VERSION__
 */
class SakurasHtmlView extends HtmlView
{
    /**
     * Property renderer.
     *
     * @var  string
     */
    protected $renderer = 'edge';

    /**
     * prepareData
     *
     * @param \Windwalker\Data\Data $data
     *
     * @return  void
     *
     * @since  __DEPLOY_VERSION__
     */
    protected function prepareData($data)
    {
        parent::prepareData($data);

        foreach ($data->sakuras as $sakura) {
            $sakura->viewlink = $this->router->route('sakura', ['id' => $sakura->id]);
            $sakura->editlink = $this->router->route('sakura', ['id' => $sakura->id, 'layout' => 'edit']);
            $sakura->date = Chronos::toLocalTime($sakura->created,'Y/m/d');
        }
    }
}
