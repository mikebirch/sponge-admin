<?php 
use Cake\Core\Configure;
$spongeAdmin = Configure::read('spongeAdmin');
$this->set('spongeAdmin', $spongeAdmin);
?>
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->fetch('title'); ?></title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic|Roboto+Condensed' rel='stylesheet' type='text/css'>

        <?= $this->Html->css('admin.min') ?>

        <?php if($froala === true) : ?>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
        <?=
            $this->Html->css(array(
                '/CakephpFroalaUpload/css/froala_editor.min',
                '/CakephpFroalaUpload/css/froala_style.min'
            ));
        ?>
        <?php endif ?>
        <?= $this->fetch('css'); ?>

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <?= $this->Html->css('ie.min') ?>
        <![endif]-->
        
    </head>
    <body>
        <?= $spongeAdmin['adminNavIcons'] ?>
        <div class="header-wrapper">
            <header role="banner">

                <!-- <img src="/img/admin/logo.svg" alt="SpongeCake logo"> -->
                
                <div class="header-title">Administration</div>
                <div class="header-home-link"><?php
                    echo $this->Html->link('<svg class="icon icon-home"><use xlink:href="#icon-home"></use></svg><span>' . $settings['Site']['title'] . '</span>', "/", array('escape' => false));
                ?></div>
                
                <div class="header-user">
                    <ul class="nav">
                        <li class="parent"><svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg><span><?= $userData['username'] ?></span><svg class="icon icon-arrow-down"><use xlink:href="#icon-arrow-down"></use></svg>
                            <ul class="sub-nav">
                                <li><?= 
                                $this->Html->link('<svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>Profile', array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'profile'), array('escape' => false));
                                ?></li>
                                <li><?= 
                                $this->Html->link('<svg class="icon icon-switch"><use xlink:href="#icon-switch"></use></svg>Log Out', array('admin' => false, 'plugin' => null, 'controller' => 'users', 'action' => 'logout'), array('escape' => false));   
                                ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <nav class="nav-collapse">
                    <ul class="primary">
                        <?= $this->Menu->adminNav($spongeAdmin['adminNav'], $this->request->here); ?>
                    </ul>
                </nav>

            </header> 
            
        </div>
        <div class="main-wrapper">
            <main role="main">

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

        <?php if($froala === true) : ?>
        <?=         
        $this->Html->script(array(
            '/CakephpFroalaUpload/js/froala_editor.min',
            '/CakephpFroalaUpload/js/plugins/file_upload.min',
            '/CakephpFroalaUpload/js/plugins/lists.min',
            '/CakephpFroalaUpload/js/plugins/media_manager.min',
            '/CakephpFroalaUpload/js/plugins/urls.min',
            '/CakephpFroalaUpload/js/plugins/video.min',
            'froala-config.min'
        ));
        ?>
        <?php endif ?>

        <?= $this->Html->script('admin.min') ?>

        <?= $this->fetch('script'); ?>

        <?php if($settings['Site']['dev'] && $settings['Site']['useLivereload']) : ?>
        <?= $settings['Site']['livereload'] ?>
        <?php endif ?>
    </body>
</html>