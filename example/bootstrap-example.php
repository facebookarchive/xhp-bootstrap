<?hh

final class :bootstrap:example extends :x:element {
  attribute
    ReflectionMethod example @required;

  protected function render(): :xhp {
    $example = $this->getAttribute('example');

    return
      <bootstrap:container>
        <h1>{$this->getTitle()}</h1>
        <h2>Source</h2>
        {$this->renderSource()}
        <h2>Output</h2>
        {$this->renderOutput()}
      </bootstrap:container>;
  }

  private function renderSource(): :xhp {
    $example = $this->getAttribute('example');

    $file = file_get_contents($example->getFileName());
    $lines = explode("\n", $file);
    $source_lines = array_slice(
      $lines,
      $example->getStartLine() - 1, // First line is 1, not 0
      ($example->getEndLine() - $example->getStartLine()) + 1
    );

    return
      <pre>
        <code>
          {implode("\n", $source_lines)}
        </code>
      </pre>;
  }

  private function renderOutput(): :xhp {
    $example = $this->getAttribute('example');
    return
      <bootstrap:container>
        {$example->invoke(null)}
      </bootstrap:container>;
  }

  private function getTitle(): XhpChild {
    $example = $this->getAttribute('example');
    $title = $example->getAttribute('ExampleTitle');
    return $title === null ? $example->getName() : $title;
  }
}
