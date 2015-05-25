<?php

use Symfony\Component\Process\Process;

class GenerateController extends BaseController {

    public function create() {
        return \View::make("generate");
    }

    public function store() {
        $rules = [
            "project_name" => "required|alpha_dash",
            "asset_name"   => "alpha_dash",
            "image_name"   => "alpha_dash",
            "css_name"     => "alpha_dash",
            "js_name"      => "alpha_dash",
            "plugin_name"  => "alpha_dash"
        ];

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
            return \Redirect::route("generate")->withInput()->withErrors($validator);

        $asset_name = Input::has("asset_name") ? Input::get("asset_name") : "assets";
        $css_name = Input::has("css_name") ? Input::get("css_name") : "css";
        $image_name = Input::has("image_name") ? Input::get("image_name") : "images";
        $js_name = Input::has("js_name") ? Input::get("js_name") : "js";
        $plugin_name = Input::has("plugin_name") ? Input::get("plugin_name") : "bower_components";

        $favicon     = Input::has("favicon") && Input::get("favicon") != "" ? true : false;
        $opengraph   = Input::has("opengraph") && Input::get("opengraph") != "" ? true : false;
        $twittercard = Input::has("twittercard") && Input::get("twittercard") != "" ? true : false;

        $jquery = Input::has("jquery") && Input::get("jquery") != "" ? true : false;
        $jqueryui = Input::has("jqueryui") && Input::get("jqueryui") != "" ? true : false;
        $normalize = Input::has("normalize") && Input::get("normalize") != "" ? true : false;
        $fontawesome = Input::has("fontawesome") && Input::get("fontawesome") != "" ? true : false;
        $animate = Input::has("animate") && Input::get("animate") != "" ? true : false;
        $bootstrap = Input::has("bootstrap") && Input::get("bootstrap") != "" ? true : false;
        $prettyphoto= Input::has("prettyphoto") && Input::get("prettyphoto") != "" ? true : false;

        $tempFolderName = str_random(10);
        File::makeDirectory(storage_path()."/projects/".$tempFolderName, 0755, true);
        $tempFolder = storage_path()."/projects/".$tempFolderName;

        $bower = [];
        $bower["name"] = Input::get("project_name");
        $bower["dependencies"] = [];

        if($jquery){
            $bower["dependencies"]["jquery"] = "~1.11.3";
        }

        if($jqueryui){
            $bower["dependencies"]["jqueryui"] = "~1.11.4";
        }

        if($normalize){
            $bower["dependencies"]["normalize.css"] = "~3.0.3";
        }

        if($fontawesome){
            $bower["dependencies"]["fontawesome"] = "~4.3.0";
        }

        if($animate){
            $bower["dependencies"]["animate.css"] = "~3.1.0";
        }

        if($bootstrap){
            $bower["dependencies"]["bootstrap"] = "~3.3.4";
        }

        if($prettyphoto){
            $bower["dependencies"]["prettyphoto"] = "master";
        }

        $bowerjson = JSONHelper::indent(json_encode($bower));
        File::put($tempFolder."/bower.json", $bowerjson);

        $process = new Process("bower install --config.cwd=".$tempFolder."/");
        $process->setTimeout(3600);
        $process->run();
        if (!$process->isSuccessful()) {
            echo $process->getErrorOutput();
        }

        $indexContent = \View::make("source")->with(array(
            "project_name"  => Input::get("project_name"),
            "asset_name"    => $asset_name,
            "image_name"    => $image_name,
            "css_name"      => $css_name,
            "js_name"       => $js_name,
            "plugin_name"   => $plugin_name,
            "favicon"       => $favicon,
            "opengraph"     => $opengraph,
            "twittercard"   => $twittercard,
            "jquery"        => $jquery,
            "jqueryui"      => $jqueryui,
            "normalize"     => $normalize,
            "fontawesome"   => $fontawesome,
            "animate"       => $animate,
            "bootstrap"     => $bootstrap,
            "prettyphoto"   => $prettyphoto
        ));

        $zip = Zipper::make(storage_path()."/projects/".$tempFolderName.".zip");
        $zip->addString("index.html", $indexContent);
        $zip->folder($asset_name."/".$css_name)->addString("custom.css", null);
        $zip->folder($asset_name."/".$css_name)->addString("core.css", null);
        $zip->folder($asset_name."/".$js_name)->addString("custom.js", null);
        $zip->folder($asset_name."/".$js_name)->addString("core.js", null);
        if($favicon)
            $zip->folder($asset_name."/".$image_name)->addString("favicon.ico", null);
        $zip->home()->add($tempFolder."/");

        $zip->close();

        File::deleteDirectory($tempFolder);
        return ResponseHelper::downloadAndDelete(storage_path()."/projects/".$tempFolderName.".zip", Input::get("project_name").".zip");
    }

}
