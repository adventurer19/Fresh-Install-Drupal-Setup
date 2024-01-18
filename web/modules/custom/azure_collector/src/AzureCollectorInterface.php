<?php

namespace Drupal\azure_collector;

use Drupal\Core\StringTranslation\TranslatableMarkup;

interface AzureCollectorInterface {

  public function printSentance(TranslatableMarkup $sentance);

}