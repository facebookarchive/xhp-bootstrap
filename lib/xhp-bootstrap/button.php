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
    bool block = false,
    Stringish href;

  protected function render() {
    $ret =
      <a class="btn" href={$this->getAttribute('href')}>
        {$this->getChildren()}
      </a>;

    $use = $this->getAttribute('use');
    if ($use !== 'default') {
      $ret->addClass('btn-'.$use);
    }
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
    return $ret;
  }
}
