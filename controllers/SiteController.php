<?php

namespace app\controllers;

use Yii;
use yii\base\View;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

use app\models\Card;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function renderComponent($component)
    {
        $new = new View;

        return $new->renderFile(Yii::getAlias('@components').$component.'.php');
    }

    public function queryData()
    {
        return Card::find()->all();
    }

    public function getData()
    {
        return ArrayHelper::toArray($this->queryData(), [
            'app\models\Card' => [
                'title',
                'content',
            ],
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index', ['data' => $this->getData()]);
    }
}
