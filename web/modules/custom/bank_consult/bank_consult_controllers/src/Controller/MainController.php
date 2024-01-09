<?php

namespace Drupal\bank_consult_controllers\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;

class MainController extends ControllerBase {

  public function delete(EntityInterface $entity) {
    try {
//      $entity->delete();
      $this->redirect($entity->hasLinkTemplate('collection'));
    }
    catch (\Exception $e) {
      // todo DI;
      \Drupal::logger('bank_consult_controllers')->error($e->getMessage());
    }
    return [
      '#markup' => $this->t('h1')
    ];
  }

}