<?php require './components/header.tpl.php'; ?>

        <header class="bg-dark mb-1">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">Home</a>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 d-flex">
                        <?php foreach ($posts as $key => $post): ?>
                            
                            <div class="card mb-2 ms-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $post['title'] ?></h5>
                                    <p class="card-text"><?= $post['body'] ?></p>
                                    <a href="<?= $post['slug'] ?>" class="btn btn-primary"><?= $post['slug'] ?></a>
                                </div>
                            </div>
                            
                        <?php endforeach ?>    
                    </div>

                   <?php require "./components/sidebar.tpl.php"; ?>
                   
                </div>
            </div>
        </main>

<?php require './components/footer.tpl.php'; ?>
