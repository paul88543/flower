<?php
/**
 * Part of flower project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Flower\model;

use Psr\Log\InvalidArgumentException;
use Windwalker\Core\Model\DatabaseModelRepository;
use Windwalker\Core\Model\Exception\ValidateFailException;
use Windwalker\Core\Model\ModelRepository;
use Windwalker\Debugger\Model\DashboardModel;

/**
 * The SakuraModel class.
 *
 * @since  __DEPLOY_VERSION__
 */
class SakuraModel extends DatabaseModelRepository
{
    /**
     * Property table.
     *
     * @var  string
     */
    protected $table = 'sakuras';

    /**
     * getItem
     *
     * @param $conditions
     *
     * @return  mixed
     *
     * @since  __DEPLOY_VERSION__
     * @throws \LogicException
     */
    public function getItem($conditions = null)
    {
        return $this->getDataMapper()->findOne($conditions);
    }

    /**
     * getById
     *
     * @param $id
     *
     * @return  mixed|\Windwalker\Data\Data
     *
     * @since  __DEPLOY_VERSION__
     * @throws \LogicException
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function getById($id)
    {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException('ID should bt Numeric:' . $id . ' given');
        }

        return $this->getDataMapper()->findOne(['id' => $id]);
    }

    /**
     * save
     *
     * @param array $data
     *
     * @return  mixed|\Windwalker\Data\Data
     *
     * @since  __DEPLOY_VERSION__
     * @throws \Windwalker\Core\Model\Exception\ValidateFailException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function save(array $data)
    {
        $this->validate($data);

        $mapper = $this->getDataMapper();

        if (empty($data['id'])) {
            return $mapper->createOne($data);
        }

        return $mapper->updateOne($data);
    }

    /**
     * validate
     *
     * @param array $data
     *
     * @return  void
     *
     * @since  __DEPLOY_VERSION__
     * @throws \LogicException
     * @throws \Windwalker\Core\Model\Exception\ValidateFailException
     */
    protected function validate(array $data)
    {
        if ((string) $data['title'] === '') {
            throw new ValidateFailException('Title should not be empty');
        }

        if ((string) $data['age'] === '') {
            throw new ValidateFailException('Age should not be empty');
        }

        if ((string) $data['height'] === '') {
            throw new ValidateFailException('Height should not be empty');
        }

        $item = $this->getItem(['title' => $data['title'], 'id != ' . (int) $data['id']]);

        if ($item->notNull() && $data['id'] != $item['id']) {
            throw new ValidateFailException('Title has same DB.');
        }
    }
}
