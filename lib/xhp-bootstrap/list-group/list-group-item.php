<?hh

final class :bootstrap:list-group-item extends :bootstrap:base {
  attribute
    enum {
      'success',
      'info',
      'warning',
      'danger',
      'none'
    } context,
    bool active = false,
    :bootstrap:base,
    :a;

  protected function render(): :xhp {
    $ret = <a>{$this->getChildren()}</a>;
    $href = $this->getAttribute('href');
    if ($href) {
      $ret->setAttribute('href', $href);
    }
    if ($this->getAttribute('active')) {
      $ret->addClass('active');
    }
    $ret->addClass('list-group-item');
    switch ($this->getAttribute('context')) {
      case 'success':
        $ret->addClass('list-group-item-success');
        break;
      case 'info':
        $ret->addClass('list-group-item-info');
        break;
      case 'warning':
        $ret->addClass('list-group-item-warning');
        break;
      case 'danger':
        $ret->addClass('list-group-item-danger');
        break;
    }
    return $ret;
  }

}


