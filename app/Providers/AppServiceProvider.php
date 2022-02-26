<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FileUpload;
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $data = [];
        view()->composer(['upload.file_upload', 'theme.layout.sidebar'], function ($view) use($data, $request) {
            $uri = '';
            FileUpload::select('file_name')->orderBy('id', 'desc')->chunk(100, function($files) use (&$data, $request){   
                foreach($files as $file){
                    $data[] =  $file->file_name;
                }
                $uri = $request->path();
                if($uri == '/'){
                    $data['uri'] = $data[0];
                }else{
                    $data['uri'] = $uri;
                }
            });
            $view->with(['data'=>$data]);
        });

    }
}
