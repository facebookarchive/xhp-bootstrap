<?hh

require_once('TerribleAutoloader.php');
TerribleAutoloader::Init();

print
  <x:doctype>
    <html>
      <head>
        <title>Hello, world</title>
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
          <bootstrap:navbar position="static-top" style="inverse">
            <bootstrap:navbar:brand href="/">
              XHP Bootstrap
            </bootstrap:navbar:brand>
            <bootstrap:navbar:link
              href="/"
              active="true">
              Home
            </bootstrap:navbar:link>
            <bootstrap:navbar:link
              href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
              Foo
            </bootstrap:navbar:link>
          </bootstrap:navbar>
          <bootstrap:container>
            <bootstrap:jumbotron title="Hello, world">
              <p>Herp derp</p>
              <bootstrap:button use="primary" href="http://example.com" block={true}>
                Foo
              </bootstrap:button>
              {' '}
              <bootstrap:button use="info" href="http://example.com">
                Bar
              </bootstrap:button>
            </bootstrap:jumbotron>
            <bootstrap:panel use="danger">
              <bootstrap:panel:heading>
                Help help
              </bootstrap:panel:heading>
              <bootstrap:panel:body>
                Something is wrong
              </bootstrap:panel:body>
            </bootstrap:panel>
          </bootstrap:container>
        </bootstrap:root>
      </body>
    </html>
  </x:doctype>;
