<?php debug($post); ?>

<h2> <?= h($post['Post']['title']) ?></h2>

<p>
<small>投稿日時
<?=h( $post['Post']['created']); ?>
</small>
</p>

<p><?= h($post['Post']['body']); ?></p>