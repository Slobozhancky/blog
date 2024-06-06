<?php require COMPONENTS . '/header.tpl.php'; ?>

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2>About</h2>
                        <p><?= $content ?></p>
                    </div>

                   <?php require COMPONENTS . "/sidebar.tpl.php"; ?>
                    
                </div>
            </div>
        </main>

<?php require COMPONENTS . '/footer.tpl.php'; ?>
