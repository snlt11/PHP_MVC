
<?php require_once APPROOT ."/views/inc/header.php"?>
<?php require_once APPROOT ."/views/inc/nav.php"?>

<div class="container col-md-7 my-4">
    <div>
        <?php flash('pes'); ?>
        <div class="row mb-1">
            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn btn-primary" href="<?php echo URLROOT . 'post/home/1' ?>" role="button">Back</a>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?php echo URLROOT. 'post/edit/'. $data['post']->id; ?>" role="button">Edit</a>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header">
                <?php echo $data['post']->title; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $data->description; ?>
                </h5>
                <p class="card-text">
                    <?php echo $data['post']->content; ?>
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        <?php echo $data['post']->created_at; ?>
                    </small>
                </p>
                <img src="<?php echo URLROOT . 'assets/uploads/' . $data['post']->image; ?>" alt="">
            </div>
        </div>
    </div>

</div>
<?php require_once APPROOT ."/views/inc/footer.php"?>
