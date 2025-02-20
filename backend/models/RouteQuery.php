<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Route]].
 *
 * @see Route
 */
class RouteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Route[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Route|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
