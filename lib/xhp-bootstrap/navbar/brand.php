<?hh

class :bootstrap:navbar:brand extends :bootstrap:base {
  attribute
    Stringish href @required,
    :a,
    :bootstrap:base;

  protected function render(): :xhp {
    return
      <a href={$this->getAttribute('href')} class="navbar-brand">
        {$this->getChildren()}
      </a>;
  }
}
