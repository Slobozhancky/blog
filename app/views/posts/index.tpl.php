<?php require COMPONENTS . '/header.tpl.php'; ?>

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php foreach ($posts as $key => $post): ?>
                            
                            <div class="card mb-2 ms-2"">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post['title'] ?></h5>
                                    <p class="card-text"><?= $post['content'] ?></p>
                                    <a href="posts?id=<?php echo $post['id'] ?>" class="btn btn-primary">Go to post</a>
                                    <div class="d-flex justify-content-end">
                                        <p class="text-black-50"><?= date('d.m.Y', strtotime($post['created_at'])) ?></p>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endforeach ?>    
                    </div>

                   <?php require COMPONENTS . "/sidebar.tpl.php"; ?>
                   
                </div>
            </div>
        </main>

<?php require COMPONENTS . '/footer.tpl.php'; ?>
