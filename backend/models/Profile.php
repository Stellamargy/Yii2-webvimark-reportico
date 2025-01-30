<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone_number
 * @property string|null $address
 * @property string $role
 * @property string|null $driver_license_number
 * @property int|null $vehicle_assigned
 * @property string|null $admin_area_of_responsibility
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'email', 'role', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'vehicle_assigned', 'created_at', 'updated_at'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'admin_area_of_responsibility'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
            [['phone_number', 'role'], 'string', 'max' => 20],
            [['driver_license_number'], 'string', 'max' => 50],
            [['email'], 'unique'],
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
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
            'role' => 'Role',
            'driver_license_number' => 'Driver License Number',
            'vehicle_assigned' => 'Vehicle Assigned',
            'admin_area_of_responsibility' => 'Admin Area Of Responsibility',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
