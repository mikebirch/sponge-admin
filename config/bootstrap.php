<?php
declare(strict_types=1);

use Cake\Core\Configure;

// use bootstrap_cli for bake
// see https://github.com/cakephp/cakephp/issues/11184#issuecomment-330239891
if (PHP_SAPI === 'cli') {
    Configure::write('Bake.theme', 'SpongeAdmin');
    require __DIR__ . '/bootstrap_cli.php';
}
