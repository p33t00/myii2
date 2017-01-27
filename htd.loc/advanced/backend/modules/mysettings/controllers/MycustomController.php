<?php

namespace backend\modules\mysettings\controllers;

use yii\web\Controller;

/**
 * Default controller for the `mysettings` module
 */
class MycustomController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        echo 'foooo'; exit;
        return $this->render('index');
    }
}
