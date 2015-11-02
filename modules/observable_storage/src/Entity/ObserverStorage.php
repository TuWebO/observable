<?php

namespace Drupal\observer_storage\Entity;

use Drupal\observable\Entity\Observable;
use Drupal\observable\Controller\Observer;


class ObserverStorage extends \Entity implements Observer {
  private $observable = NULL; // ObservableStorage Obj.

  /*public function __construct(Observable $o) {
    $this->observable = $o;
    $o->addObserver($this);
  }*/

  public function update(Observable $observable, $data = NULL) {
    if ($observable instanceof ObservableStorage) {
      // $obj = $observable;
      //$this->hiring = $companyData->getHiring();
      //$this->display();
    }
  }
}
/*
public function __construct(array $values = array(), $entityType = NULL) {
  if (empty($entityType)) {
    throw new Exception('Cannot create an instance of Entity without a specified entity type.');
  }
  $this->entityType = $entityType;
  $this->setUp();
  // Set initial values.
  foreach ($values as $key => $value) {
    $this->$key = $value;
  }
}*/