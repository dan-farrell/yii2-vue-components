<?php

namespace app\models;

/**
 * @author Dan Farrell <farrell.d@live.co.uk>
 * @copyright 2019 All rights reserved
 */

/**
 * Quiz is the model behind the quizs
 */
class Card extends \yii\db\ActiveRecord
{

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public static function tableName()
    {
        return 'card';
    }

}
