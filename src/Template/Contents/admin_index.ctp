<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Pages | Website Administration') ?>
<h1>Pages</h1>

<?php if($userData['is_superuser']) : ?>
<p><?php echo $this->Html->link('New Page', ['action' => 'add'], ['class' => 'btn button hijax-panel']); ?></p>
<?php endif ?>

<div class="table-responsive"><table class="table-striped">
<thead>
<tr>
        <th class="actions">&nbsp;</th>
        <th>Page</th>
        <th>Published</th>
        <th>Public</th>
        <?php if($userData['is_superuser']) : ?>
        <th>Up</th>
        <th>Down</th>
        <?php endif ?>
</tr>
</thead>
<tbody>
<?php foreach ($contents as $content): ?>
<tr>
    <td class="actions">
        <?php if($userData['is_superuser']) : ?>
        <?php echo $this->Delete->createForm(['action' => 'delete', $content->id]) ?>
        <?php endif ?>
        <a href="<?= $content->path ?>">View</a>
        <?php echo $this->Html->link('Edit', ['action' => 'edit', $content->id], ['class' => 'hijax-panel']); ?>
    </td>
    <td><?php echo $this->Html->link($content->nav, ['action' => 'edit', $content->id],['escape' => false, 'class' => 'hijax-panel']); ?></td>
    <?php
        $yes = '<svg class="icon icon-checkmark-circle"><use xlink:href="/img/admin/icons.svg#icon-checkmark-circle"></use></svg><span>Yes</span>';
        $no = '<svg class="icon icon-cancel-circle"><use xlink:href="/img/admin/icons.svg#icon-cancel-circle"></use></svg><span>No</span>';
        $up = '<svg class="icon icon-move-up"><use xlink:href="/img/admin/icons.svg#icon-move-up"></use></svg><span>Up</span>';
        $down = '<svg class="icon icon-move-down"><use xlink:href="/img/admin/icons.svg#icon-move-down"></use></svg><span>Down</span>';
    ?>
    <td class="item--published hide-text"><?= $content->published == 1 ? $yes : $no ?></td>
    <td class="item--public hide-text"><?= $content->public == 1 ? $yes : $no ?></td>
    <?php if($userData['is_superuser']) : ?>
    <td class="item--up hide-text"><?php echo $this->Html->link($up, ['action' => 'moveUp', $content->id],['escape' => false]); ?></td>
    <td class="item--down hide-text"><?php echo $this->Html->link($down, ['action' => 'moveDown', $content->id],['escape' => false]); ?></td>
    <?php endif ?>
</tr>
<?php endforeach; ?>
</tbody>
</table></div>
