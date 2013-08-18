# microsite
Wordpress plugin to create multiple microsites within one instance. This plugin started in production useage by day zero. So it's under development and maybe not suiteable for everyone. At least not at the moment.

## Description
After installing this plugin it creates a new directory in your wp-content directory called `microsites`. Inside this directory you can create new folders for each of your microsites.

Each microsite has it's own folder and requires only an `index.php` file. This file contains the complete code and markup of your microsite. It's completely decoupled of any wordpress output - headers, html, css, etc.

## Example
A very basic example of a microsite:
`wp-content/microsites/myproduct/index.php`

    <html>
        <head>
            <title>MyProduct</title>
        </head>
        <body>
            <h1>MyProduct</h1>
        </body>
    </html>

## API
### wordpress content
You can use any wordpress function or content in your microsite. In near future there will be an easy to use Interface to get away from these dirty wordpress features. Maybe also some new backend ui, cause struggle with the plain files is not everyones thing ;-)

### wordpress plugins
In near future also a little api for wordpress plugins will be integrated. So managing js files on lot of microsites by hand will be obsolete.