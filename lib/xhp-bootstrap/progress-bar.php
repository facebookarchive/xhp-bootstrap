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

final class :bootstrap:progress-bar extends :bootstrap:base {

  attribute
    :div,
    enum {
        'success',
        'info',
        'warning',
        'danger'
    } use = 'default',
    enum {
        'off',     // Solid
        'on',      // Striped
        'active'   // Striped and moving
    } stripes = 'off',
    bool active = false,
    int value @required,
    int min = 0,
    int max = 100;

  protected function render(): XHPRoot {
    $val = $this->:value;
    $min = $this->:min;
    $max = $this->:max;
    if (($min >= $max) || ($val >= $max)) {
      $width = 100;
    } else if ($val < $min) {
      $width = 0;
    } else {
      $width = 100 * ($val - $min) / ($max - $min);
    }
    $style = "width: {$width}%";
    $ret =
      <div class={$this->:class} style={$style}
           role="progressbar"
           aria-valuenow={$val}
           aria-valuemin={$min}
           aria-valuemax={$max}>
        {$this->getChildren()}
      </div>;
    $ret->addClass('progress-bar');
    $ret->addClass('progress-bar-'.$this->:use);
    switch ($this->:stripes) {
      case 'active':
        $ret->addClass('active');
        // FALLTHROUGH
      case 'on':
        $ret->addClass('progress-bar-striped');
    }
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1(): :xhp {
    return
      <x:frag>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="success" value={100}>
            Success
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="info" value={80} stripes="on">
            Info
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="warning" value={40} stripes="active">
            Warning
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="danger" value={20}>
            Danger
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
      </x:frag>;
  }
}
