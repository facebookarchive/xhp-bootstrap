<?hh

class :bootstrap:alert extends :bootstrap:base {
  attribute
    enum {
      'success',
      'info',
      'warning',
      'danger'
    } severity = 'warning',
    :bootstrap:base;
    
  protected function render(): :xhp {
    foreach($this->getChildren('a') as $child) {
      $child->addClass('alert-link');
    }
    $ret =
      <div class="alert">
        {$this->getChildren()}
      </div>;

    $ret->addClass('alert-'.$this->getAttribute('severity'));

    return $ret;    
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:alert severity="success">
          You rock
        </bootstrap:alert>
        <bootstrap:alert severity="info">
          Maybe you rock
        </bootstrap:alert>
        <bootstrap:alert severity="warning">
          WAT??
        </bootstrap:alert>
        <bootstrap:alert severity="danger">
          May day May day
          <a href="https://somewhere.com">Go here</a>
        </bootstrap:alert>
      </x:frag>;
  }
}
