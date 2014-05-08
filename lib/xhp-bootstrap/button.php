<?hh

class :bootstrap:button extends :x:element {
  attribute
    enum {
      'default',
      'primary',
      'success',
      'info',
      'warning',
      'danger'
    } use = 'default',
    enum {
      'large',
      'default',
      'small',
      'x-small'
    } size = 'default',
    Stringish href,
    :a;

  protected function render() {
    $class = 'btn btn-'.$this->getAttribute('use');
    $size = $this->getAttribute('size');
    switch ($size) {
      case 'large':
        $class .= ' btn-lg';
        break;
      case 'small':
        $class .= ' btn-sm';
        break;
      case 'x-small':
        $class .= ' btn-xs';
        break;
    }
    return
      <a class={$class} href={$this->getAttribute('href')}>
        {$this->getChildren()}
      </a>;
  }
}
