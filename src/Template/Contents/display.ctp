<?php 
if($this->request->here == '/') {
    $this->assign('title', $settings['Site']['title']);
} else {
    $this->assign('title', $content->title . ' | ' . $settings['Site']['title']);
}
?>
<h1><?= h($content->title) ?></h1>
<?= $content->body ?>

<?php
$this->start('sidebar');
if($content->child_contents) : ?>
    <?php $listitems = $this->Menu->nav($content->child_contents, $this->request->here, false, $this->Auth->isLoggedIn(), $content->slug); 
    if(!empty($listitems)) :
    ?>
        <div class="block">
        <h2 class="menu-heading"><?= h($content->nav) ?></h2>
        <ul class="menu">
            <?= $listitems  ?>
        </ul>
        </div>
    <?php endif ?> 
<?php endif ?>  


<?php if($siblings && !$content->child_contents) : ?>
    <?php $listitems = $this->Menu->nav($siblings, $this->request->here, false, $this->Auth->isLoggedIn(), $content->parent_content->slug); 
    if(!empty($listitems)) :
    ?>
        <div class="block">
        <h2 class="menu-heading"><?= $this->Html->link(h($content->parent_content->nav), $content->parent_content->path) ?></h2>
        <ul class="menu">
            <?= $listitems ?>
        </ul>
        </div>
    <?php endif ?>  
<?php endif ?> 
<?php $this->end(); ?>
