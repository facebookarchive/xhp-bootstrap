<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:divider extends :bootstrap:base {

  category %bootstrap:dropdown:element;

  protected function render(): :xhp {
    return
      <li role="presentation" class="divider" />;
  }
}
