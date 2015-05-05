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

final class :bootstrap:jumbotron extends :bootstrap:base {

  attribute
    :div,
    string title;

  protected function render(): XHPRoot {
    $title = $this->:title;
    if ($title) {
      $title = <h1>{$title}</h1>;
    }

    return
      <div class="jumbotron">
      {$title}
      {$this->getChildren()}
      </div>;
  }

  <<ExampleTitle('Simple Usage')>>
  public static function __example1(): :xhp {
    return
      <bootstrap:jumbotron title="Hello, world">
        <p>
          Buy my product and your life will be filled with unicorns and
          rainbows.
        </p>
        <bootstrap:button use="primary" href="http://example.com">
          Buy now
        </bootstrap:button>
        {' '}
        <bootstrap:button use="info" href="http://example.com">
          Tell me more
        </bootstrap:button>
      </bootstrap:jumbotron>;
  }
}
