<?hh

final class :bootstrap:button-group extends :x:element {

  attribute
    enum {
      'horizontal',
      'vertical'
    } orientation = 'horizontal',
    enum {
      'large',
      'default',
      'small',
      'x-small'
    } size = 'default',
    bool justified = false;

  children ((:bootstrap:button|:bootstrap:button-group)+);

  protected function render(): :xhp {
    $class = $this->getAttribute('orientation') === 'horizontal'
      ? 'btn-group' : 'btn-group-vertical';
    switch ($this->getAttribute('size')) {
      case 'large':
        $class .= ' btn-group-lg';
        break;
      case 'small':
        $class .= ' btn-group-sm';
        break;
      case 'x-small':
        $class .= ' btn-group-xs';
        break;
    }
    if ($this->getAttribute('justified')) {
      $class .= ' btn-group-justified';
    }

    return
      <div class={$class}>
        {$this->getChildren()}
      </div>;
  }

  <<ExampleTitle('Basic usage')>>
  public static function __example1() {
    return
      <bootstrap:button-group>
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }

  <<ExampleTitle('Sizes')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:button-group size="large">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="default">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="small">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="x-small">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
      </x:frag>;
  }

  <<ExampleTitle('Vertical orientation')>>
  public static function __example3() {
    return
      <bootstrap:button-group orientation="vertical">
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }

  <<ExampleTitle('Justified')>>
  public static function __example4() {
    return
      <bootstrap:button-group justified="true">
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }
}
