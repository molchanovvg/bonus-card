<?php
namespace app\commands;

use yii\console\Controller;


class BonusCardsController extends Controller
{
    /**
     * Консольный метод, запуск:
     * cd <dir project>
     * php yii bonus-cards/check-card
     * Можно установить запуск по крону
     */
    public function actionCheckCard()
    {
        $query = \app\models\BonusCards::find();
        $bonus_cards = $query->where(['status' => array(Yii::$app->params['status_activate'], Yii::$app->params['status_not_activate'])])->all();
        echo 'Now: '. date("Y-m-d H:i:s");
        foreach($bonus_cards as $bonus_card)
        {

            if ($bonus_card->getAttribute('date_expiration') < date("Y-m-d H:i:s")){
                $bonus_card->setAttribute('status', Yii::$app->params['status_expiration']);
                $bonus_card->save();
                echo "\n";
                echo 'Card is expired, id: ' . $bonus_card->getAttribute('id') . ', Status changed to expired';
            }else{
                echo "\n";
                echo 'Card is still active, id: ' . $bonus_card->getAttribute('id') . ', Date expiration: ' . $bonus_card->getAttribute('date_expiration');
            }
        }
        echo "\n";
    }
}