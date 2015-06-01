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

class :bootstrap:container extends :bootstrap:base implements HasXHPHelpers {

  attribute :div;

  protected function render(): XHPRoot {
    $this->addClass("container");
    return
      <div>
        {$this->getChildren()}
      </div>;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <bootstrap:container>
        Content
      </bootstrap:container>;
  }

}
