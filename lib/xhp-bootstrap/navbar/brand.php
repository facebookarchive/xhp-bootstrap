<?hh

class :bootstrap:navbar:brand extends :x:element {
  attribute
    URI href @required,
    :a;

  protected function render(): :xhp {
    return
      <a href={$this->getAttribute('href')} class="navbar-brand">
        {$this->getChildren()}
      </a>;
  }
}
