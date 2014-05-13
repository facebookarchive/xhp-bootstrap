<?hh

final class :bootstrap:dropdown extends :bootstrap:base {
  children (
    :bootstrap:button,
    :bootstrap:dropdown:menu
  );

  protected function render(): :xhp {
    list($trigger, $menu) = $this->getChildren();
    $trigger->addClass('dropdown-toggle');
    $trigger->setAttribute('data-toggle', 'dropdown');
    return
      <div class="dropdown">
        {$trigger}
        {$menu}
      </div>;
  }

  <<ExampleTitle('Basic dropdown')>>
  public static function __example1() {
    return
      <bootstrap:dropdown>
        <bootstrap:button>
          Dropdown
          <bootstrap:caret />
        </bootstrap:button>
        <bootstrap:dropdown:menu>
          <bootstrap:dropdown:item href="#">
            Foo
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item href="#">
            Bar
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item disabled="true" href="#">
            Disabled
          </bootstrap:dropdown:item>
        </bootstrap:dropdown:menu>
      </bootstrap:dropdown>;
  }

  <<ExampleTitle('Dropdown with sections')>>
  public static function __example2() {
    return
      <bootstrap:dropdown>
        <bootstrap:button>
          Dropdown
          <bootstrap:caret />
        </bootstrap:button>
        <bootstrap:dropdown:menu>
          <bootstrap:dropdown:header>
            Menu Header
          </bootstrap:dropdown:header>
          <bootstrap:dropdown:item href="#">
            Foo
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:divider />
          <bootstrap:dropdown:header>
            Menu Header
          </bootstrap:dropdown:header>
          <bootstrap:dropdown:item href="#">
            Herp
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item href="#">
            Derp
          </bootstrap:dropdown:item>
        </bootstrap:dropdown:menu>
      </bootstrap:dropdown>;
  }
}
