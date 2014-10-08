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

final class :xhp-explorer:category extends :x:element {
  attribute
    string classname @required,
    string title = 'Category';

  protected function render() {
    $rows = Vector { };
    $class = $this->getAttribute('classname');
    $cats = $class::__xhpCategoryDeclaration();
    $skip = new Set(array_keys(
      :xhp:html-element::__xhpCategoryDeclaration()
    ));
    foreach ($cats as $name => $dummy) {
      if ($skip->contains($name)) {
        continue;
      }
      $rows[] =
        <tr>
          <td><code>{$name}</code></td>
        </tr>;
    }
    if (!$rows->count()) {
      return <x:frag />;
    }
    $title = $this->getAttribute('title');
    if ($title) {
      $title = <h2>{$title}</h2>;
    }
    return
      <x:frag>
        {$title}
        <bootstrap:table>
          <tbody>
            {$rows}
          </tbody>
        </bootstrap:table>
      </x:frag>;
  }
}
