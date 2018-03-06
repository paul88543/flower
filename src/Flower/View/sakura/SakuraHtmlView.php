<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\View\sakura;

use Windwalker\Core\View\HtmlView;

/**
 * The SakuraHtmlView class.
 *
 * @since  __DEPLOY_VERSION__
 */
class SakuraHtmlView extends HtmlView
{
    /**
     * Property renderder.
     *
     * @var  string
     */
    protected $renderer = 'edge';

    protected function prepareData($data)
    {
        parent::prepareData($data);
    }
}
