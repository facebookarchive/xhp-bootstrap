<?hh

final class :bootstrap:progress-bar extends :bootstrap:base {

  attribute
    :div,
    enum {
        'success',
        'info',
        'warning',
        'danger'
    } use = 'default',
    enum {
        'off',     // Solid
        'on',      // Striped
        'active'   // Striped and moving
    } stripes = 'off',
    bool active = false,
    integer value @required,
    integer min = 0,
    integer max = 100;

  protected function compose(): :xhp {
    $val = $this->getAttribute('value');
    $min = $this->getAttribute('min');
    $max = $this->getAttribute('max');
    if (($min >= $max) || ($val >= $max)) {
      $width = 100;
    } else if ($val < $mix) {
      $width = 0;
    } else {
      $width = 100 * ($val - $min) / ($max - $min);
    }
    $style = "width: {$width}%";
    $ret =
      <div class={$this->getAttribute('class')} style={$style}
           role="progressbar"
           aria-valuenow={$val}
           aria-valuemin={$min}
           aria-valuemax={$max}>
        {$this->getChildren()}
      </div>;
    $ret->addClass('progress-bar');
    $ret->addClass('progress-bar-'.$this->getAttribute('use'));
    switch ($this->getAttribute('stripes')) {
      case 'active':
        $ret->addClass('active');
        // fallthrough
      case 'on':
        $ret->addClass('progress-bar-striped');
    }
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1(): :xhp {
    return
      <x:frag>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="success" value="100">
            Success
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="info" value="80" stripes="on">
            Info
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="warning" value="40" stripes="active">
            Warning
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
        <bootstrap:progress-group>
          <bootstrap:progress-bar use="danger" value="20">
            Danger
          </bootstrap:progress-bar>
        </bootstrap:progress-group>
      </x:frag>;
  }
}
