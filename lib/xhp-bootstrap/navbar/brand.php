<?hh

class :bootstrap:navbar:brand extends :x:element {
  attribute
    Stringish href @required,
    :a;

  protected function render(): :xhp {
    return
      <a href={$this->getAttribute('href')} class="navbar-brand">
        {$this->getChildren()}
      </a>;
  }
}
