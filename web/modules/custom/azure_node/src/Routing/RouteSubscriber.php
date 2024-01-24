<?php

namespace Drupal\azure_node\Routing;

use Drupal\azure_node\Controller\AzureNodeController;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.node.canonical')) {
      $route->setDefault('_controller', AzureNodeController::class . '::view');
    }
  }

}