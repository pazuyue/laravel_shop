<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 18:31
 */

namespace App\Admin\Controllers;


use App\Exceptions\InvalidRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\CrowdfundingProduct;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class AdvanceOrdersController extends Controller
{
    use HasResourceActions;

    public function index(Content $content)
    {
        return $content
            ->header('预售订单列表')
            ->body($this->grid());
    }

    protected function grid()
    {
        $grid = new Grid(new Order);

        // 只展示已支付的订单，并且默认按支付时间倒序排序
        $grid->model()->whereNull('paid_at')->where('type', Product::TYPE_ADVANCE)->orderBy('updated_at', 'desc');

        $grid->no('订单流水号');
        // 展示关联关系的字段时，使用 column 方法
        $grid->column('user.name', '买家');
        $grid->total_amount('总金额')->sortable();
        $grid->paid_at('支付时间')->sortable();
        $grid->ship_status('物流')->display(function($value) {
            return Order::$shipStatusMap[$value];
        });
        $grid->refund_status('退款状态')->display(function($value) {
            return Order::$refundStatusMap[$value];
        });
        // 禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // 禁用删除和编辑按钮
            $actions->disableDelete();
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    public function show(Order $order, Content $content)
    {
        return $content
            ->header('查看预售订单')
            // body 方法可以接受 Laravel 的视图作为参数
            ->body(view('admin.advance_orders.show', ['order' => $order]));
    }


    public function pay(Order $order, Request $request)
    {

        // 判断当前订单发货状态是否为未发货
        if ($order->ship_status !== Order::SHIP_STATUS_PENDING) {
            throw new InvalidRequestException('该订单已发货');
        }
        // 众筹订单只有在众筹成功之后发货
        if ($order->type === Order::TYPE_CROWDFUNDING &&
            $order->items[0]->product->crowdfunding->status !== CrowdfundingProduct::STATUS_SUCCESS) {
            throw new InvalidRequestException('众筹订单只能在众筹成功之后发货');
        }
        // Laravel 5.5 之后 validate 方法可以返回校验过的值

        // 将订单发货状态改为已发货，并存入物流信息
        $order->update([
            'paid_at' => Carbon::now(),
            'payment_method'=>'manual',
        ]);

        // 返回上一页
        return redirect()->back();
    }



}