<?php

namespace app\commands;

use app\models\Currency;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;
use yii\httpclient\XmlParser;

class CurrencyController extends Controller
{
    function actionGet(){
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('http://www.cbr.ru/scripts/XML_daily.asp')
            ->send();
        if ($response->isOk) {
            $parser = new XmlParser();
            $currencies = $parser->parse($response);
            foreach($currencies['Valute'] as $currency){
                $code = $currency['NumCode'];
                $model = Currency::findOne($code);
                if(!$model){
                    $model = new Currency();
                    $model->id = $code;
                }
                $model->name = $currency['Nominal'].' '.$currency['Name'];
                $model->rate = str_replace(',','.',$currency['Value']);
                $model->save();
            }
        }else{
            echo "Connection fail";
        }
        return ExitCode::OK;
    }
}