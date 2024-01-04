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
            $dta['name'] = $_POST['name'];
            if(!empty($dta['name'])){
                if($this->catModel->updateCategory(getCurrentId(),$dta['name'])){
                    deleteCurrentId();
                    redirect( URLROOT.'category/create');
                }else{
                    $dta['current_cats'] = $this->catModel->getCategoryById(getCurrentId());
                    deleteCurrentId();
                    flash('cat_edit_error',"category update failed");
                    redirect(URLROOT.'admin/category/edit',$dta);
                }

            }else{
                $dta['name_error'] = "Category name is required";
                $dta['current_cats'] = $this->catModel->getCategoryById(getCurrentId());
                deleteCurrentId();
                $this->view('admin/category/edit',$dta);
            }


        }else{
            setCurrentId($data['0']);
            $dta['current_cats'] = $this->catModel->getCategoryById($data['0']);
            $this->view('admin/category/edit',$dta);
        }


    }

    public function delete($data = []){
        if($this->catModel->deleteCategory($data[0])){
            redirect(URLROOT.'category/create');
        }else{
            redirect(URLROOT.'category/create');
        }
    }

}
