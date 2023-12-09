<?php

namespace Drupal\rxp_render\Controller;

use Drupal\Component\EventDispatcher\ContainerAwareEventDispatcher;
use Drupal\Component\Utility\EmailValidator;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\rxp_render\Event\DemoEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DemoController extends ControllerBase {

  protected $emailValidator;

  /**
   */
  protected ContainerAwareEventDispatcher $eventDispatcher;

  public function index() {
    $operation = 'update';
    $operation = 'delete';
    $node = Node::load(1);

    if ($operation === 'delete') {
      $event = new DemoEvent($node, $operation);
      $this->eventDispatcher->dispatch($event, DemoEvent::REMOVE_COURSE);
    }
    if ($operation === 'update') {
      $event = new DemoEvent($node, $operation);
      $this->eventDispatcher->dispatch($event, DemoEvent::UPDATE_NODE);
    }
      
    $data = [
      '#markup' => $this->t('This is random data'),
    ];
    return $data;
  }

  public function __construct(EmailValidator $emailValidator, ContainerAwareEventDispatcher $eventDispatcher) {
    $this->emailValidator = $emailValidator;
    $this->eventDispatcher = $eventDispatcher;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('email.validator'),
      $container->get('event_dispatcher'),
    );
  }

}

