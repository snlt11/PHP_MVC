<?php


class Post extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('PostModel');
        $this->catModel = $this->model('CategoryModel');
    }

    public function home($params = [])
    {
        $data = [
            'cats' => '',
            'posts' => '',
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        $data['posts'] = $this->postModel->getPostByCatId($params[0]);
        $this->view('admin/post/home', $data);

    }

    public function create()
    {
        $data = [
            'title' => '',
            'description' => '',
            'file' => '',
            'content' => '',
            'title_error' => '',
            'description_error' => '',
            'file_error' => '',
            'content_error' => '',
            'cats' => '',
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $root = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];

            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['content'] = $_POST['content'];

            if(empty($data['title'])){
                $data['title_error'] = "Title must not be empty";
            }
            if(empty($data['description'])){
                $data['description_error'] = "Description must not be empty";
            }
            if(empty($data['content'])){
                $data['content_error'] = "Content must not be empty";
            }

            if(empty($data['title_error']) && empty($data['description_error']) && empty($data['content_error'])){
                if(!empty($files['name'])){
                    move_uploaded_file($files['tmp_name'],  $root . '/public/assets/uploads/' . $files['name']);
                    if($this->postModel->insertPost($_POST['cat_id'], $data['title'],$data['description'],$files['name'],$data['content'])){
                        flash('pis',"Inserted Successfully");
                        redirect(URLROOT . "post/home/1");
                    }else{
                        $this->view('admin/post/create',$data);
                    }
                }else{
                    $this->view('admin/post/create',$data);
                }
            }else{
                $this->view('admin/post/create',$data);
            }
        } else {
            $this->view('admin/post/create', $data);
        }
    }

    public function show($params = []){

        $post = $this->postModel->getPostById($params[0]);
        $this->view('admin/post/show',['post' => $post]);

    }
    public function edit($params = []){
        $data = [
            'title' => '',
            'description' => '',
            'file' => '',
            'content' => '',
            'title_error' => '',
            'description_error' => '',
            'file_error' => '',
            'content_error' => '',
            'cats' => '',
        ];
        $data['cats'] = $this->catModel->getAllCategory();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $root = dirname(dirname(dirname(__FILE__)));
            $files = $_FILES['file'];
            $filename = $_FILES['file']['name'];

            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['content'] = $_POST['content'];

            if(empty($data['title'])){
                $data['title_error'] = "Title must not be empty";
            }
            if(empty($data['description'])){
                $data['description_error'] = "Description must not be empty";
            }
            if(empty($data['content'])){
                $data['content_error'] = "Content must not be empty";
            }

            if(empty($data['title_error']) && empty($data['description_error']) && empty($data['content_error'])){
                if(!empty($files['name'])){
                    move_uploaded_file($files['tmp_name'],  $root . '/public/assets/uploads/' . $files['name']);
                }else{
                    $filename = $_POST['old_file'];
                }
                $curId = getCurrentId();
                deleteCurrentId();
                if($this->postModel->updatePostById($curId, $_POST['cat_id'],$data['title'],$data['description'],$filename,$data['content'])){
                    flash('pes',"Successfully updated");
                    redirect(URLROOT .'post/show/'.$curId);
                }else{
                    flash('pef',"Update failed");
                    redirect(URLROOT .'post/edit/'.$curId);
                }
            }else{
                $this->view('admin/post/create',$data);
            }

        }else{
            setCurrentId($params[0]);
            $data['cats'] = $this->catModel->getAllCategory();
            $data['post'] = $this->postModel->getPostById($params[0]);
            $this->view('admin/post/edit',$data);
        }


    }

    public function delete($params = []){
        $data = [
            'cats' => '',
            'posts' => '',
        ];
        if($this->postModel->deletePost($params[0])){
            redirect(URLROOT .'post/home/1');
        }else{
            $data['cats'] = $this->catModel->getAllCategory();
            $data['posts'] = $this->postModel->getPostByCatId($params[0]);
            $this->view('admin/post/home', $data);

        }

    }

}