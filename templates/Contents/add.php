<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Add a page | Website Administration') ?>
<?= $this->Form->create($content) ?>
<fieldset>
    <legend><?= __('Add a page') ?></legend>
    <?php
        echo $this->Form->control('parent_id', ['options' => $parents, 'empty' => true]);
        echo $this->Form->control('description');
        echo $this->Form->control('nav');
        echo $this->Form->control('title');
        echo $this->Form->control('body', ['class' => 'froala']);
        echo $this->Form->control('sidebar', ['class' => 'froala']);
        echo $this->Form->control('public');
        echo $this->Form->control('published');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
