<?hh

class :bootstrap:navbar:link extends :x:element {
  attribute
    bool active = false,
    Stringish href @required;

  children (pcdata);

  protected function render(): :xhp {
    return
      <li class={$this->getAttribute('active') ? 'active' : null}>
        <a href={$this->getAttribute('href')}>
          {$this->getChildren()}
        </a>
      </li>;
  }
}
