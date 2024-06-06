<div class="col-md-4">
    <ul class="list-group">

        <li class="list-group-item active" aria-current="true">
            <a href="<?php echo $list_group[1]['slug'] ?>" class="link-light"><?php echo $list_group[1]['title'] ?></a>
        </li>

        <?php for ($i = 2; $i <= count($list_group) ; $i++): ?> 
                <li class="list-group-item">
                <a href="<?= $list_group[$i]['slug'] ?>"><?= $list_group[$i]['title'] ?></a>
            </li>
        <?php endfor ?>

    </ul>
</div>