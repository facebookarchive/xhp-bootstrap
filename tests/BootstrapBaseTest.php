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

class BootstrapBaseTest extends PHPUnit_Framework_TestCase {
  // See https://github.com/facebook/xhp-lib/pull/137
  public function testAttributesTransferedRecursively(): void {
    $x =
      <bootstrap:container><bootstrap:container>
        <span class="herp">derp</span>
      </bootstrap:container></bootstrap:container>;
    $this->assertSame(
      '<div class="container"><div class="container"><span class="herp">derp</span></div></div>',
      $x->toString(),
    );
  }
}
