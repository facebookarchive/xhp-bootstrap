<?hh

final class :bootstrap:label extends :bootstrap:base {
  
  attribute
    :span,
    enum {
        'default',
        'primary',
        'success',
        'info',
        'warning',
        'danger'
    } use = 'default';

  protected function compose(): :xhp {
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
