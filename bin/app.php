<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 14/01/19
 * Time: 9:49 AM
 */

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Console\Application;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../config'));
$loader->load('container.yml');

$container->compile();

$cmd = $container->get('inscription');

$app = new Application();
$app->add($cmd);
$app->run();