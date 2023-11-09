<?php

namespace app\modules\params\models;

use yii\db\ActiveRecord;

class Param extends ActiveRecord
{
    public static function tableName()
    {
        return 'params';
    }

    public function rules()
    {
        return [
            // Другие правила валидации
            [['name'], 'required'],
            [['value'], 'string', 'max' => 255],
        ];
    }
}