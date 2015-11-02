<?php

namespace Drupal\observable_storage\Controller;

use \EntityAPIController;

class ObserverStorageController extends \EntityAPIController {
  public function create(array $values = array()) {
    $values += array(
      'status'      => 1,
      'created'     => REQUEST_TIME,
      'changed'     => REQUEST_TIME,
    );

    return parent::create($values);
  }


  public function delete($ids, \DatabaseTransaction $transaction = NULL) {
    $transaction = isset($transaction) ? $transaction : db_transaction();
    try {
      parent::delete($ids, $transaction);

      db_delete('observers')
        ->condition('observer_id', $ids, 'IN')
        ->execute();
    }
    catch (\Exception $e) {
      watchdog_exception($this->entityType, $e);
      $transaction->rollback();
      throw $e;
    }
  }
}