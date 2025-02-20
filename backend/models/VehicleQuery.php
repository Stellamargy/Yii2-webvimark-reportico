<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Vehicle]].
 *
 * @see Vehicle
 */
class VehicleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vehicle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vehicle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
