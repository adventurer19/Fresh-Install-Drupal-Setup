<?php

namespace Drupal\azure_node\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\node\Controller\NodeViewController;

class AzureNodeController extends NodeViewController {

  public function view(EntityInterface $node, $view_mode = 'full', $langcode = NULL) {
    if ($node->bundle() === 'article') {
      $view_mode = 'azure';
    }
    return parent::view($node, $view_mode, $langcode);
  }

}