<?php

class Category extends Controller
{
    public function __construct(){
        $this->catModel = $this->model('CategoryModel');
    }
    public function create($data= []){
        $data = [
            "name" => "",
            "name_error" => "",
            "cats" => $this->catModel->getAllCategory()
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['name'] = $_POST['name'];
            if(empty($data['name'])){
                $data['name_error'] = "Category name must supply";
                $this->view('admin/category/home',$data);
            }else{
                if($this->catModel->getCategoryByName($data['name'])){
                    $data['name_error'] = "Category name is already in use";
                    $this->view('admin/category/home',$data);
                }else{
                    if($this->catModel->insertNewCategory($data['name'])){
                        flash("category_create_success","Category created successfully");
                        $data['cats'] = $this->catModel->getAllCategory();
                        $this->view('admin/category/home',$data);
                    }else{
                        flash("category_create_fail","Category creation failed");
                        $this->view('admin/category/home',$data);
                    }
                }
            }
        }else{
            $this->view('admin/category/home',$data);

        }
    }

    public function edit($data = []){

        $dta = [
            "name" => "",
            "name_error" => "",
            "cats" => "",
            "current_cats" => "",
        ];
        $dta['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


        }else{
            setCurrentId($data['0']);
            $dta['current_cats'] = $this->catModel->getCategoryById($data['0']);
            $this->view('admin/category/edit',$dta);
        }


    }

}