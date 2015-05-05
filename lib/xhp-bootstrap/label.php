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

final class :bootstrap:label extends :bootstrap:base {

  attribute
    :span,
    enum {
        'default',
        'primary',
        'success',
        'info',
        'warning',
        'danger'
    } use = 'default';

  protected function render(): XHPRoot {
    $ret =
      <span class={$this->:class}>
        {$this->getChildren()}
      </span>;
    $ret->addClass('label');
    $ret->addClass('label-'.$this->:use);
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1(): :xhp {
    return
      <x:frag>
        <bootstrap:label>Default</bootstrap:label>
        <bootstrap:label use="primary">Primary</bootstrap:label>
        <bootstrap:label use="success">Success</bootstrap:label>
        <bootstrap:label use="info">Info</bootstrap:label>
        <bootstrap:label use="warning">Warning</bootstrap:label>
        <bootstrap:label use="danger">Danger</bootstrap:label>
      </x:frag>;
  }
}
