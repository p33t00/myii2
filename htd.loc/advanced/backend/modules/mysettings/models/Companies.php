<?php

namespace backend\modules\mysettings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property integer $company_status
 * @property string $company_origin_date
 * @property string $company_created_date
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_status'], 'integer'],
            [['company_origin_date', 'company_created_date'], 'safe'],
            [['company_name', 'company_email', 'company_address'], 'string', 'max' => 45],
            [['company_email'], 'unique'],
            [['company_address'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_status' => 'Company Status',
            'company_origin_date' => 'Company Origin Date',
            'company_created_date' => 'Company Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['company_id' => 'company_id']);
    }
}
