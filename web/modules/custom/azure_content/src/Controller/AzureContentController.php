<?php

namespace Drupal\azure_content\Controller;

use Drupal\azure_collector\AzureCollectorManager;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AzureContentController extends ControllerBase {

  public function content() {
    $build = [];
    $build['paragraph_one'] = [
      '#markup' => t('Hello From Azure Content Controller/'),
    ];
    $build['paragraph_two'] = [
      '#theme' => 'azure_content',
    ];
    return $build;
  }

}