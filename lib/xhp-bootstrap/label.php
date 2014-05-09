<?hh

final class :bootstrap:label extends :bootstrap:base {
  attribute
    enum {
        'default',
        'primary',
        'success',
        'info',
        'warning',
        'danger'
    } use = 'default',
    :bootstrap:base;

  protected function render(): :xhp {
    $ret =
      <span class={$this->getAttribute('class')}>
        {$this->getChildren()}
      </span>;
    $ret->addClass('label');
    $ret->addClass('label-'.$this->getAttribute('use'));
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1(): :xhp {
    return
      <x:frag>
        <bootstrap:label>Default</bootstrap:label>
        <bootstrap:label use="primary">Primary</bootstrap:label>
        <bootstrap:label use="success">Success</bootstrap:label>
        <bootstrap:label use="info">Info</bootstrap:label>
        <bootstrap:label use="warning">Warning</bootstrap:label>
        <bootstrap:label use="danger">Danger</bootstrap:label>
      </x:frag>;
  }
}
