# Yii Documentor

*Yii Documentor* is a Yii command that can be used to generate *Yii style* API reference for a Yii application, a Yii extension or the Yii framework itself.

When generating API reference for an application or an extension, it can be configured to add the framework API reference or to link to its external API reference. This is really useful because allow having an integrated documentation and Yii extension developers can provide an API reference consistent and already familiar for the community users.

For applications and extensions, it allows to add links to its code source in an external repository.

## Installation

* Download it from [https://github.com/laMarciana/yiiDocumentor/zipball/master](https://github.com/laMarciana/yiiDocumentor/zipball/master).
* Extract it in the `protected/commands/` of your Yii installation (`DocCommand.php` file and `doc` folder must be in this directory and not in any of its subdirectories)

## Usage

**Please, if you are getting problems and also for security reasons read in the 'Configuration' section the information about the `exclude` option.**

Launch new command `doc` with your `protected/yiic` file (or use `yiic.php` script, or `yiic.bat` in Windows):

    yiic doc

Withous arguments, it just display instructions on how to use the command.

Following options are allowed. In all cases, `<output-path>` must already exists.

    yiic doc yii <output-path>

Generate API reference documentation for the Yii framework and save it in `<output-path>` directory. For example, `yiic doc yii doc`.

    yiic doc app <output-path>

Generate API reference documentation for the Yii application and save it in `<output-path>` directory. For example, `yiic doc app doc`.

    yiic doc ext <output-path> <ext-directory-name>

Generate API reference documentation for a Yii extension located in `extensions/<ext-directory-name>` and save it in `<output-path>` directory. For example, `yiic doc ext doc myextension`.

Additionally, if second parameter is `check` it just checks if each piece of code is documented or not:

    yiic doc yii check
    yiic doc app check
    yiic doc ext check <ext-directory-name>

## Configuration

For an application or an extension, *Yii Documentor* behaviour can be customized through an `api.php` configuration file.

This configuration file must be located in:

    `config/api.php`

for an application, or in:

    `extensions/<ext-directory-name>/config/api.php`

for an extension.

`api.php` must return an associative array. Following are accepted keys and the means of its values:

* `exclude`: Array. List of directory and files to be excluded from the API. While building the API reference, Yii Documentor must include all the files to get the classes declared, so unexpected errors can arise or you can execute code you don't want to (if for example someday you decided to save a php file that remove completely your hard disk in a directory that now you are going to document). Use this option to exclude some extensions view directories and any other files that are giving you troubles. The base path is `protected/` for an application and `protected/extensions/<ext-directory-name>` for an extension. Look at `CFileHelper::findFiles` `$options` parameter to get details on how to declare this array. Note that to exclude a `folder/` you have to write `folder` (without last backslash).
* `name`: String. The name of the application or the extension. If not set, the application name in `main.php` or `console.php` will be used for an application, or the extension's directory name for an extension.
* `url`: String. A url to the homepage of the application or extension. It will be used to link the name. If it is not set, no link will be added.
* `source_url`: String. A url that points to a respository where the source code is. Used in the links to source code. Ex: `https://github.com/laMarciana/yiiDocumentor/blob/master`
* `anchor_line_preffix`: String. The preffix used before the line number in the anchor of the link to the repository source url. Ex: `L`, which together with `source_url` example will generate url's like  `https://github.com/laMarciana/yiiDocumentor/blob/master/DocCommand.php#L170`
* `with_yii`: Boolean. Whether to include Yii framework API reference or not. Defaults to `false`.
* `with_yii_links`: Boolean. Wheter to include Yii framework API reference external links or not. Ignored if `with_yii` is true. Defaults to `true`.
* `console_application`: Boolean. Used only for applications. Wheter it is a console application or, otherwise, a web application. Used to take the default application name from `main.php` or `console.php`. Defaults to `false`.

Here it is an example:

    //api.php
    return array(
      'exclude' => array('gii'),
      'name' => 'My Yii Extenstion',
      'url' => 'http://www.myyiiextension.com',
      'source_url' => 'https://github.com/anyUser/MyYiiExtension/blob/master',
      'anchor_line_preffix' => 'L',
      'with_yii' => false,
      'with_yii_links' => true,
    );

## Resources

* [Yii Documentor homepage](https://github.com/laMarciana/yiiDocumentor)
* [Yii Documentor in Yii extensions directory](http://www.yiiframework.com/extension/yiidocumentor/)

## License

Copyright 2012, Marc Busqué Pérez, under GNU LESSER GENERAL PUBLIC LICENSE 3
marc@lamarciana.com - http://www.lamarciana.com

Heavily based on previous work of:

&copy; 2008-2011 Yii Software LLC
All rights reserved

See http://www.yiiframework.com/license/
