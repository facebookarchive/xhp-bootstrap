<?hh
/*
 *  Copyright (c) 2014, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

require_once('../vendor/autoload.php');
require_once(__DIR__ . '/lib/init.php');

function prettify_class(string $mangled): string {
  return preg_replace(
    '/^xhp-/',
    '<',
    str_replace(['__', '_'], [':', '-'], $mangled)
  ).' />';
}

function render_page(?string $class = null): void {
  $bootstrap_classes = ExamplesData::GetBootstrapClasses();

  if ($class !== null) {
    $title = prettify_class($class);
    $examples = ExamplesData::GetExamples($class);
    $header = <bootstrap:page-header title={$title} />;
    $content =
      <x:frag>
        <xhp-explorer:category classname={$class} />
        <xhp-explorer:children classname={$class} />
        <xhp-explorer:attributes classname={$class} />
        <h2>Examples</h2>
        {$examples->map($x ==> <xhp-explorer:example example={$x} />)}
      </x:frag>;
  } else {
    $title = 'XHP-Bootstrap';
    $header = null;
    $content =
      <bootstrap:jumbotron title="XHP-Bootstrap">
        <p>
          The <a href="http://getbootstrap.com">Bootstrap</a> project is a
          popular HTML, CSS, and JS framework for providing common components
          for web pages. This project provides XHP classes for these components;
          full reference documentation is available using the list on the right.
        </p>
        <bootstrap:button
          use="primary"
          href="https://github.com/hhvm/xhp-bootstrap/blob/master/README.md">
          Get Started
        </bootstrap:button>
      </bootstrap:jumbotron>;
  }

  print(
    <x:doctype>
      <html>
        <head>
          <title>{$title}</title>
          <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
          />
          <!-- Latest compiled and minified CSS -->
          <link
            rel="stylesheet"
            href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
          />
          <!-- Bootstrap JS requires JQuery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" />
          <!-- Latest compiled and minified JavaScript -->
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" />
          <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" />
          <link rel="stylesheet" href="./styles.css" />
        </head>
        <body>
          <bootstrap:root>
            <bootstrap:navbar position="static-top" theme="inverse">
              <bootstrap:navbar:brand href="#">
                <img
                  src="xhpbootstrap_logo_notext.png"
                  alt="XHP-Bootstrap"
                  style="height: 100%;"
                />
                XHP-Bootstrap
              </bootstrap:navbar:brand>
            </bootstrap:navbar>
            <bootstrap:container>
              {$header}
              <bootstrap:container class="col-xs-12 col-sm-9">
                {$content}
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
    </x:doctype>
  );
}


if (array_key_exists('classname', $_GET)) {
  render_page($_GET['classname']);
} else {
  render_page();
}
