<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route".
 *
 * @property int $id
 * @property string $route_name
 * @property string $route_description
 * @property int $distance
 * @property int $peak_hours_rate
 * @property int $off_peak_hours_rate
 *
 * @property Vehicle[] $vehicles
 */
class Route extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_name', 'route_description', 'distance', 'peak_hours_rate', 'off_peak_hours_rate'], 'required'],
            [['route_description'], 'string'],
            [['distance', 'peak_hours_rate', 'off_peak_hours_rate'], 'integer'],
            [['route_name'], 'string', 'max' => 255],
            [['route_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route_name' => 'Route Name',
            'route_description' => 'Route Description',
            'distance' => 'Distance',
            'peak_hours_rate' => 'Peak Hours Rate',
            'off_peak_hours_rate' => 'Off Peak Hours Rate',
        ];
    }

    /**
     * Gets query for [[Vehicles]].
     *
     * @return \yii\db\ActiveQuery|VehicleQuery
     */
    public function getVehicles()
    {
        return $this->hasMany(Vehicle::class, ['route_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RouteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RouteQuery(get_called_class());
    }
}
