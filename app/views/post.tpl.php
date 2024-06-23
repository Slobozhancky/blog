<?php require COMPONENTS . '/header.tpl.php'; ?>

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><?= $post['content'] ?></p>
                            <div class="d-flex justify-content-end">
                                <p class="text-black-50"><?= date('d.m.Y', strtotime($post['created_at'])) ?></p>
                            </div>
                        </div>  
                    </div>

                   <?php require COMPONENTS . "/sidebar.tpl.php"; ?>
                   
                </div>
            </div>
        </main>

<?php require COMPONENTS . '/footer.tpl.php'; ?>