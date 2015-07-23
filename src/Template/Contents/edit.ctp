<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Edit page | Website Administration') ?>
<?= $this->Form->create($content) ?>
<fieldset>
    <legend><?= __('Edit page') ?></legend>
    <?php
        if($userData['is_admin'] == true) {
            echo $this->Form->input('slug');
        } else {
            echo $this->Form->input('slug', array('type' => 'hidden'));
        }
        if($userData['is_admin'] == true) {
            echo $this->Form->input('parent_id', ['options' => $parents, 'empty' => true]);
            echo $this->Form->input('description');
        }
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

