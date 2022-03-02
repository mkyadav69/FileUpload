<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Exception, Log, Cache, View;
use App\Models\FileUpload;
use Illuminate\Support\Str;
use \AshAllenDesign\ShortURL\Models\ShortURL;
use Config;

class UrlController extends Controller
{
    public function urlForm(Request $request){
        try {
            # View File
            return view('hash.hash_file');
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function generateUrl(Request $request){
        try {
            # Validation
            $validator = Validator::make($request->all(),[
                'url' =>  ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }   
            $originalUrl = $request->input('url');
            $data = $request->all();
            $trackingFields = Config::get('constant.trackin_fields');
            $visitor = Config::get('constant.visitor'); 
            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
            $shortURLObject = $builder->destinationUrl($originalUrl);
            unset($data['url']);
            unset($data['_token']);
            # Check for visitor enable
            $matchFound = array_intersect_key($data, array_flip($visitor));
            if(count($matchFound) > 0){
                $shortURLObject->trackVisits();
            }
            if(count($data) > 0){
                foreach($data as $key=>$value){
                    # Tracking IP Address
                    if(!empty($value) && $key == 'enable_ip_address_tracking'){
                        $shortURLObject->trackIPAddress();
                        $request->session()->flash('enable_ip_address_tracking', 'true');
                    }

                    # URL Referal Tracking
                    if(!empty($value) && $key == 'enable_url_referal_tracking'){
                        $shortURLObject->trackRefererURL();
                        $request->session()->flash('enable_url_referal_tracking', 'true');
                    }

                    # Device Type Tracking
                    if(!empty($value) && $key == 'enable_device_type_tracking'){
                        $shortURLObject->trackDeviceType();
                        $request->session()->flash('enable_device_type_tracking', 'true');
                    }

                    # Browser & Its version Tracking
                    if(!empty($value) && $key ==  'browser_and_version_tracking'){
                        $shortURLObject->trackBrowser()->trackBrowserVersion();
                        $request->session()->flash('browser_and_version_tracking', 'true');
                    }

                    # Operating System & Its version Tracking
                    if(!empty($value) && $key ==  'operating_and_version_tracking'){
                        $shortURLObject->trackOperatingSystem()->trackOperatingSystemVersion();
                        $request->session()->flash('operating_and_version_tracking', 'true');
                    }
                    
                    # Single Use Mapping
                    if(!empty($value) && $key ==  'single_use'){
                        $shortURLObject->singleUse();
                        $request->session()->flash('single_use', 'true');
                    }

                    # Enforce Https Mapping
                    if(!empty($value) && $key == 'enforce_https'){
                        $shortURLObject->secure();
                        $request->session()->flash('enforce_https', 'true');
                    }

                    # Query Parameter Forwording
                    if(!empty($value) && $key == 'query_parameter_forwording'){
                        $shortURLObject->forwardQueryParams();
                        $request->session()->flash('query_parameter_forwording', 'true');
                    }

                    # Custom Key
                    if(!empty($value) && $key == 'custome_key'){
                        $shortURLObject->urlKey($value);
                        $request->session()->flash('custome_key', $value);
                    }
                        
                    #  Url Validity
                    if(!empty($value) && $key == 'activation_deactivation_time'){
                        $shortURLObject->activateAt(\Carbon\Carbon::now()->addDay())
                        ->deactivateAt(\Carbon\Carbon::now()->addDays(2));
                        $request->session()->flash('activation_deactivation_time', 'true');
                    }
                    # Redirect Status Code Mapping
                    if(!empty($value) && $key == 'http_redirect'){
                        $status_code = [
                            '300','301' ,'302' ,'303','304','305','306' , '307' 
                        ];
                        if(!in_array($value, $status_code)){
                            return back()->with(['error' =>'Wrong Redirect Status Code'])->withInput(); 
                        }
                        $shortURLObject->redirectStatusCode($value);
                        $request->session()->flash('http_redirect', 'true');
                    }
                }
                $url = $shortURLObject->make();
                $shortURL = $url->default_short_url;
                if(!empty($shortURL)){
                    return back()->with(['short_url' =>$shortURL])->withInput(); 
                }else{
                    return back()->with(['error' =>'Fail to create short URL'])->withInput(); 
                }
            }else{
                return back()->with(['error' =>'Please perform proper operation'])->withInput(); 
            }

        } catch (Exception $ex) {
            Log::error($ex);
        }
    }

    public function redirectToOriginalUrl(Request $request, $url_key){
        try {
            # URL Check
            if(empty($url_key)){
                return back()->with([
                    'message' =>'URL Not Found !'
                ]); 
            }
            $originalUrl = ShortURL::findByKey($url_key);
            if(!empty($originalUrl['destination_url'])){
                return redirect($originalUrl['destination_url']);
            }else{
                return back()->with(['error' =>'Fail to find short URL'])->withInput(); 
            }
           
        } catch (Exception $ex) {
            Log::error($ex);
        }
    }
}
