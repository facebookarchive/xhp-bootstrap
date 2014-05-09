<?hh

final class :bootstrap:alert extends :bootstrap:base {
  attribute
    enum {
      'success',
      'info',
      'warning',
      'danger'
    } use = 'warning',
    :bootstrap:base;

  protected function render(): :xhp {
    foreach($this->getChildren('a') as $child) {
      $child->addClass('alert-link');
    }
    $ret =
      <div class={$this->getAttribute('class')}>
        {$this->getChildren()}
      </div>;

    $ret->addClass('alert');
    $ret->addClass('alert-'.$this->getAttribute('use'));

    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:alert use="success">
          You rock
        </bootstrap:alert>
        <bootstrap:alert use="info">
          Maybe you rock
        </bootstrap:alert>
        <bootstrap:alert use="warning">
          WAT??
        </bootstrap:alert>
        <bootstrap:alert use="danger">
          May day May day
          <a href="https://somewhere.com">Go here</a>
        </bootstrap:alert>
      </x:frag>;
  }
}
