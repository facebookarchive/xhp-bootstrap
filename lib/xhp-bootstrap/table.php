<?hh

final class :bootstrap:table extends :bootstrap:base {
  attribute
    bool striped = false,
    bool border = false,
    bool hover-rows = false,
    bool condensed = false,
    bool responsive = false,
    :table,
    :bootstrap:base;

  protected function render(): :xhp {
    $table = <table>{$this->getChildren()}</table>;
    $this->transferAttributesExcept(
      $table,
      Set { 'striped', 'border', 'hover-rows', 'condensed', 'responsive' }
    );
    $table->addClass('table');
    if ($this->getAttribute('striped')) {
      $table->addClass('table-striped');
    }
    if ($this->getAttribute('border')) {
      $table->addClass('table-bordered');
    }
    if ($this->getAttribute('hover-rows')) {
      $table->addClass('table-hover');
    }
    if ($this->getAttribute('condensed')) {
      $table->addClass('table-condensed');
    }

    if ($this->getAttribute('responsive')) {
      return <div class="table-responsive">{$table}</div>;
    }
    return $table;
  }

  <<ExampleTitle('Basic Table')>>
  public static function __example1() {
    return
      <bootstrap:table>
        <thead>
          <tr>
            <th>#</th>
            <th>Foo</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>Herp</td></tr>
          <tr><td>2</td><td>Derp</td></tr>
          <tr><td>3</td><td>Bar</td></tr>
          <tr><td>4</td><td>Baz</td></tr>
        </tbody>
      </bootstrap:table>;
  }

  <<ExampleTitle('With Border')>>
  public static function __example2() {
    return
      <bootstrap:table border="true">
        <thead>
          <tr>
            <th>#</th>
            <th>Foo</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>Herp</td></tr>
          <tr><td>2</td><td>Derp</td></tr>
          <tr><td>3</td><td>Bar</td></tr>
          <tr><td>4</td><td>Baz</td></tr>
        </tbody>
      </bootstrap:table>;
  }

  <<ExampleTitle('Striped')>>
  public static function __example3() {
    return
      <bootstrap:table striped="true">
        <thead>
          <tr>
            <th>#</th>
            <th>Foo</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>Herp</td></tr>
          <tr><td>2</td><td>Derp</td></tr>
          <tr><td>3</td><td>Bar</td></tr>
          <tr><td>4</td><td>Baz</td></tr>
        </tbody>
      </bootstrap:table>;
  }

  <<ExampleTitle('Condensed')>>
  public static function __example4() {
    return
      <bootstrap:table condensed="true">
        <thead>
          <tr>
            <th>#</th>
            <th>Foo</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>Herp</td></tr>
          <tr><td>2</td><td>Derp</td></tr>
          <tr><td>3</td><td>Bar</td></tr>
          <tr><td>4</td><td>Baz</td></tr>
        </tbody>
      </bootstrap:table>;
  }

  <<ExampleTitle('Row hover effect')>>
  public static function __example5() {
    return
      <bootstrap:table hover-rows="true">
        <thead>
          <tr>
            <th>#</th>
            <th>Foo</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>1</td><td>Herp</td></tr>
          <tr><td>2</td><td>Derp</td></tr>
          <tr><td>3</td><td>Bar</td></tr>
          <tr><td>4</td><td>Baz</td></tr>
        </tbody>
      </bootstrap:table>;
  }
}
