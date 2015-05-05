XHP classes for the Bootstrap project
=====================================

Overview
--------

The [Bootstrap](http://getbootstrap.com) project is a popular HTML, CSS, and
JS framework providing common components for web pages. This project provides
XHP classes for these components.

Requirements
------------

- [HHVM](http://hhvm.com/) 3.6 or later
- [Composer](https://getcomposer.org/)

Getting Started
---------------

#### Step 1: Include Bootstrap Prerequisites

Bootstrap's JavaScript components require
[jQuery](http://jquery.com/download/) to be included, so either grab the
[downloadable version](http://jquery.com/download/) and reference it, or
[use a CDN](http://jquery.com/download/#using-jquery-with-a-cdn) and include it
in the head of your XHP document:

````
<head>
  ...
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  ...
</head>
````

#### Step 2: Include Bootstrap Source

Grab the latest
[Bootstrap package](http://getbootstrap.com/getting-started/#download) and
reference it, or use their
[CDN links](http://getbootstrap.com/getting-started/#download) and include
them in the head of your XHP document:

````
<head>
  ...
  <!-- Latest compiled and minified CSS -->
  <link
    rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
  />
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script
    src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"
  />
  ...
</head>
````

#### Step 3: Add XHP-bootstrap dependency

Add the following to your composer.json, then re-run composer:

````
  "minimum-stability": "dev",
  "require": {
    "hhvm/xhp-bootstrap": "dev-master"
  }
````

#### Step 4: Enable Composer Autoloading

If you haven't already, include the following in your PHP to enable
[autoloading from Composer](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

````
  require_once('vendor/autoload.php');
````

Once you've done this you are ready to start using [any of the XHP-Bootstrap
classes](http://bootstrap.hhvm.com) in your project.

Class References and Examples
-----------------------------

You can also browse the list of available XHP-Bootstrap classes with live
examples at http://bootstrap.hhvm.com

You can also interact with these by configuring a webserver to look inside
the `example/` directory and accessing `example.php`.

Differences
-----------

In the Bootstrap documentation, a component's
default/primary/success/info/warning/danger/link state
(white/dark blue/green/light blue/orange/red/link) is referred to as `use` for
some components, but `color` for others. XHP-Bootstrap uses the `use` attribute
throughout for consistency.

License
-------

XHP-Bootstrap is BSD-licensed. We also provide an additional patent grant.

Contributing
------------

Please see CONTRIBUTING.md
