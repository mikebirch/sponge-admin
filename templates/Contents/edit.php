<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Edit page | Website Administration') ?>
<?= $this->Form->create($content) ?>
<fieldset>
    <legend><?= __('Edit page') ?></legend>
    <?php
        if($content->id != 1){ // not for home page
            if($user->is_superuser == true) {
                echo $this->Form->control('slug');
                echo $this->Form->control('parent_id', ['options' => $parents, 'empty' => true]);
            } else {
                echo $this->Form->control('slug', ['type' => 'hidden']);
            }
        }
        if($user->is_superuser == true) {
            echo $this->Form->control('description', [
                'label' => [
                    'text' => 'Meta Description<br /><span class="meta">This is a tag which is used by search engines. <a href="https://moz.com/learn/seo/meta-description">Learn about meta descriptions</a>.</span>',
                    'escape' => false
                ]
            ]);
        }
        echo $this->Form->control('nav');
        if($content->id != 1){ // not for home page
            echo $this->Form->control('title');
        }
        echo $this->Form->control('body', ['class' => 'froala']);
        echo $this->Form->control('sidebar', ['class' => 'froala']);
        if($content->id != 1){ // not for home page
            echo $this->Form->control('public');
            echo $this->Form->control('published');
        }
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
