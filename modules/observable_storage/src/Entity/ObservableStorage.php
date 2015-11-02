<?php

namespace Drupal\observer_storage\Entity;

use Drupal\observable\Entity\Observable;
use Drupal\observable\Controller\Observer;


class ObservableStorage extends Observable {
  public function addObserver(Observer $o) {
    parent::addObserver($o);
  }

  public function deleteObserver(Observer $o) {
    parent::deleteObserver($o);
    /*$i = array_search($o, $this->observers);
    if ($i !== FALSE) {
      unset($this->observers[$i]);
    }*/
  }

  public function storedObservers() {

  }
}