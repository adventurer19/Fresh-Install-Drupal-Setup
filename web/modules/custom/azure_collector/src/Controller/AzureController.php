<?php

namespace Drupal\azure_collector\Controller;

use Drupal\azure_collector\AzureCollectorManager;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AzureController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * @var \Drupal\azure_collector\AzureCollectorManager $azureCollectorManager
   */
  protected AzureCollectorManager $azureCollectorManager;

  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->azureCollectorManager = $container->get('azure_collector.azure_collector_manager');
    return $instance;
  }

  public function content() {
    return [
      '#markup' => t('Hello From Azure Controller/'),
    ];
  }

}