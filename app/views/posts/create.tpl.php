<?php 

require COMPONENTS . '/header.tpl.php';

?>

        <main class="main">
            <div class="container">
                <div class="row">
                  <h2><?= $title ?></h2>

                    <form class="needs-validation" action="/posts" method="post" novalidate>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="title" value="<?= specialChars(old('title')); ?>">

                            <?php if(isset($validation)){echo $validation->errorsList('title');} ?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Excerpt</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="excerpt" placeholder="Опис до поста" value="<?= specialChars(old('title')); ?>">

                            <?php if(isset($validation)){echo $validation->errorsList('excerpt');} ?>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="Чекаю на введення даних"><?= specialChars(old('content')); ?></textarea>
                           
                            <?php  if(isset($validation)){echo $validation->errorsList('content');} ?>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Create post</button>
                        </div>
                    </form>
                   
                   
                </div>
            </div>
        </main>

<?php require COMPONENTS . '/footer.tpl.php'; ?>