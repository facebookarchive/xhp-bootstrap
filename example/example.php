<?hh

require_once('TerribleAutoloader.php');
TerribleAutoloader::Init();

$class = $_GET['classname'];
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
        <!-- Latest compiled and minified JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
      </head>
      <body>
        <bootstrap:root>
          <bootstrap:container>
            <bootstrap:page-header title={$class} />
            {$examples->map($x ==> <bootstrap:example example={$x} />)}
          </bootstrap:container>
        </bootstrap:root>
      </body>
    </html>
  </x:doctype>;
