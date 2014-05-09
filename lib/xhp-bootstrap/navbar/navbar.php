<?hh

class :bootstrap:navbar extends :bootstrap:base {
  attribute
    enum { 'default', 'inverse' } style = 'default',
    enum {
      'default',
      'fixed-top',
      'static-top',
      'fixed-bottom'
    } position = 'default',
    :bootstrap:base;

  children (
    :bootstrap:navbar:brand?,
    :bootstrap:navbar:link*
  );

  protected function render(): :xhp {
    $style = $this->getAttribute('style');
    $position = $this->getAttribute('position');

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

    $ret =
      <nav class="navbar" role="navigation">
        <bootstrap:container>
          {$header}
          {$links}
        </bootstrap:container>
      </nav>;

    $ret->addClass('navbar-'.$style);
    if ($position !== 'default') {
      $ret->addClass('navbar-'.$position);
    }
    return $ret;
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
