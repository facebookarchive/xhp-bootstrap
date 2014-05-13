<?hh

class :bootstrap:button extends :bootstrap:base {
  attribute
    enum {
      'default',
      'primary',
      'success',
      'info',
      'warning',
      'danger',
      'link'
    } use = 'default',
    enum {
      'large',
      'default',
      'small',
      'x-small'
    } size = 'default',
    bool block = false,
    bool active = false,
    bool disabled = false,
    Stringish href,
    :bootstrap:base;

  category %bootstrap:grid:cellcontent;

  protected function render(): :xhp {
    $ret =
      <a href={$this->getAttribute('href')}>
        {$this->getChildren()}
      </a>;
    $this->transferAttributes(
      $ret,
      Vector { 'class', 'href' }
    );
    $this->transferSpecialAttributes($ret);

    $ret->addClass('btn');
    $ret->addClass('btn-'.$this->getAttribute('use'));

    switch ($this->getAttribute('size')) {
      case 'large':
        $ret->addClass('btn-lg');
        break;
      case 'small':
        $ret->addClass('btn-sm');
        break;
      case 'x-small':
        $ret->addClass('btn-xs');
        break;
    }
    if ($this->getAttribute('block')) {
      $ret->addClass('btn-block');
    }
    if ($this->getAttribute('active')) {
      $ret->addClass('active');
    }
    if ($this->getAttribute('disabled')) {
      $ret->addClass('disabled');
    }
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:button use="default">
          Default
        </bootstrap:button>
        <bootstrap:button use="primary">
          Primary
        </bootstrap:button>
        <bootstrap:button use="success">
          Success
        </bootstrap:button>
        <bootstrap:button use="info">
          Info
        </bootstrap:button>
        <bootstrap:button use="warning">
          Warning
        </bootstrap:button>
        <bootstrap:button use="danger">
          Danger
        </bootstrap:button>
        <bootstrap:button use="link">
          Link
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Sizes')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:button size="large">
          Large
        </bootstrap:button>
        <bootstrap:button size="default">
          Default
        </bootstrap:button>
        <bootstrap:button size="small">
          Small
        </bootstrap:button>
        <bootstrap:button size="x-small">
          X-Small
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Active State')>>
  public static function __example3() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button active="true">
          Active
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Disabled State')>>
  public static function __example4() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button disabled="true">
          Disabled
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Block')>>
  public static function __example5() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button block="true">
          Block
        </bootstrap:button>
      </x:frag>;
  }
}
