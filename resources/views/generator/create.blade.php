@extends("layout.main")

@section("title") {{ Lang::get("keywords.generate") }} @stop
@section("description") @stop
@section("keywords") @stop

@section("content")
    <div class="row">
        @if($errors->has())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        {!! Form::open(array("route" => "generate.store")) !!}
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ Lang::get("keywords.general") }}</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label("project_name", Lang::get("keywords.projectname")) !!}
                        {!! Form::text("project_name", Input::old("project_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.zipfilename"))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("asset_name", Lang::get("keywords.assetdirname")) !!}
                        {!! Form::text("asset_name", Input::old("asset_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.default", array("name" => "assets")))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("image_name", Lang::get("keywords.imagedirname")) !!}
                        {!! Form::text("image_name", Input::old("image_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.default", array("name" => "images")))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("css_name", Lang::get("keywords.cssdirname")) !!}
                        {!! Form::text("css_name", Input::old("css_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.default", array("name" => "css")))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("js_name", Lang::get("keywords.jsdirname")) !!}
                        {!! Form::text("js_name", Input::old("js_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.default", array("name" => "js")))) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label("plugin_name", Lang::get("keywords.plugindirname")) !!}
                        {!! Form::text("plugin_name", Input::old("plugin_name"), array("class" => "form-control", "placeholder" => Lang::get("keywords.default", array("name" => "plugins")))) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ Lang::get("keywords.assets") }}</h3>
                </div>
                <div class="panel-body">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("jquery", true, Input::old("jquery")) !!}
                            jQuery
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("jqueryui", true, Input::old("jqueryui")) !!}
                            jQuery UI
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("normalize", true, Input::old("normalize")) !!}
                            Normalize
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("meyerreset", true, Input::old("meyerreset")) !!}
                            Meyer Reset CSS
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("fontawesome", true, Input::old("fontawesome")) !!}
                            Fontawesome
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("animate", true, Input::old("animate")) !!}
                            Animate.css
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("bootstrap", true, Input::old("bootstrap")) !!}
                            Bootstrap
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("prettyphoto", true, Input::old("prettyphoto")) !!}
                            PrettyPhoto
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ Lang::get("keywords.misc") }}</h3>
                </div>
                <div class="panel-body">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("favicon", true, Input::old("favicon")) !!}
                            Favicon
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("opengraph", true, Input::old("opengraph")) !!}
                            Open Graph Media (Facebook,Google,Twitter)
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox("twittercard", true, Input::old("twittercard")) !!}
                            Twitter Card
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            {!! Form::submit(Lang::get("keywords.generate")."!", array("class" => "btn btn-primary btn-block")) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <br />
@stop