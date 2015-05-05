<?hh
/*
 *  Copyright (c) 2014, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

<<ExamplesInClass(':bootstrap:list-group')>>
final class :bootstrap:list-group-item extends :bootstrap:base {

  attribute
    :a,
    enum {
      'success',
      'info',
      'warning',
      'danger',
      'none'
    } use = 'none',
    bool active = false;

  protected function render(): XHPRoot {
    $ret = <a>{$this->getChildren()}</a>;
    if ($this->:active) {
      $ret->addClass('active');
    }
    $ret->addClass('list-group-item');
    switch ($this->:use) {
      case 'success':
        $ret->addClass('list-group-item-success');
        break;
      case 'info':
        $ret->addClass('list-group-item-info');
        break;
      case 'warning':
        $ret->addClass('list-group-item-warning');
        break;
      case 'danger':
        $ret->addClass('list-group-item-danger');
        break;
    }
    return $ret;
  }
}
