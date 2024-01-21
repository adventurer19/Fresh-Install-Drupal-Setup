<?php

namespace Drupal\azure_content\Controller;

use Drupal\azure_collector\AzureCollectorManager;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\StreamWrapper\StreamWrapperManager;
use Drupal\Core\StreamWrapper\StreamWrapperManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AzureContentController extends ControllerBase {

  /**
   * The stream wrapper manager.
   *
   * @var \Drupal\Core\StreamWrapper\StreamWrapperManagerInterface
   */
  protected StreamWrapperManagerInterface $streamWrapperManager;

  public function isList() {
    return array_is_list(['0' => 'cats', '1' => 'dogs']);
  }

  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->streamWrapperManager = $container->get('stream_wrapper_manager');
    return $instance;
  }

  public function checkFile(): array {
    $build = [];
    $scheme = $this->streamWrapperManager::getScheme('private://2024-01/ConfigSchemaCheatSheet2.0 (1).pdf');
    //    $wrapper_instance_by_scheme->mkdir()
    //    $dir = $wrapper_instance_by_scheme->dirname('private://2024-01/ConfigSchemaCheatSheet2.0 (1).pdf');
    //    $dir = $wrapper_instance_by_scheme->dirname('azure://2024-01/ConfigSchemaCheatSheet2.0 (1).pdf');
    // uri = 'private://2024-01/ConfigSchemaCheatSheet2.0 (1).pdf';
    $descriptions = $this->streamWrapperManager->getDescriptions();
    foreach ($descriptions as $id => $description) {
      $build[$id] = [
        '#markup' => $description . '</br>',
      ];
    }
    return $build;
  }

  public function content() {
    $build = [];
    $build += $this->checkFile();
    $build['paragraph_one'] = [
      '#markup' => t('Hello From Azure Content Controller/'),
    ];
    $build['paragraph_two'] = [
      '#theme' => 'azure_content',
    ];

    return $build;
  }

  public function xssExample(): array {
    $build = [];
    $build['paragraph_one'] = [
      '#theme' => 'azure_content',
    ];
    // Yes, Drupal has built-in security measures to automatically
    // escape and sanitize user input to prevent common security
    // vulnerabilities like cross-site scripting (XSS). When you
    // output content using Drupal's render system, it generally
    // applies automatic sanitization to protect against XSS attacks.
    // In a render array, the #markup property is automatically sanitized
    // by default, meaning any potentially harmful content will be escaped.
    // Drupal uses the Twig templating engine, which automatically escapes
    // variables unless instructed otherwise. This helps to ensure that user
    // input is treated as plain text and not as executable code.

    // If you intentionally want to output raw HTML without escaping,
    // you need to explicitly mark it as safe using the #markup property
    // with the Markup::create method. However, be cautious when doing this
    //, as it can introduce security risks if not handled carefully.

    $build['xss'] = [
      '#markup' => Markup::create('<script>alert("Hello, this is an XSS attack!");</script>'),
    ];
    // Override markup with xss filter
    $build['xss'] = [
      '#markup' => Xss::filter(Markup::create('<script>alert("Hello, this is an XSS attack!");</script>')),
    ];

    $user_input = '<br><p>This is a sample text with special characters & symbols.</p>';

    // Use Html::escape() to sanitize the user input.
    $filtered_value = Html::escape($user_input);
    // <br><p>This is a sample text with special characters & symbols.</p> will be printed
    $build['filtered_value'] = [
      '#markup' => $filtered_value,
    ];
    return $build;
  }

}