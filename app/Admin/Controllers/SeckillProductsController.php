<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/15
 * Time: 10:55
 */

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class SeckillProductsController extends Controller
{

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(Product::$typeMap[$this->getProductType()].'列表')
            ->body($this->grid());
    }

    public function getProductType()
    {
        return Product::TYPE_SECKILL;
    }

    protected function customGrid(Grid $grid)
    {
        $grid->id('ID')->sortable();
        $grid->title('商品名称');
        $grid->on_sale('已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->price('价格');
        $grid->column('seckill.start_at', '开始时间');
        $grid->column('seckill.end_at', '结束时间');
        $grid->sold_count('销量');
    }

    protected function customForm(Form $form)
    {
        // 秒杀相关字段
        $form->datetime('seckill.start_at', '秒杀开始时间')->rules('required|date');
        $form->datetime('seckill.end_at', '秒杀结束时间')->rules('required|date');
    }

    protected function grid()
    {
        $grid = new Grid(new Product());
        // 筛选出当前类型的商品，默认 ID 倒序排序
        $grid->model()->where('type', $this->getProductType())->orderBy('id', 'desc');
        // 调用自定义方法
        $this->customGrid($grid);
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
        return $grid;
    }

}