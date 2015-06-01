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

final class :bootstrap:progress-group extends :bootstrap:base {

  children (:bootstrap:progress-bar*);

  protected function render(): XHPRoot {
    return
      <div class="progress">
        {$this->getChildren()}
      </div>;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1(): :xhp {
    return
      <bootstrap:progress-group>
        <bootstrap:progress-bar use="success" value={20}>
          Success
        </bootstrap:progress-bar>
        <bootstrap:progress-bar use="info" value={20} stripes="on">
          Info
        </bootstrap:progress-bar>
        <bootstrap:progress-bar use="warning" value={20} stripes="active">
          Warning
        </bootstrap:progress-bar>
        <bootstrap:progress-bar use="danger" value={20}>
          Danger
        </bootstrap:progress-bar>
      </bootstrap:progress-group>;
  }
}
