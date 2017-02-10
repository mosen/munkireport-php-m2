<div class="mr-alert alert alert-dismissable alert-<?php echo $type; ?>">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <ul>

        <?php foreach ($list AS $msg): ?>

        <li><?php echo $msg; ?></li>

        <?php endforeach; ?>

    </ul>

</div>
