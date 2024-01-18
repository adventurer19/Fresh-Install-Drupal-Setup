<?php

namespace Drupal\azure_collector;

use Drupal\Core\Messenger\Messenger;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

class AzureCollector implements AzureCollectorInterface {

  /**
   * Provides messenger service.
   *
   * @var \Drupal\Core\Messenger\Messenger
   */
  protected Messenger $messenger;

  public function printSentance(TranslatableMarkup $sentance): void {
    $this->messenger->addMessage($sentance);
  }

  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

}