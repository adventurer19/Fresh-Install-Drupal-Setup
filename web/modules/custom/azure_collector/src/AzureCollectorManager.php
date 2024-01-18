<?php

namespace Drupal\azure_collector;

use Drupal\Core\StringTranslation\StringTranslationTrait;

class AzureCollectorManager {

  use StringTranslationTrait;

  public function sayHello(AzureCollectorInterface $azure_collector, string $id, int $priority = 0, $additional_data = ''): void {
    $msg = $this->t('Hello from %id service', ['%id' => $id]);
    $azure_collector->printSentance($msg);
  }

}