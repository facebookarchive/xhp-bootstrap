<?hh

class :bootstrap:navbar extends :x:element {
  attribute
    enum { 'default', 'inverse' } style = 'default',
    enum {
      'default',
      'fixed-top',
      'static-top',
      'fixed-bottom'
    } position = 'default';

  children (
    :bootstrap:navbar:brand?,
    :bootstrap:navbar:link*
  );

  protected function render(): :xhp {
    $style = $this->getAttribute('style');
    $position = $this->getAttribute('position');

    $class = 'navbar navbar-'.$style;
    if ($position !== 'default') {
      $class .= ' navbar-'.$position;
    }

    $header = $this->getChildren('bootstrap:navbar:brand');
    if ($header) {
      $header =
        <div class="navbar-header">
          {$header}
        </div>;
    }

    $links = $this->getChildren('bootstrap:navbar:link');
    if ($links) {
      $links =
        <ul class="nav navbar-nav">
          {$links}
        </ul>;
    }

    return
      <div class={$class} role="navigation">
        <bootstrap:container>
          {$header}
          {$links}
        </bootstrap:container>
      </div>;
  }
}
