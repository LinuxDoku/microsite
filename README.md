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

An example with some api code:
`wp-content/microsites/mynewsletterpage/index.php`

    <html>
        <head>
            <title>MyProduct</title>
        </head>
        <body>
            <h1>Get my Newsletter</h1>
			<a href="<?php echo $api->meta->get_newsletter_url ?>">Subscribe now!</a>
        </body>
    </html>

The meta field `get_newsletter_url` has to be defined as custom field in the wordpress page which you transformed in a microsite.

## API
### wordpress content
You can use any wordpress function or content in your microsite.

On the other hand there's an `microsite_api` class, which provides some useful data. An object related to the shown page which is rendered as microsite is accessable via `$api` in you microsite code.

    <?php echo $api->post_id ?>
    <?php echo $api->meta->microsite ?>
    <?php echo $api->meta->newsletter_url ?>

`$api->meta` is an additional class which has some magic getter to fetch the posts metadata also known as user defined fields. These fields name is the magic property in this class.

### wordpress plugins
In near future also a little api for wordpress plugins will be integrated. So for example managing js files on lot of microsites by hand will be obsolete.