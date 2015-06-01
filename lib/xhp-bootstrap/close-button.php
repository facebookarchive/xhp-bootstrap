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

final class :bootstrap:close-button extends :bootstrap:base {

  attribute :button;

  protected function render(): XHPRoot {
    return
      <button type="button" class="close" aria-hidden={true}>&times;</button>;
  }

  public static function __example1(): :xhp {
    return
      <bootstrap:close-button />;
  }
}
