<?php namespace Prototype;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
* Class ExceptionProvider
*/
class ExceptionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerCommonException();
    }
    /**
    * Register Common Exception
    */
    public function registerCommonException()
    {
        
        $this->app->error(function (\Exception $e, $code) {
            if (preg_match('/\/admin\//',\Request::url())){
                return \Redirect::route('get.admin.login');
            }
            else{
                return \Redirect::route('frontend.index');
            }
        });        
    }
}



