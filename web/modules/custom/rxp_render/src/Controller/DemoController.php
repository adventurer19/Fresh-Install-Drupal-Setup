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
    $build['examples_link'] = [
      '#title' => $this
        ->t('Render element link'),
      '#type' => 'link',
      '#ajax' => [
        'dialogType' => 'modal',
        'dialog' => ['height' => 400, 'width' => 700],
      ],

      //        'data-dialog-renderer' => "off_canvas"
      '#url' => \Drupal\Core\Url::fromRoute('node.add', ['node_type' => 'article']),
    ];
    return $build;
    return [
      '#markup' => '        <a class="edit-button use-ajax" 
            data-dialog-options="{&quot;width&quot;:400}" 
            data-dialog-renderer="off_canvas" 
            data-dialog-type="dialog" 
            href="/node/2">
            Third article displayed in a nice off canvas dialog.
        </a>
',
    ];

    return [
      '#markup' => '<a class="use-ajax" 
    data-dialog-options="{&quot;width&quot;:400}" 
    data-dialog-type="modal" 
    href="/node/1">
    First node displayed in modal dialog.
</a>',
    ];

    $node = Node::load(1);
    $module_handler = \Drupal::moduleHandler()
      ->invoke('mm_email', 'node_update', [$node]);
    $operation = 'update';
    $operation = 'delete';

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

