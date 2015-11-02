<?php

namespace Drupal\observable\Controller;

use Drupal\observable\Entity\Observable;

interface Observer {
  public function update(Observable $o, $data = NULL);
}

interface DisplayElement {
  public function display();
}