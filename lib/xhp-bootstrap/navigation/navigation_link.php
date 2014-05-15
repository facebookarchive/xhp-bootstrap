<?hh

<<ExamplesInClass(':bootstrap:navbar')>>
class :bootstrap:navigation:link extends :bootstrap:base {

  attribute
    :li,
    Stringish href @required,
    bool active = false;

  children (pcdata);

  category %bootstrap:navigation:item;

  protected function compose(): :xhp {
    return
      <li class={$this->getAttribute('active') ? 'active' : null}>
        <a href={$this->getAttribute('href')}>
          {$this->getChildren()}
        </a>
      </li>;
  }
}
