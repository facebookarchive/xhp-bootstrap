<?hh

<<ExamplesInClass(':bootstrap:navbar')>>
class :bootstrap:navigation:link extends :bootstrap:base {
  attribute
    bool active = false,
    Stringish href @required,
    :bootstrap:base;

  children (pcdata);

  category %bootstrap:navigation:item;

  protected function render(): :xhp {
    return
      <li class={$this->getAttribute('active') ? 'active' : null}>
        <a href={$this->getAttribute('href')}>
          {$this->getChildren()}
        </a>
      </li>;
  }
}
