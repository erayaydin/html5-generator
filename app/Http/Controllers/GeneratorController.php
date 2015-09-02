<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use Zipper;
use Validator;
use Redirect;
use Input;
use App\Http\Controllers\ResponseHelper;

class GeneratorController extends Controller
{
    /**
     * Show create form.
     *
     * @return Response
     */
    public function create() {
        return View::make("generator.create");
    }

    /**
     * Create zip file and download.
     *
     * @return Response
     */
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
            return Redirect::route("generate")->withInput()->withErrors($validator);
        $asset_name = Input::has("asset_name") ? Input::get("asset_name") : "assets";
        $css_name = Input::has("css_name") ? Input::get("css_name") : "css";
        $image_name = Input::has("image_name") ? Input::get("image_name") : "images";
        $js_name = Input::has("js_name") ? Input::get("js_name") : "js";
        $plugin_name = Input::has("plugin_name") ? Input::get("plugin_name") : "plugins";
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
        $indexContent = View::make("generator.source")->with(array(
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
            "meyerreset"    => $meyerreset,
            "fontawesome"   => $fontawesome,
            "animate"       => $animate,
            "bootstrap"     => $bootstrap,
            "prettyphoto"   => $prettyphoto
        ));
        $zipname = str_random(40);
        $zip = Zipper::make(public_path()."/projects/".$zipname.".zip");
        $zip->addString("index.html", $indexContent);
        $zip->folder($asset_name."/".$css_name)->addString("custom.css", null);
        $zip->folder($asset_name."/".$css_name)->addString("core.css", null);
        $zip->folder($asset_name."/".$js_name)->addString("custom.js", null);
        $zip->folder($asset_name."/".$js_name)->addString("core.js", null);
        if($favicon)
            $zip->folder($asset_name."/".$image_name)->addString("favicon.ico", null);
        if($animate)
            $zip->folder($asset_name."/".$plugin_name."/animate")->add(storage_path()."/assets/animate/");
        if($bootstrap)
            $zip->folder($asset_name."/".$plugin_name."/bootstrap")->add(storage_path()."/assets/bootstrap/");
        if($jquery)
            $zip->folder($asset_name."/".$plugin_name."/jquery")->add(storage_path()."/assets/jquery/");
        if($jqueryui)
            $zip->folder($asset_name."/".$plugin_name."/jqueryui")->add(storage_path()."/assets/jqueryui/");
        if($meyerreset)
            $zip->folder($asset_name."/".$plugin_name."/meyerreset")->add(storage_path()."/assets/meyerreset/");
        if($normalize)
            $zip->folder($asset_name."/".$plugin_name."/normalize")->add(storage_path()."/assets/normalize/");
        if($prettyphoto)
            $zip->folder($asset_name."/".$plugin_name."/prettyphoto")->add(storage_path()."/assets/prettyphoto/");
        $zip->close();
        return ResponseHelper::downloadAndDelete(public_path()."/projects/".$zipname.".zip", Input::get("project_name").".zip");
    }
}
