<?hh

/**
 * Wraps the content of a cell in a grid and provides cell size and cell offset.
 */
final class :bootstrap:grid:cell extends :bootstrap:base {
  attribute
    BootstrapColumn cellsize = null,
    BootstrapColumn celloffset = null;

  children (%bootstrap:grid:cellcontent|:xhp:html-element);

  protected function render(): :xhp {
    $sizes = $this->getAttribute('cellsize');
    $column_style = '';
    if ($sizes) {
      $column_style = $sizes->serializeSizes();
    }

    $offsets = $this->getAttribute('celloffset');
    if ($offsets) {
      $column_style = $column_style.' '.$offsets->serializeOffset();
    }

    // we are supposed to have one and only one child
    $child = $this->getFirstChild();
    $child->addClass($column_style);
    return $child;
  }

  <<ExampleTitle('Grid layout support')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:grid:row>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->largeDevice(12)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Very large button
            </bootstrap:button>
          </bootstrap:grid:cell>
        </bootstrap:grid:row>

        <bootstrap:grid:row>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->mediumDevice(8)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Large button
            </bootstrap:button>
          </bootstrap:grid:cell>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->mediumDevice(4)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Small button
            </bootstrap:button>
          </bootstrap:grid:cell>
        </bootstrap:grid:row>

        <bootstrap:grid:row>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->largeDevice(2)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Small button
            </bootstrap:button>
          </bootstrap:grid:cell>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->largeDevice(2)}
            celloffset={(new BootstrapColumn())->largeDevice(8)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Offset button
            </bootstrap:button>
          </bootstrap:grid:cell>
        </bootstrap:grid:row>
      </x:frag>;
  }
}
