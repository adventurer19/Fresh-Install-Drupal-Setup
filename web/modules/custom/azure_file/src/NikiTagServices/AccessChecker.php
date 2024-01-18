<?php

namespace Drupal\azure_file\NikiTagServices;

use Drupal\Core\Access\AccessCheckInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityTypeManagerInterface;

class AccessChecker implements AccessCheckInterface {

  protected EntityTypeManagerInterface $entityTypeManager;

  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public function applies(\Symfony\Component\Routing\Route $route) {
    $definitions = $this->entityTypeManager->getDefinitions();
    return TRUE;
    // TODO: Implement applies() method.
  }

  public function access(\Symfony\Component\Routing\Route $route) {
//    echo 123;
    return AccessResult::allowed();
    $definitions = $this->entityTypeManager->getDefinitions();
    return TRUE;

  }

}
