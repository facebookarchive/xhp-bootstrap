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

class :bootstrap:page-header extends :bootstrap:base {

  attribute
    :div,
    string title @required,
    string subtext;

  protected function render(): XHPRoot {
    $subtext = $this->:subtext;
    if ($subtext !== null) {
      $subtext =
        <x:frag>
          {' '}
          <small>{$subtext}</small>
        </x:frag>;
    }

    $lead = $this->getChildren();
    if ($lead) {
      $lead = <p class="lead">{$lead}</p>;
    }

    return
      <div class="page-header">
        <h1>{$this->:title} {$subtext}</h1>
        {$lead}
      </div>;
  }

  <<ExampleTitle('Plain header')>>
  public static function __example1() {
    return <bootstrap:page-header title="Title" />;
  }

  <<ExampleTitle('With subtext')>>
  public static function __example2() {
    return
      <bootstrap:page-header
        title="Title"
        subtext="Subtext"
      />;
  }

  <<ExampleTitle('With subtext and lead')>>
  public static function __example3() {
    return
      <bootstrap:page-header
        title="Title"
        subtext="Subtext">
        This is a short lead paragraph giving a short introduction to the topic.
      </bootstrap:page-header>;
  }
}
