<?hh

<<ExamplesInClass(':bootstrap:navbar')>>
final class :bootstrap:navigation:dropdown extends :bootstrap:base {
  children (
    :a,
    :bootstrap:dropdown:menu
  );
  category %bootstrap:navigation:item;

  protected function render(): :xhp {
    list($trigger, $menu) = $this->getChildren();
    $trigger->addClass('dropdown-toggle');
    $trigger->setAttribute('data-toggle', 'dropdown');
    return
      <li class="dropdown">
        {$trigger}
        {$menu}
      </li>;
  }
}
