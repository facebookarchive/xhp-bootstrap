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

final class :bootstrap:alert extends :bootstrap:base {

  attribute
    :div,
    bool dismiss = false,
    enum {
      'success',
      'info',
      'warning',
      'danger'
    } use = 'warning';

  protected function render(): XHPRoot {
    foreach($this->getChildren('a') as $child) {
      assert($child instanceof :a);
      $child->addClass('alert-link');
    }
    $ret =
      <div class={$this->:class}>
        {$this->getChildren()}
      </div>;

    $ret->addClass('alert');
    $ret->addClass('alert-'.$this->:use);

    if ($this->:dismiss) {
      $close =
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>;
      $this->prependChild($close);
    }

    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:alert use="success">
          You rock
        </bootstrap:alert>
        <bootstrap:alert use="info">
          Maybe you rock
        </bootstrap:alert>
        <bootstrap:alert use="warning">
          WAT??
        </bootstrap:alert>
        <bootstrap:alert use="danger" dismiss={true}>
          May day May day
          <a href="https://somewhere.com">Go here</a>
        </bootstrap:alert>
      </x:frag>;
  }
}
