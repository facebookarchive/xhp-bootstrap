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

class :bootstrap:root extends :bootstrap:base {

  attribute :div;

  children (
    :bootstrap:navbar?,
    :bootstrap:container*,
    :bootstrap:footer?
  );

  protected function render() {
    return <div id="wrap">{$this->getChildren()}</div>;
  }

  <<ExampleTitle("Root")>>
  public static function __example1() {
    return
      <bootstrap:root>
        <bootstrap:container>
          Root nodes may contain any number of
          containers, one optional navbar, and
          one optional footer.
        </bootstrap:container>
      </bootstrap:root>;
  }
}
