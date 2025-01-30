<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $registration_number
 * @property string $make
 * @property string $model
 * @property int $year
 * @property string|null $color
 * @property string|null $type
 * @property int|null $capacity
 * @property int|null $route_id
 * @property int|null $user_id
 *
 * @property Route $route
 * @property User $user
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'make', 'model', 'year'], 'required'],
            [['year', 'capacity', 'route_id', 'user_id'], 'integer'],
            [['registration_number', 'color', 'type'], 'string', 'max' => 50],
            [['make', 'model'], 'string', 'max' => 100],
            [['registration_number'], 'unique'],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::class, 'targetAttribute' => ['route_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_number' => 'Registration Number',
            'make' => 'Make',
            'model' => 'Model',
            'year' => 'Year',
            'color' => 'Color',
            'type' => 'Type',
            'capacity' => 'Capacity',
            'route_id' => 'Route ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Route]].
     *
     * @return \yii\db\ActiveQuery|RouteQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::class, ['id' => 'route_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return VehicleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehicleQuery(get_called_class());
    }
}
