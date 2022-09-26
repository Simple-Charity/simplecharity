<?php

namespace modules\sitemodule\controllers;

use Craft;
use craft\helpers\UrlHelper;
use craft\web\Controller;
use Infusionsoft\InfusionsoftException;
use modules\sitemodule\SiteModule;
use yii\base\Exception;

/**
 * Class KeapController
 * @package modules\sitemodule\controllers
 */
class KeapController extends Controller
{
    protected $allowAnonymous = [
        'set-token'
    ];

    /**
     * @return bool
     * @throws InfusionsoftException
     * @throws Exception
     */
    public function actionSetToken()
    {
        $code = Craft::$app->getRequest()->get('code');

        $keap = SiteModule::getInstance()->keap;

        $keap->prepInfusionClient(UrlHelper::siteUrl('actions/site-module/keap/set-token'), false);
        $token = $keap->infusionsoft->requestAccessToken($code);

        $keap->saveTokenToDb($token);

        $this->redirect(UrlHelper::siteUrl('', ['success' => 1]));

        return true;
    }
}