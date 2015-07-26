<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Pages | Website Administration') ?>
<h1>Pages</h1>

<?php if($userData['is_admin']) : ?>
<p><?php echo $this->Html->link('New Page', array('action' => 'add'), array('class' => 'btn button')); ?></p>
<?php endif ?>

<div class="table-responsive"><table class="table-striped">
<thead>
<tr>
        <th class="actions">&nbsp;</th>
        <th>Page</th>
        <th>Published</th>
        <th>Public</th>
</tr>
</thead>
<tbody>
<?php foreach ($contents as $content): ?>
<tr>
    <td class="actions">
        <?php if($userData['is_admin']) : ?>
        <?php echo $this->Delete->createForm(array('action' => 'delete', $content->id)) ?>
        <?php endif ?>
        <a href="<?= $content->path ?>">View</a>
        <?php echo $this->Html->link('Edit', array('action' => 'edit', $content->id)); ?>
    </td>
    <td><?php echo $this->Html->link($content->nav, array('action' => 'edit', $content->id),['escape' => false]); ?></td>
    <?php 
        $yes = '<svg class="icon icon-checkmark-circle"><use xlink:href="#icon-checkmark-circle"></use></svg><span>Yes</span>';
        $no = '<svg class="icon icon-cancel-circle"><use xlink:href="#icon-cancel-circle"></use></svg><span>No</span>';
    ?>
    <td class="pages--published"><?= $content->published == 1 ? $yes : $no ?></td>
    <td class="pages--public"><?= $content->public == 1 ? $yes : $no ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table></div>