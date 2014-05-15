<?hh

<<ExamplesInClass(':bootstrap:navbar')>>
class :bootstrap:navbar:brand extends :bootstrap:base {

  attribute
    :a,
    Stringish href @required;

  protected function compose(): :xhp {
    return
      <a href={$this->getAttribute('href')} class="navbar-brand">
        {$this->getChildren()}
      </a>;
  }
}
