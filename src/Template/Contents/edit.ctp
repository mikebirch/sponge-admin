<?php $this->layout = 'admin'; ?>
<?php $this->assign('title', 'Edit page | Website Administration') ?>
<?= $this->Form->create($content) ?>
<fieldset>
    <legend><?= __('Edit page') ?></legend>
    <?php
        if($this->request->params['pass'][0] != 1){ // not for home page
            if($userData['is_admin'] == true) {
                echo $this->Form->input('slug');
                echo $this->Form->input('parent_id', ['options' => $parents, 'empty' => true]);
            } else {
                echo $this->Form->input('slug', array('type' => 'hidden'));
            }
        }
        if($userData['is_admin'] == true) {
            echo $this->Form->input('description', [
                'label' => [
                    'text' => 'Meta Description<br /><span class="meta">This is a tag which is used by search engines. <a href="https://moz.com/learn/seo/meta-description">Learn about meta descriptions</a>.</span>',
                    'escape' => false
                ]
            ]);
        }
        echo $this->Form->input('nav');
        if($this->request->params['pass'][0] != 1){ // not for home page
            echo $this->Form->input('title');
        }
        echo $this->Form->input('body', ['class' => 'froala']);
        echo $this->Form->input('sidebar', ['class' => 'froala']);
        if($this->request->params['pass'][0] != 1){ // not for home page
            echo $this->Form->input('public');
            echo $this->Form->input('published');
        }
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
