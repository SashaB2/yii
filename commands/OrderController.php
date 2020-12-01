<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Order;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OrderController extends Controller
{
    /**
     * Fix null status in order
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionFixNullStatus(bool $status = true, int $id = null)
    {
        if(is_null($id)){
            $orders = Order::findAll(['status' => null]);
        }else{
            $orders = Order::findAll(['id' => $id]);
        }
        foreach ($orders as $order){
            $order->status = $status;
            $order->save();
        }

        return ExitCode::OK;
    }
}
