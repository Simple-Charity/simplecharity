<?php

namespace modules\sitemodule\console\controllers;

use Craft;
use craft\helpers\UrlHelper;
use modules\sitemodule\SiteModule;
use yii\base\Exception;
use yii\console\Controller;

/**
 * Class KeapController
 * @package modules\sitemodule\console\controllers
 */
class KeapController extends Controller
{

    /**
     * @return bool
     */
    public function actionGetAccessTokenUrl()
    {
        $keap = SiteModule::getInstance()->keap;
        try {
            $keap->prepInfusionClient(UrlHelper::siteUrl('actions/site-module/keap/set-token'), false);
        } catch (Exception $e) {
            Craft::error('Could not build site URL', __METHOD__);
            echo 'Error generating authorization URL';
            return false;
        }
        echo "\nGo to the following URL to authenticate:\n\n" . $keap->infusionsoft->getAuthorizationUrl() . "\n";
        return true;
    }

    /**
     * @return bool
     */
    public function actionRefreshAccessToken()
    {
        $keap = SiteModule::getInstance()->keap;
        $keap->refreshAccessToken();
        return true;
    }
}