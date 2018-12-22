<?php

namespace app\api\controller;

use app\api\model\Category as CategoryModel;
use app\api\model\Goods as GoodsModel;

/**
 * 商品分类控制器
 * Class Goods
 * @package app\api\controller
 */
class Category extends Controller
{
    /**
     * 全部分类
     * @return array
     */
    public function lists()
    {
        $list = array_values(CategoryModel::getCacheTree());
        return $this->renderSuccess(compact('list'));
    }

    /**
     * 根据category id 获取商品
     */
    public function listGoodsByCateId($categoryId)
    {
        $goodsModel = new GoodsModel();
        $list = $goodsModel->getGoodsListByCategoryId($categoryId);
        return $this->renderSuccess(compact('list'));
    }
}
