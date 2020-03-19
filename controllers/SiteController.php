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
        ];
    }

    public function renderComponent($component)
    {
        $view = new View;

        return $view->renderFile(Yii::getAlias('@components').$component.'.php');
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

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
}
