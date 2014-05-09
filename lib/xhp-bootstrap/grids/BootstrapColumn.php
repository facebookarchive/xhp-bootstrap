<?hh

type BootstrapColumnSize = int;

/**
 * Describes a horizontal space size in number of columns (out of 12).
 *
 * Should be used to provide grid elements sizes or offsets in columns
 * for one or more screen size categories.
 *
 * Example:
 *   (new BootstrapColumn())
 *     ->largeDevice(12)
 *     ->smallDevice(4)
 *
 * http://getbootstrap.com/css/#grid for details.
 */
final class BootstrapColumn {

  const string PREFIX = 'col-';
  const int FULL_SIZE = 12;

  private ?BootstrapColumnSize $large;
  private ?BootstrapColumnSize $medium;
  private ?BootstrapColumnSize $small;
  private ?BootstrapColumnSize $xSmall;

  public function __construct() {}

  public function largeDevice(BootstrapColumnSize $columns): this {
    return $this->setSize($this->large, $columns);
  }

  public function mediumDevice(BootstrapColumnSize $columns): this {
    return $this->setSize($this->medium, $columns);
  }

  public function smallDevice(BootstrapColumnSize $columns): this {
    return $this->setSize($this->small, $columns);
  }

  public function xSmallDevice(BootstrapColumnSize $columns): this {
    return $this->setSize($this->xSmall, $columns);
  }

  public function serializeSizes(): string {
    return $this->serialize();
  }

  public function serializeOffset(): string {
    return $this->serialize('offset');
  }

  private function setSize(
    ?BootstrapColumnSize &$attribute,
    BootstrapColumnSize $value
  ): this {
    invariant(
      $value > 0 && $value <= self::FULL_SIZE,
      'Columns number must be greater than 0'
    );
    $attribute = $value;
    return $this;
  }

  private function serialize(string $suffix=''): string {
    $suffix = $suffix ? $suffix.'-' : '';

    $ret = $this->appendColumn('', 'lg', $suffix, $this->large);
    $ret = $this->appendColumn($ret, 'md', $suffix, $this->medium);
    $ret = $this->appendColumn($ret, 'sm', $suffix, $this->small);
    $ret = $this->appendColumn($ret, 'xs', $suffix, $this->xSmall);

    return $ret;
  }

  private function appendColumn(
    string $current_string,
    string $name,
    string $suffix,
    ?BootstrapColumnSize $value,
  ): string {
    if (!$value) {
      return $current_string;
    }
    return $current_string.' '.self::PREFIX.$name.'-'.$suffix.$value;
  }
}
