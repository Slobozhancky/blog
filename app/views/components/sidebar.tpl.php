<div class="col-md-4">
    <ul class="list-group">

        <?php foreach ($list_group as $key => $post): ?>
            <li class="list-group-item">
                <a href="post?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
            </li>
        <?php endforeach ?>    

    </ul>
</div>