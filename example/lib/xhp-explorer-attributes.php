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

final class :xhp-explorer:attributes extends :x:element {
  attribute
    string classname @required,
    string title = 'Attributes';

  protected function render() {
    $rows = Vector { };
    $class = (string) $this->:classname;
    $attrs = $class::__xhpAttributeDeclaration();
    $skip = new Set(array_keys(
      :xhp:html-element::__xhpAttributeDeclaration()
    ));
    foreach ($attrs as $name => $spec) {
      if ($skip->contains($name)) {
        continue;
      }

      list($type, $extra_type, $default, $required) = $spec;

      switch ($type) {
        case self::TYPE_STRING:
          $type = <code>string</code>;
          break;
        case self::TYPE_BOOL:
          $type = <code>bool</code>;
          break;
        case self::TYPE_NUMBER:
          // yep, not a float, definitely an int
          $type = <code>int</code>;
          break;
        case self::TYPE_ARRAY:
          $type = <code>array</code>;
          break;
        case self::TYPE_OBJECT:
          $type = <code>{$extra_type}</code>;
          break;
        case self::TYPE_VAR:
          $type = <em>any</em>;
          break;
        case self::TYPE_FLOAT:
          $type = <code>float</code>;
          break;
        case self::TYPE_CALLABLE:
          $type = <code>callable</code>;
          break;
        case self::TYPE_ENUM:
          $values = array_map(
            $x ==> var_export($x, true),
            $extra_type
          );
          $type =
            <code style="white-space: pre">
              {"enum {\n  " . implode(",\n  ", $values)."\n}"}
            </code>;
        break;
      }

      if ($default === null) {
        if (empty($required)) {
          $default = <em>none</em>;
        } else {
          $default =
            <bootstrap:label use="warning">required</bootstrap:label>;
        }
      } else {
        $default = <code>{var_export($default, true)}</code>;
      }

      $rows[] =
        <tr>
          <td><code>{$name}</code></td>
          <td>{$type}</td>
          <td>{$default}</td>
        </tr>;
    }
    if (!$rows->count()) {
      return <x:frag />;
    }
    $title = $this->:title;
    if ($title) {
      $title = <h2>{$title}</h2>;
    }
    return
      <x:frag>
        {$title}
        <bootstrap:table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Type</th>
              <th>Default</th>
            </tr>
          </thead>
          <tbody>
            {$rows}
          </tbody>
        </bootstrap:table>
      </x:frag>;
  }
}
