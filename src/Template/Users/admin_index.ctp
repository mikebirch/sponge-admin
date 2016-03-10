<?php $this->assign('title', 'Website Administration | Users') ?>
<?php $this->layout = 'admin'; ?>
<h1>Users</h1>
<?php if($userData['is_admin']) : ?>
<p><?= $this->Html->link(__('New User'), ['action' => 'add'], array('class' => 'btn button')) ?></p>
<?php endif ?>
<table>
    <tr>
        <th class="actions">&nbsp;</th>
        <th><?= $this->Paginator->sort('username', __d('user_tools', 'Username')) ?></th>
        <th><?= $this->Paginator->sort('email', __d('user_tools', 'Email')) ?></th>
        <th><?= $this->Paginator->sort('email_verified', __d('user_tools', 'Email Verified')) ?></th>
        <th><?= $this->Paginator->sort('created', __d('user_tools', 'Created')) ?></th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td class="actions">
                <?php if($userData['is_admin']) : ?>
                <?= $this->Delete->createForm(['action' => 'delete', $user->id]) ?>
                <?php endif ?>
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?php if($userData['is_admin']) : ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?php endif ?>
            </td>
            <td>
                <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
            </td>
            <td>
                <?= h($user->email) ?>
            </td>
            <td>
                <?= $user->email_verified == 1 ? __d('user_tools', 'Yes') : __d('user_tools', 'No') ?>
            </td>
            <td>
                <?php
                    if (empty($user->created)) {
                        echo '-';
                    } else {
                        echo h($this->Time->format($user->created, 'd MMM YYYY'));
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>