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

final class :bootstrap:badge extends :bootstrap:base {

  attribute :span;

  protected function render(): XHPRoot {
    $ret = <span>{$this->getChildren()}</span>;
    $class = (string) $this->:class;
    if ($class) {
      $ret->addClass($class);
    }
    $ret->addClass('badge');
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <bootstrap:button>
        <bootstrap:glyphicon icon="envelope" />
        Unread Mail
        <bootstrap:badge>123</bootstrap:badge>
      </bootstrap:button>;
  }
}
