<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductCategory;

class ProductCategoriesController extends BaseController
{
    public function create()
    {
        if ($this->request->is('get')) {
            $model = new ProductCategory();
            $data = [
                'records' => $model->paginate(10),
                'pager' => $model->pager,
            ];
            return view('product_categories/product_categories',$data);
        } else if($this->request->is('post')) {
            $rules = [
                'name' => 'required|min_length[5]|max_length[120]',
                'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,gif]'
            ];
            
            if (!$this->validate($rules)) {
                return view('product_categories/product_categories');
            } else {
                $name = $this->request->getVar('name');
                $image = $this->request->getFile('image');

                $new_name = $image->getRandomName();
                $image->move('./public/images/product_categories',$new_name);

                $model = new ProductCategory();
                $data = [
                    'name'=>$name,
                    'image'=>$new_name
                ];
                $model->insert($data);
                return redirect()->to(base_url("admin/product_categories"));
            }
        }
    }
}
