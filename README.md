# codeigniter-facebook-sdk
Simple integration with latest Facebook API - for use with Ignition Go (or vanilla Codeigniter if sessions are set up)

Note: The latest Facebook SDK for PHP requires PHP 5.4 or greater.

## Installation

1. clone project
2. copy files to your project including composer.json and application/*
2. update composer
3. set your facebook_appId and facebook_appSecret in facebook.config (and set permissions) 

## Usage

Sample helper function     
    function fb_fileToUpload($fblib, $path_to_file, $params = [], $type = 'image', $access_token = null)

See [https://developers.facebook.com/docs/graph-api/overview/] for how to do more

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

5/8/2017 v0.1 Pre-beta

## Credits

Thanks to @darkwhispering for his library

## License

MIT
