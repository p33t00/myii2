<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $dept_id
 * @property integer $branch_id
 * @property string $dept_name
 * @property integer $company_id
 * @property string $dept_created_date
 * @property integer $dept_status
 *
 * @property Branches $branch
 * @property Companies $company
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id'], 'required'],
            [['branch_id', 'company_id', 'dept_status'], 'integer'],
            [['dept_created_date'], 'safe'],
            [['dept_name'], 'string', 'max' => 45],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'branch_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'branch_id' => 'Branch ID',
            'dept_name' => 'Dept Name',
            'company_id' => 'Company ID',
            'dept_created_date' => 'Dept Created Date',
            'dept_status' => 'Dept Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'company_id']);
    }
}
