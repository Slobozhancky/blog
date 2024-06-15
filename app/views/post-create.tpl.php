<?php require COMPONENTS . '/header.tpl.php'; ?>

        <main class="main">
            <div class="container">
                <div class="row">
                  <h2><?= $title ?></h2>

                    <form class="needs-validation" action="" method="post" novalidate>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="title">

                             <?php if(isset($errors['title'])): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['content'] ?>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                           
                            <?php if(isset($errors['content'])): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['content'] ?>
                            </div>
                            <?php endif ?>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Create post</button>
                        </div>
                    </form>
                   
                   
                </div>
            </div>
        </main>

<?php require COMPONENTS . '/footer.tpl.php'; ?>