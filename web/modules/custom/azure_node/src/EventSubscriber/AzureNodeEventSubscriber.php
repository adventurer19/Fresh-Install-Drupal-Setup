<?php

namespace Drupal\azure_node\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AzureNodeEventSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents(): array {
    $events[KernelEvents::VIEW][] = ['nodeViewDisplayAlter', 100000];

    return $events;
    // TODO: Implement getSubscribedEvents() method.
  }

  public function nodeViewDisplayAlter(ViewEvent $event): void {
  if (isset($event->getControllerResult()['#node'])){
    $data = $event->getControllerResult();
    $data['#view_mode'] = 'azure';
    $event->setControllerResult($data);
  }
    $a = 1;


  }

}
