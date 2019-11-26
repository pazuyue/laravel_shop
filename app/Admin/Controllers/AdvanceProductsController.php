<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26
 * Time: 16:57
 */

namespace App\Admin\Controllers;


use App\Models\CrowdfundingProduct;
use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class AdvanceProductsController  extends CommonProductsController
{


    public function getProductType()
    {
        return Product::TYPE_ADVANCE;
    }

    protected function customGrid(Grid $grid)
    {
        $grid->model()->with(['category']);
        $grid->id('ID')->sortable();
        $grid->title('商品名称');
        $grid->column('category.name', '类目');
        $grid->on_sale('已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->price('价格');
        $grid->rating('评分');
        $grid->sold_count('销量');
        $grid->review_count('评论数');
    }


    protected function customForm(Form $form)
    {
        // TODO: Implement customForm() method.
    }
}