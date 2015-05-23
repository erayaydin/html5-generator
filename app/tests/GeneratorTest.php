<?php

class GeneratorTest extends TestCase {

    /**
     * Testing generator form page
     *
     * @return void
     */
    public function testGeneratorForm()
    {
        $this->call("GET", "/generate");

        $this->assertResponseOk();
    }

    /**
     * Testing main generator
     *
     * @return void
     */
    public function testGenerator()
    {
        $this->call("POST", "/generate/store", array(
            "project_name" => "Testing",
            "asset_name"   => "myassets",
            "image_name"   => "myimages",
            "css_name"     => "mycss",
            "js_name"      => "myjs",
            "plugin_name"  => "myplugin",

            "jquery"      => true,
            "jqueryui"    => true,
            "normalize"   => true,
            "meyerreset"  => true,
            "fontawesome" => true,
            "animate"     => true,
            "bootstrap"   => true,
            "prettyphoto" => true,

            "favicon"     => true,
            "opengraph"   => true,
            "twittercard" => true
        ));

        $this->assertResponseOk();
    }

}
