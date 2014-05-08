<?hh

class :bootstrap:page-header extends :x:element {
  attribute
    string title @required,
    string subtext;

  protected function render(): :xhp {
    $subtext = $this->getAttribute('subtext');
    if ($subtext !== null) {
      $subtext =
        <x:frag>
          {' '}
          <small>{$subtext}</small>
        </x:frag>;
    }

    $lead = $this->getChildren();
    if ($lead) {
      $lead = <p class="lead">{$lead}</p>;
    }

    return
      <div class="page-header">
        <h1>{$this->getAttribute('title')} {$subtext}</h1>
        {$lead}
      </div>;
  }

  <<ExampleTitle('Plain header')>>
  public static function __example1() {
    return <bootstrap:page-header title="Title" />;
  }

  <<ExampleTitle('With subtext')>>
  public static function __example2() {
    return
      <bootstrap:page-header
        title="Title"
        subtext="Subtext"
      />;
  }

  <<ExampleTitle('With subtext and lead')>>
  public static function __example3() {
    return
      <bootstrap:page-header
        title="Title"
        subtext="Subtext">
        This is a short lead paragraph giving a short introduction to the topic.
      </bootstrap:page-header>;
  }
}
