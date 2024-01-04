
<?php require_once APPROOT ."/views/inc/header.php"?>
<?php require_once APPROOT ."/views/inc/nav.php"?>

<div class="container col-md-4 my-4">
    <form action="<?php echo URLROOT . 'post/edit'?>" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
        <?php flash('pef'); ?>
        <div class="text-center">
            <h1>Post Edit</h1>
        </div>
        <div class="form-group mb-2">
            <label for="cat_id" class="form-label">Category</label>
            <select class="form-select" id="cat_id" name="cat_id">
                <?php foreach ($data['cats'] as $cat) :?>
                    <?php if ($cat->id == $data['post']->cat_id) :?>
                        <option value="<?php echo $cat->id ?>" selected><?php echo $cat->name; ?></option>
                    <?php else :?>
                        <option value="<?php echo $cat->id ?>"><?php echo $cat->name; ?></option>
                    <?php endif ;?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-2">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" class="form-control <?php echo !empty($data['title_error']) ? 'is-invalid' : ''; ?> " name="title" id="title" value="<?php echo $data['post']->title; ?>">
            <span class="text-danger" ><?php echo !empty($data['title_error']) ? $data["title_error"] : ''; ?></span>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label <?php echo !empty($data['description_error']) ? 'is-invalid' : ''; ?>">Post Description</label>
            <textarea class="form-control" id="description" name="description" style="height: 50px"><?php echo $data['post']->description; ?></textarea>
            <span class="text-danger" ><?php echo !empty($data['description_error']) ? $data["description_error"] : ''; ?></span>
        </div>
        <div class="form-group mb-2">
            <label for="file" class="form-label">Choose Image</label>
            <input type="file" class="form-control-file" id="file" name="file">
            <p>
                <span class="text-danger" ><?php echo !empty($data['file_error']) ? $data["file_error"] : ''; ?></span>
            </p>
            <input type="hidden" name="old_file" value="<?php echo $data['post']->image; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea class="form-control <?php echo !empty($data['content_error']) ? 'is-invalid' : ''; ?>" id="content" name="content" style="height: 50px"><?php echo $data['post']->content;?></textarea>
            <span class="text-danger" ><?php echo !empty($data['content_error']) ? $data["content_error"] : ''; ?></span>
        </div>
        <div class="text-center">
            <div class="mb-2">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                <a href="<?php echo URLROOT . 'post/home/1' ?>" class="btn btn-warning me-2">Cancle</a>
            </div>
        </div>
    </form>

</div>
<?php require_once APPROOT ."/views/inc/footer.php"?>
