<?php
use Cake\Core\Configure;
$spongeAdmin = Configure::read('spongeAdmin');
$this->set('spongeAdmin', $spongeAdmin);
if($spongeAdmin['froala'] === true) {
    $this->Froala->plugin();
}
?>
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->fetch('title'); ?></title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic|Roboto+Condensed' rel='stylesheet' type='text/css'>
        <?= $this->Html->css('admin-v1.min') ?>
        <?= $this->fetch('css'); ?>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <?= $this->Html->css('ie.min') ?>
        <![endif]-->
    </head>
    <body id="admin">
        <div class="header-wrapper">
            <header role="banner">

                <!-- <img src="/img/admin/logo.svg" alt="SpongeCake logo"> -->

                <div class="header-title">Administration</div>
                <div class="header-home-link"><?php
                    echo $this->Html->link('<svg class="icon icon-home"><use xlink:href="/img/admin/icons.svg#icon-home"></use></svg><span>' . $settings['Site']['title'] . '</span>', "/", ['escape' => false]);
                ?></div>

                <div class="header-user">
                    <ul class="nav">
                        <li class="parent"><svg class="icon icon-user"><use xlink:href="/img/admin/icons.svg#icon-user"></use></svg><span><?= $userData['username'] ?></span><svg class="icon icon-arrow-down"><use xlink:href="/img/admin/icons.svg#icon-arrow-down"></use></svg>
                            <ul class="sub-nav">
                                <li><?=
                                $this->Html->link('<svg class="icon icon-user"><use xlink:href="/img/admin/icons.svg#icon-user"></use></svg>Profile', ['admin' => false, 'plugin' => 'CakeDC/Users', 'controller' => 'users', 'action' => 'profile'], ['escape' => false]);
                                ?></li>
                                <li><?=
                                $this->Html->link('<svg class="icon icon-switch"><use xlink:href="/img/admin/icons.svg#icon-switch"></use></svg>Log Out', ['admin' => false, 'plugin' => 'CakeDC/Users', 'controller' => 'users', 'action' => 'logout'], ['escape' => false]);
                                ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <nav class="nav-collapse">
                    <ul class="primary">
                        <?= $this->AdminMenu->adminNav($spongeAdmin['adminNav'], $this->request->getAttribute('here'), $userData); ?>
                    </ul>
                </nav>

            </header>

        </div>
        <div class="main-wrapper">
            <main>

                <?= $this->Flash->render() ?>
                <?= $this->Flash->render('auth') ?>

                <?= $this->fetch('content'); ?>

            </main>
        </div>
        <div class="footer-wrapper">
            <footer>

            </footer>
        </div>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script>window.jQuery || document.write('<script src="/sponge_admin/js/vendor/jquery.min.js"><\/script>')</script>
        <?= $this->Html->script('admin.min', ['block' => 'scriptBottom']) ?>
        <?= $this->fetch('scriptBottom') ?>
    </body>
</html>

