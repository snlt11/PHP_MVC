<?php require_once APPROOT . "/views/inc/header.php" ?>
<?php require_once APPROOT . "/views/inc/nav.php" ?>
<h1 class="text-center">Write you post here</h1>

<div class="container-fluid">
    <div class="container my-5">
        <a href="<?php echo URLROOT .'post/create' ?>" class="btn btn-primary mb-2">Create</a>
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <?php foreach ($data['cats'] as $cats) : ?>
                        <li class="list-group-item d-flex justify-content-between p-3">
                            <span>
                                <a class="text-decoration-none" href="<?php echo URLROOT.'post/home/'.$cats->id ?>">
                                    <?php echo $cats->name; ?>
                                </a>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <?php foreach ($data['posts'] as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?php echo $post->title; ?>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">
                                <?php echo $post->description; ?>
                            </h3>
                            <div class="justify-content-end d-flex">
                                <a href="<?php echo URLROOT . 'post/show/'.$post->id; ?>" class="btn btn-primary me-2">Detail</a>
                                <a href="<?php echo URLROOT. 'post/edit/'.$post->id; ?>" class="btn btn-warning me-2">Edit</a>
                                <a href="<?php echo URLROOT. 'post/delete/'.$post->id; ?>" class="btn btn-danger me-2">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php" ?>
