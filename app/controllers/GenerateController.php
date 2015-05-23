<?php

class GenerateController extends BaseController {

    public function create() {
        return \View::make("generate");
    }

    public function store() {
        $rules = [
            "project_name" => "alpha_dash",
            "asset_name"   => "alpha_dash",
            "image_name"   => "alpha_dash",
            "css_name"     => "alpha_dash",
            "js_name"      => "alpha_dash",
            "plugin_name"  => "alpha_dash"
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
            return \Redirect::route("generate")->withInput()->withErrors($validator);

        $favicon     = Input::has("favicon") && Input::get("favicon") != "" ? true : false;
        $opengraph   = Input::has("opengraph") && Input::get("opengraph") != "" ? true : false;
        $twittercard = Input::has("twittercard") && Input::get("twittercard") != "" ? true : false;

        $jquery = Input::has("jquery") && Input::get("jquery") != "" ? true : false;
        $jqueryui = Input::has("jqueryui") && Input::get("jqueryui") != "" ? true : false;
        $normalize = Input::has("normalize") && Input::get("normalize") != "" ? true : false;
        $meyerreset = Input::has("meyerreset") && Input::get("meyerreset") != "" ? true : false;
        $fontawesome = Input::has("fontawesome") && Input::get("fontawesome") != "" ? true : false;
        $animate = Input::has("animate") && Input::get("animate") != "" ? true : false;
        $bootstrap = Input::has("bootstrap") && Input::get("bootstrap") != "" ? true : false;
        $prettyphoto= Input::has("prettyphoto") && Input::get("prettyphoto") != "" ? true : false;

        $indexContent = \View::make("source")->with(array(
            "project_name"  => Input::get("project_name"),
            "asset_name"    => Input::get("asset_name"),
            "image_name"    => Input::get("image_name"),
            "css_name"      => Input::get("css_name"),
            "js_name"       => Input::get("js_name"),
            "plugin_name"   => Input::get("plugin_name"),
            "favicon"       => $favicon,
            "opengraph"     => $opengraph,
            "twittercard"   => $twittercard,
            "jquery"        => $jquery,
            "jqueryui"      => $jqueryui,
            "normalize"     => $normalize,
            "meyerreset"    => $meyerreset,
            "fontawesome"   => $fontawesome,
            "animate"       => $animate,
            "bootstrap"     => $bootstrap,
            "prettyphoto"   => $prettyphoto
        ));

        return $indexContent;
        // Generate project.zip

        // Download project.zip
    }

}
