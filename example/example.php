<?hh

require_once('lib/TerribleAutoloader.php');
TerribleAutoloader::Init();

$bootstrap_classes = ExamplesData::GetClassesWithExamples();
$class = array_key_exists('classname', $_GET)
  ? $_GET['classname'] : $bootstrap_classes->keys()->at(0);
$examples = Vector { };
if ($bootstrap_classes->containsKey($class)) {
  $examples = $bootstrap_classes[$class];
}
$bootstrap_classes = $bootstrap_classes->keys();
sort($bootstrap_classes);

function prettify_class(string $mangled): string {
  return preg_replace(
    '/^xhp-/',
    '<',
    str_replace(['__', '_'], [':', '-'], $mangled)
  ).' />';
}

print
  <x:doctype>
    <html>
      <head>
        <title>{prettify_class($class)}</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0"
        />
        <!-- Latest compiled and minified CSS -->
        <link
          rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"
        />
        <!-- Optional theme -->
        <link
          rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"
        />
        <!-- Bootstrap JS requires JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" />
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" />
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" />
        <link rel="stylesheet" href="./styles.css" />
      </head>
      <body>
        <bootstrap:root>
          <bootstrap:navbar position="static-top" style="inverse">
            <bootstrap:navbar:brand href="#">
              XHP Bootstrap
            </bootstrap:navbar:brand>
          </bootstrap:navbar>
          <bootstrap:container>
            <bootstrap:page-header title={prettify_class($class)} />
            <bootstrap:container class="col-xs-12 col-sm-9">
              {$examples->map($x ==> <bootstrap:example example={$x} />)}
            </bootstrap:container>
            <bootstrap:container class="col-xs-6 col-sm-3">
              <bootstrap:list-group>
                {$bootstrap_classes->map(
                  $class_name ==>
                    <bootstrap:list-group-item
                      href={"example.php?classname=".$class_name}
                      active={$class_name === $class}>
                      {prettify_class($class_name)}
                    </bootstrap:list-group-item>
                )}
              </bootstrap:list-group>
            </bootstrap:container>
          </bootstrap:container>
        </bootstrap:root>
      </body>
    </html>
  </x:doctype>;
