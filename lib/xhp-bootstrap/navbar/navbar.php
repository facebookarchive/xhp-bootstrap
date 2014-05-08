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
      <nav class={$class} role="navigation">
        <bootstrap:container>
          {$header}
          {$links}
        </bootstrap:container>
      </nav>;
  }

  public static function __example1() {
    return
      <bootstrap:navbar>
        <bootstrap:navbar:brand href="#">Brand</bootstrap:navbar:brand>
        <bootstrap:navbar:link href="#">
          Link
        </bootstrap:navbar:link>
        <bootstrap:navbar:link href="#" active="true">
          Active Link
        </bootstrap:navbar:link>
        <bootstrap:navbar:link href="#">
          Another Link
        </bootstrap:navbar:link>
      </bootstrap:navbar>;
  }
}
