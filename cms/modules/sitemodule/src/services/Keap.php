<?php

namespace modules\sitemodule\services;

use Craft;
use craft\base\Component;
use craft\db\Query;
use Infusionsoft\Api\Rest\ContactService;
use Infusionsoft\Infusionsoft;
use Infusionsoft\InfusionsoftException;
use Infusionsoft\Token;
use stdClass;
use yii\db\Exception;

/**
 * Class Keap
 * @package modules\sitemodule\services
 */
class Keap extends Component
{
    /**
     * @var null|Infusionsoft
     */
    public $infusionsoft;

    /**
     * @param string $redirect
     * @param bool $set_token
     * @return $this
     */
    public function prepInfusionClient($redirect = '', $set_token = true)
    {
        if ($this->infusionsoft !== null) {
            return $this;
        }

        $config = [
            'clientId' => getenv('KEAPCRM_CLIENT_ID'),
            'clientSecret' => getenv('KEAPCRM_SECRET')
        ];

        if ($redirect) {
            $config['redirectUri'] = $redirect;
        }

        $this->infusionsoft = new Infusionsoft($config);

        if ($set_token) {
            $access_token = $this->_getAccessToken();
            $this->infusionsoft->setToken($access_token);
        }

        return $this;
    }

    /**
     * @param $email
     * @return bool
     */
    public function getContactId($email)
    {
        try {
            /* @var ContactService $contact */
            $contact = $this->infusionsoft->contacts()->where('email', $email)->first();
        } catch (InfusionsoftException $e) {
            return false;
        }

        return $contact->getAttribute('id');
    }

    /**
     * @param $email
     * @param $first_name
     * @param $last_name
     * @return mixed
     */
    public function addContact($email, $first_name, $last_name)
    {
        $email1 = new stdClass;
        $email1->field = 'EMAIL1';
        $email1->email = $email;

        $contact = $this->infusionsoft->contacts()->create([
            'given_name' => $first_name,
            'family_name' => $last_name,
            'email_addresses' => [$email1]
        ]);

        return $contact->getAttribute('id');
    }

    /**
     * @param $contact_id
     * @param $call_name
     * @return mixed
     */
    public function achieveGoal($contact_id, $call_name)
    {
        return $this->infusionsoft->funnels()->achieveGoal('ou715', $call_name, $contact_id);
    }

    /**
     * @param $token
     */
    public function saveTokenToDb($token)
    {
        try {
            $exists = (new Query())
                ->select(['access_token'])
                ->from('infusionsoft_tokens')
                ->limit(1)
                ->all();

            if ($exists) {
                (new Query())
                    ->createCommand()
                    ->update('infusionsoft_tokens', [
                        'access_token' => serialize($token),
                        'refresh_token' => $token->refreshToken,
                    ])->execute();

            } else {
                (new Query())
                    ->createCommand()
                    ->insert('infusionsoft_tokens', [
                        'access_token' => serialize($token),
                        'refresh_token' => $token->refreshToken,
                    ])->execute();
            }
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
            echo $e->getMessage();
            die();
        }
    }

    /**
     * @return bool
     */
    public function refreshAccessToken()
    {
        $this->prepInfusionClient();

        /* @var Token $token */
        try {
            $token = $this->infusionsoft->refreshAccessToken();
        } catch (InfusionsoftException $e) {
            Craft::error('Could not Infusionsoft refresh access token!', __METHOD__);
            return false;
        }

        try {
            (new Query())
                ->createCommand()
                ->update('infusionsoft_tokens', [
                    'access_token' => serialize($token),
                    'refresh_token' => $token->refreshToken
                ])->execute();
        } catch (Exception $e) {
            Craft::error($e->getMessage(), __METHOD__);
            return false;
        }
        return true;
    }

    /**
     * @return Token
     */
    private function _getAccessToken()
    {
        $access_token = (new Query())
            ->select(['access_token'])
            ->from('infusionsoft_tokens')
            ->limit(1)
            ->all()[0]['access_token'];

        return unserialize($access_token);
    }
}