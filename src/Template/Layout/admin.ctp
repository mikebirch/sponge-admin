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
        <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
        <symbol id="icon-home" viewBox="0 0 1024 1024">
            <title>home</title>
            <path class="path1" d="M1024 608l-192-192v-288h-128v160l-192-192-512 512v32h128v320h320v-192h128v192h320v-320h128z" />
        </symbol>
        <symbol id="icon-stack" viewBox="0 0 1024 1024">
            <title>stack</title>
            <path class="path1" d="M1024 320l-512-256-512 256 512 256 512-256zM512 148.97l342.058 171.030-342.058 171.030-342.058-171.030 342.058-171.030zM921.444 460.722l102.556 51.278-512 256-512-256 102.556-51.278 409.444 204.722zM921.444 652.722l102.556 51.278-512 256-512-256 102.556-51.278 409.444 204.722z" />
        </symbol>
        <symbol id="icon-pushpin" viewBox="0 0 1024 1024">
            <title>pushpin</title>
            <path class="path1" d="M544 0l-96 96 96 96-224 256h-224l176 176-272 360.616v39.384h39.384l360.616-272 176 176v-224l256-224 96 96 96-96-480-480zM448 544l-64-64 224-224 64 64-224 224z" />
        </symbol>
        <symbol id="icon-users" viewBox="0 0 1024 1024">
            <title>users</title>
            <path class="path1" d="M734.994 805.374c-18.952-2.988-19.384-54.654-19.384-54.654s55.688-54.656 67.824-128.152c32.652 0 52.814-78.138 20.164-105.628 1.362-28.94 41.968-227.176-163.598-227.176-205.564 0-164.958 198.236-163.598 227.176-32.654 27.49-12.488 105.628 20.162 105.628 12.134 73.496 67.826 128.152 67.826 128.152s-0.432 51.666-19.384 54.654c-61.048 9.632-289.006 109.316-289.006 218.626h768c0-109.31-227.958-208.994-289.006-218.626zM344.054 822.81c44.094-27.15 97.626-52.308 141.538-67.424-15.752-22.432-33.294-52.936-44.33-89.062-15.406-12.566-27.944-30.532-35.998-52.602-8.066-22.104-11.122-46.852-8.608-69.684 1.804-16.392 6.478-31.666 13.65-45.088-4.35-46.586-7.414-138.034 52.448-204.732 23.214-25.866 52.556-44.46 87.7-55.686-6.274-64.76-39.16-140.77-166.454-140.77-205.564 0-164.958 198.236-163.598 227.176-32.654 27.49-12.488 105.628 20.162 105.628 12.134 73.496 67.826 128.152 67.826 128.152s-0.432 51.666-19.384 54.654c-61.048 9.634-289.006 109.318-289.006 218.628h329.596c4.71-3.074 9.506-6.14 14.458-9.19z" />
        </symbol>
        <symbol id="icon-dashboard" viewBox="0 0 1024 1024">
            <title>dashboard</title>
            <path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM512 896c-212.078 0-384-171.922-384-384s171.922-384 384-384c212.078 0 384 171.922 384 384s-171.922 384-384 384zM448 256c0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64s-64-28.654-64-64zM640 320c0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64s-64-28.654-64-64zM256 320c0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64s-64-28.654-64-64zM448 704v64h128v-64l-64-320z" />
        </symbol>
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1024 1024">
            <title>user</title>
            <path class="path1" d="M622.826 702.736c-22.11-3.518-22.614-64.314-22.614-64.314s64.968-64.316 79.128-150.802c38.090 0 61.618-91.946 23.522-124.296 1.59-34.054 48.96-267.324-190.862-267.324s-192.45 233.27-190.864 267.324c-38.094 32.35-14.57 124.296 23.522 124.296 14.158 86.486 79.128 150.802 79.128 150.802s-0.504 60.796-22.614 64.314c-71.22 11.332-337.172 128.634-337.172 257.264h896c0-128.63-265.952-245.932-337.174-257.264z" />
        </symbol>
        <symbol id="icon-switch" viewBox="0 0 1024 1024">
            <title>switch</title>
            <path class="path1" d="M640 146.588v135.958c36.206 15.804 69.5 38.408 98.274 67.18 60.442 60.44 93.726 140.8 93.726 226.274s-33.286 165.834-93.726 226.274c-60.44 60.44-140.798 93.726-226.274 93.726s-165.834-33.286-226.274-93.726c-60.44-60.44-93.726-140.8-93.726-226.274s33.286-165.834 93.726-226.274c28.774-28.774 62.068-51.378 98.274-67.182v-135.956c-185.048 55.080-320 226.472-320 429.412 0 247.424 200.578 448 448 448 247.424 0 448-200.576 448-448 0-202.94-134.95-374.332-320-429.412zM448 0h128v512h-128z" />
        </symbol>
        <symbol id="icon-arrow-down" viewBox="0 0 1024 1024">
            <title>arrow-down</title>
            <path class="path1" d="M792.73 438.426c-20.838 21.402-240.384 230.554-240.384 230.554-11.162 11.418-25.754 17.101-40.346 17.101-14.643 0-29.235-5.683-40.346-17.101 0 0-219.546-209.152-240.435-230.554-20.838-21.402-22.272-59.853 0-82.739 22.323-22.835 53.402-24.627 80.691 0l200.090 191.898 200.038-191.846c27.341-24.627 58.47-22.835 80.691 0 22.323 22.835 20.941 61.338 0 82.688z" />
        </symbol>
        <symbol id="icon-checkmark-circle" viewBox="0 0 1024 1024">
            <title>checkmark-circle</title>
            <path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM416 832l-212-276 94-98 118 150 370-302 46 46-416 480z"></path>
        </symbol>
        <symbol id="icon-cancel-circle" viewBox="0 0 1024 1024">
            <title>cancel-circle</title>
            <path class="path1" d="M512 0c-282.77 0-512 229.23-512 512s229.23 512 512 512 512-229.23 512-512-229.23-512-512-512zM768 346.51l-165.488 165.49 165.488 165.488v90.512h-90.512l-165.488-165.488-165.49 165.488h-90.51v-90.512l165.49-165.488-165.49-165.49v-90.51h90.51l165.49 165.49 165.488-165.49h90.512v90.51z"></path>
        </symbol>
        </defs>
        </svg>
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
                        <?= $this->Menu->adminNav($settings['adminNav'], $this->request->here); ?>
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