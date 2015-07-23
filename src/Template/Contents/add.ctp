<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Add a page | Website Administration') ?>
<?= $this->Form->create($content) ?>
<fieldset>
    <legend><?= __('Add a page') ?></legend>
    <?php
        echo $this->Form->input('parent_id', ['options' => $parents, 'empty' => true]);
        echo $this->Form->input('description');
        echo $this->Form->input('nav');
        echo $this->Form->input('title');
        echo $this->Form->input('body', ['class' => 'froala']);
        echo $this->Form->input('sidebar', ['class' => 'froala']);
        echo $this->Form->input('public');
        echo $this->Form->input('published');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
