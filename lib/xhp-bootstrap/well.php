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

final class :bootstrap:well extends :bootstrap:base {
  attribute
    :div,
    enum {
      'default',
      'large',
      'small'
    } size = 'default';

  protected function render(): XHPRoot {
    $ret =
      <div>
        {$this->getChildren()}
      </div>;

    if ($this->:size === 'large') {
      $ret->addClass('well-lg');
    } elseif ($this->:size === 'small') {
      $ret->addClass('well-sm');
    }

    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:well>
          Look, I am in a well!
        </bootstrap:well>
        <bootstrap:well size="large">
          Look, I am in a large well!
        </bootstrap:well>
        <bootstrap:well size="small">
          Look, I am in a small well!
        </bootstrap:well>
      </x:frag>;
  }
}