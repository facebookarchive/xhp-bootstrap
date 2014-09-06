<?hh

final class :xhp-explorer:children extends :x:element {
  attribute
    string classname @required,
    string title = 'Children';

  protected function parseRule($type, $decl) {
    $name = str_replace(['__','_'], [':', '-'], $decl);
    switch ($type) {
      case 0: return <x:frag>empty</x:frag>;
      case 1: return <x:frag>any</x:frag>;
      case 2: return <x:frag>pcdata</x:frag>;
      case 3:
        if (!strncmp('xhp_bootstrap__', $decl, 15)) {
          $name = substr($name, 4);
          return <a href={"?classname={$decl}"}>{$name}</a>;
        } else {
          return <x:frag>{$name}</x:frag>;
        }
      case 4: return <x:frag>{$name}</x:frag>;
      case 5: return $this->parseChildren($decl);
    }
  }

  protected function parseChildren($c) {
    if (is_int($c)) {
      return $this->parseRule($c, 'unknown'); // Should be 1 or 2
    }

    static $symbols = [
      0 => '',    // Exactly once
      1 => '*',   // Zero or more
      2 => '?',   // Zero or once
      3 => '+',   // One or more
      4 => ', ',  // Specific order
      5 => ' | ', // Selection
    ];
    switch ($c[0]) {
      case 0: case 1: case 2: case 3:
        return
          <x:frag>
            {self::parseRule($c[1], $c[2])}{$symbols[$c[0]]}
          </x:frag>;
      case 4: case 5:
        return
          <x:frag>
            {$this->parseChildren($c[1])}
            {$symbols[$c[0]]}
            {$this->parseChildren($c[2])}
          </x:frag>;
    }
  }

  protected function render() {
    $rows = Vector { };
    $title = $this->getAttribute('title');
    $class = $this->getAttribute('classname');
    $children = $this->parseChildren($class::__xhpChildrenDeclaration());
    return
      <x:frag>
        <h2>{$title}</h2>
        {$children}
      </x:frag>;
  }
}
