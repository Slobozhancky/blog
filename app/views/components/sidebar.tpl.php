<div class="col-md-4">
    <ul class="list-group">
        <h3>New Posts</h3>
        <?php foreach ($list_group as $key => $post): ?>
            <li class="list-group-item">
                <a href="posts?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
            </li>
        <?php endforeach ?>    

    </ul>
</div>