# Pronto CMS

> The CMS that is almost ready ("pronto" in italian) for you to use.

The aim of *Pronto* is to be a download and run flat-file based CMS with high speed and low maintenance costs. It uses [Laravel Lumen](http://lumen.laravel.com/) at its core.

## Features

* [x] Markdown content parsing
* [x] Sections and subsections
* [ ] Page and section configurable order
* [x] Multiple level page nesting
* [ ] Multi-language support
* [ ] Themes
* [ ] File Download and assets management
* [x] Imagination


### Browser compatibility

At now the plan is to target all the modern browsers (IE10, IE11, Edge, Chrome, Firefox, Safari, Opera latest versions).


### Requirements

- php 5.5.9+
- php fileinfo extension
- Composer (for managing PHP dependencies)
- NodeJS and NPM (for building the frontend)

## Installation

To create a new project use Composer "create-project" command. Pass it the package name (`avvertix/pronto-cms`), and the directory to create the project in (e.g. `path`). You can also provide a version as third argument, otherwise the latest version is used.

```bash
php composer.phar create-project avvertix/pronto-cms path
```

Now that all the PHP code is there you could initialize the frontend (i.e. the default theme) by launching

```bash
npm install
gulp
```


## Content Writing

Your website content will be gathered from the folders and from the Markdown files contained in the `storage/content` folder.

Folders will be converted to sections, while markdown files are the pages. Only markdown file whose extension is `.md` will be considered. 

If a folder contains a file named `index.md` will be showed when a section is requested.

We support the following markdown specifications:

- [Markdown](https://daringfireball.net/projects/markdown/syntax)
- [Markdown Extra](https://michelf.ca/projects/php-markdown/extra/)

The framework offers syntax highlighting so please specify the language for each fenced code block.

**Folder naming rules**

- lower case,
- no spaces,
- `-` and `_` for word separation

**File naming rules**

- `.md` extension, 
- no spaces,
- use `-` as word separator,
- entirely lower case

**Adding images (png, jpg, ...) and resources (pdf, zip, ...)**

Images can be stored in `storage/images` and then referenced, in the markdown page, with their names using a special path, like in the example below

```
![alt](./i/image-name.png)
```

Image file names follow the same rules for file naming as the markdown pages.

if you want to set a link on an image, you could do that using the following markdown syntax

```
[![](./i/image-name.png)](./i/image-name.png)
```

The previous example will open the full size version of the image when the image preview is clicked.



### Global Navigation Menu

The global navigation menu that will be inserted in the header of the website is entirely made 
using a json based configuration. The configuration file, named `config.json`, must be inside the `storage/app` folder.

Three types of elements can be inserted in the global navigation:

1. External links,
2. Links to pages,
3. Links to sections.

Every element in the menu must have a `title` attribute that is used for the UI of the menu and a `ref` attribute which holds the link to the element. 

**External links**

For external links you have to specify:

- `title`: the title of the link to be showed to the user
- `ref`: the absolute URL

**Links to pages**

For pages you have to specify:

- `title`: the title to be showed to the user
- `type`: `page`
- `ref`: the path of the page, wich consists in the section slug and the page slug (relative to the `content` folder)

**Links to sections**

- `title`: the title to be showed to the user
- `type`: `section`
- `ref`: the path to the section (relative to the `content` folder)


The following code block is an example of `config.json` menu section.

```json
{
	"menu": [
		{
			"title": "Git",
			"ref": "http://git.project"
		},
		{
			"title": "Sub Section Promoted",
			"type": "section",
			"ref": "example-section/sub-section-1"
		},
		{
			"title": "Home",
			"type": "page",
			"ref": "index"
		}
	]
}
```



## Securing your installation

...

-------

Created with [Visual Studio Code](https://code.visualstudio.com/)

