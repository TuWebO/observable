<?php

namespace Drupal\observable\Entity;

use Drupal\observable\Controller\Observer;

abstract class Observable extends \Entity {
  private $observers = array();
  private $has_changed = FALSE;

  public function addObserver(Observer $o) {
    array_push($this->observers, $o);
  }

  public function deleteObserver(Observer $o) {
    $i = array_search($o, $this->observers);
    if ($i !== FALSE) {
      unset($this->observers[$i]);
    }
  }

  public function notifyObservers(/*\stdClass*/ $obj = NULL) {
    if ($this->has_changed) {
      foreach ($this->observers as $observer) {
        $observer->update($this, $obj);  // \Observer interface
      }
      $this->clearHasChanged();
    }
  }

  protected function setHasChanged() {
    $this->has_changed = TRUE;
  }

  protected function clearHasChanged() {
    $this->has_changed = FALSE;
  }

  protected function hasChanged() {
    return $this->has_changed;
  }
}