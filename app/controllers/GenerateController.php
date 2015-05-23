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

        // Generate index.html

        // Generate project.zip

        // Download project.zip
    }

}
