<?hh

/**
 * Container for a series of grid cells on the same row.
 */
final class :bootstrap:grid:row extends :bootstrap:base {

  children (:bootstrap:grid:cell*);

  protected function render(): :xhp {
    return <div class="row">{$this->getChildren()}</div>;
  }

  <<ExampleTitle('Nested rows')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:grid:row>
          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->largeDevice(7)}>
            <bootstrap:container>
              <bootstrap:grid:row>
                <bootstrap:grid:cell
                  cellsize={(new BootstrapColumn())->largeDevice(12)}>
                  <bootstrap:alert use="info">
                    Info
                  </bootstrap:alert>
                </bootstrap:grid:cell>
              </bootstrap:grid:row>
              <bootstrap:grid:row>
                <bootstrap:grid:cell
                  cellsize={(new BootstrapColumn())->largeDevice(4)}>
                  <bootstrap:button
                    use="primary"
                    href="http://example.com">
                    Nested small button
                  </bootstrap:button>
                </bootstrap:grid:cell>
                <bootstrap:grid:cell
                  cellsize={(new BootstrapColumn())->largeDevice(8)}>
                  <bootstrap:button
                    use="primary"
                    href="http://example.com">
                    Nested large button
                  </bootstrap:button>
                </bootstrap:grid:cell>
              </bootstrap:grid:row>
            </bootstrap:container>
          </bootstrap:grid:cell>

          <bootstrap:grid:cell
            cellsize={(new BootstrapColumn())->largeDevice(5)}>
            <bootstrap:button
              use="primary"
              href="http://example.com">
              Large button
            </bootstrap:button>
          </bootstrap:grid:cell>
        </bootstrap:grid:row>
      </x:frag>;
  }
}
