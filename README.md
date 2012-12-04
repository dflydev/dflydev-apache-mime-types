Apache MIME Types
=================

Parses Apache MIME Types files and provides a simple interface to find
extensions by type and type by extension.


Features
--------

 * Bundles `mime.types` from the Apache HTTP Project. ([see here][1])
 * Bundles a JSON representation of Apache `mime.types`.
 * Provides an interface for reading either flat Apache HTTP `mime.types`
   or a JSON representation.


Requirements
------------

 * PHP 5.3.3+

Installation
------------

Through [Composer][3] as [dflydev/apache-mime-types][4].


Usage
-----

```php
<?php
$repository = new Dflydev\ApacheMimeTypes\JsonRepository;

$type = $repository->findType('html');
$extensions = $repository->findExtensions('text/html');

vardump($type);
vardump($extensions);

//
// Result
//
// string(9) "text/html"
// array(2) {
//   [0]=>
//   string(4) "html"
//   [1]=>
//   string(3) "htm"
// }
//
```


License
-------

MIT, see LICENSE.


Community
---------

If you have questions or want to help out, join us in the **#dflydev** channel
on **irc.freenode.net**.


Not Invented Here
-----------------

This project is based heavily on [skyzyx/mimetypes][2]. The major difference is
that [skyzyx/mimetypes][2] is focussed on creating JSON files from Apache
`mime.types` rather than providing a way to interact with Apache MIME Types as
a data source.


[1]: https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
[2]: https://github.com/skyzyx/mimetypes
[3]: http://getcomposer.org/
[4]: https://packagist.org/packages/dflydev/apache-mime-types
