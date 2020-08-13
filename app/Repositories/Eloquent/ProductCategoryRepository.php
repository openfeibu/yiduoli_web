<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Cache;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product.product_category.search');
    }
    public function model()
    {
        return config('model.product.product_category.model');
    }
    public function getAllCategoriesCache()
    {
        if (Cache::has('all_categories')) {
            return Cache::get('all_categories');
        }
        $data = $this->getAllCategories();
        Cache::forever('all_categories', $data);
        return $data;
    }
    public function getAllCategories()
    {
        $categories = $this->orderBy('order','desc')->orderBy('id','asc')->get()->toArray();
        return $categories;
    }
    public function getCategoriesCache($parent_id=0)
    {
        if (Cache::has('categories')) {
            return Cache::get('categories');
        }
        $data = $this->getCategories($parent_id);
        Cache::forever('categories', $data);
        return $data;
    }
    public function getListCategories($parent_id)
    {
        return $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
    }
    public function getCategories($parent_id=0)
    {
        $data = [];
        $categories = $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
        foreach ($categories as $key => $category)
        {
            $data[$key] = [
                'title' => $category->name,
                'id' => $category->id,
                'parent_id' => $category->parent_id,
                'order' => $category->order,
                'attribute_id' => $category->attribute_id,
                'spread' => true
            ];
            $data[$key]['children'] = $this->getCategories($category->id);
        }
        return $data;
    }
    public function getCategoriesSelectTreeCache($parent_id=0)
    {
        if (Cache::has('categories_select_tree')) {
            return Cache::get('categories_select_tree');
        }
        $data = $this->getCategoriesSelectTree($parent_id);
        Cache::forever('categories_select_tree', $data);
        return $data;
    }
    public function getCategoriesSelectTree($parent_id=0)
    {

        $data = [];
        $categories = $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
        foreach ($categories as $key => $category)
        {
            $data[$key] = [
                'title' => $category->name,
                'label' => $category->name,
                'id' => $category->id,
                'parent_id' => $category->parent_id,
                'order' => $category->order,
                'spread' => false
            ];
            $data[$key]['children'] = $this->getCategoriesSelectTree($category->id);
        }
        return $data;
    }

    public function forgetCategoriesSelectTree()
    {
        Cache::forget('categories');
        Cache::forget('all_categories');
        Cache::forget('categories_select_tree');
    }
    public function getTopParentId($parent_id=0)
    {
        if($parent_id == 0)
        {
            return 0;
        }
        $parent = $this->where('id',$parent_id)->first(['id','parent_id']);
        if($parent->parent_id)
        {
            return $this->getTopParentId($parent->parent_id);
        }
        return $parent->id;
    }
    public function getCategoryIds($id,$ids=[])
    {
        if(!$id)
        {
            return '';
        }
        $category = $this->where('id',$id)->first(['id','parent_id']);
        $ids[] = $category->id;
        if($category->parent_id)
        {
            return $this->getCategoryIds($category->parent_id,$ids);
        }
        return $ids;

    }
    public function getFieldValue($category_id,$field)
    {
        $category = $this->where('id',$category_id)->first(['id','parent_id',$field]);
        if(!$category[$field])
        {
            if(!$category->parent_id)
            {
                return 0;
            }
            return $this->getFieldValue($category->parent_id,$field);
        }
        return $category[$field];
    }
    public function getWeight($category_id)
    {
        $category = $this->where('id',$category_id)->first(['id','parent_id','weight']);

        if(!$category->weight || $category->weight <= 0)
        {
            if(!$category->parent_id)
            {
                return 0;
            }
            return $this->getWeight($category->parent_id);
        }
        return $category->weight;
    }
    public function getFreightCategoryId($category_id)
    {
        $category = $this->where('id',$category_id)->first(['id','parent_id','freight_category_id']);

        if(!$category->freight_category_id)
        {
            if(!$category->parent_id)
            {
                return 0;
            }
            return $this->getFreightCategoryId($category->parent_id);
        }
        return $category->freight_category_id;

    }



    public function getSubIds($category_id=0,$sub_ids=[]){
        $ids = ProductCategory::where('parent_id',$category_id)->pluck('id')->toArray();
        $sub_ids = array_merge($sub_ids,$ids);
        foreach ($ids as $key=> $id)
        {
            $sub_ids = $this->getSubIds($id,$sub_ids);
        }
        return $sub_ids;
    }
}