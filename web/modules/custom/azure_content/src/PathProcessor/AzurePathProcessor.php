<?php

namespace Drupal\azure_content\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Symfony\Component\HttpFoundation\Request;

class AzurePathProcessor implements InboundPathProcessorInterface {

  public function processInbound($path, Request $request) {
    if ($path === '/niki/thep') {
      $path = '/azure-content/content';
    }
    return $path;
  }

}