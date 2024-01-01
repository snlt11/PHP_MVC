<?php require_once APPROOT . "/views/inc/header.php" ?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>




    <div class="container">
        <div class="row">
            <!--Sidebar Start-->
            <div class="col-md-3 p-5">
                <ul class="list-group">
                    <?php foreach ($data['cats'] as $cat) : ?>
                        <li class="list-group-item d-flex justify-content-between p-3">
                            <span><a class="text-decoration-none" href="#"><?php echo $cat->name; ?></a></span>
                            <span>
                            <a class="text-decoration-none" href="<?php echo URLROOT.'category/edit/'.$cat->id ?>"><i class="fa fa-edit text-warning"></i></a>
                            <a class="text-decoration-none" href="#"><i class="fa fa-trash text-danger"></i></a>
                        </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!--Sidebar End-->

            <div class="col-md-9">
                <div class="container col-md-7 my-4">
                    <form action="<?php echo URLROOT . 'category/create' ?>" class="form" method="post" autocomplete="off">
                        <div class="text-center">
                            <h1>Edit Category</h1>
                        </div>
                        <div class="mb-3 p-5">
                            <label for="exampleInputEmail1" class="form-label">Write Category Name</label>
                            <input type="text" class="form-control p-3" name="name" id="name" value="<?php echo $data['current_cats']->name; ?>">
                            <span class="text-danger"><?php echo !empty($data['name_error']) ? $data["name_error"] : ''; ?></span>
                        </div>
                        <div class="text-center">
                            <div class="mb-2">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


<?php require_once APPROOT . "/views/inc/footer.php" ?>