<?hh

require_once('TerribleAutoloader.php');
TerribleAutoloader::Init();

$bootstrap_classes = ExamplesData::GetBootstrapClasses();
$class = $_GET['classname'] ?: $bootstrap_classes[0];
$examples = ExamplesData::GetExamples($class);

print
  <x:doctype>
    <html>
      <head>
        <title>{$class}</title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      </head>
      <body>
        <bootstrap:root>
          <bootstrap:navbar position="static-top" style="inverse">
            <bootstrap:navbar:brand href="#">
              XHP Bootstrap
            </bootstrap:navbar:brand>
          </bootstrap:navbar>
          <bootstrap:container>
            <bootstrap:page-header title={$class} />
            <bootstrap:container class="col-xs-12 col-sm-9">
              {$examples->map($x ==> <bootstrap:example example={$x} />)}
            </bootstrap:container>
            <bootstrap:container class="col-xs-6 col-sm-3">
              <div class="list-group">
                {$bootstrap_classes->map(
                  $class_name ==> {
                    $link =
                      <a
                        class="list-group-item"
                        href={"example.php?classname=".$class_name}>
                        {$class_name}
                      </a>;
                    if ($class_name === $class) {
                      $link->addClass('active');
                    }
                    return $link;
                  },
                )}
              </div>
            </bootstrap:container>
          </bootstrap:container>
        </bootstrap:root>
      </body>
    </html>
  </x:doctype>;
