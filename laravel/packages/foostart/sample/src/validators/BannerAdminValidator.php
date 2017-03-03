<?php

namespace Foostart\Sample\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Illuminate\Support\MessageBag as MessageBag;

class BannerAdminValidator extends AbstractValidator {

    protected static $rules = array(
        'banner_img' => 'required',
    );
    protected static $messages = [];

    public function __construct() {
        Event::listen('validating', function($input) {
            
        });
        $this->messages();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors ? $this->errors : new MessageBag();

        $flag = $this->isValidTitle($input) ? $flag : FALSE;
        return $flag;
    }

    public function messages() {
        self::$messages = [
            'required' => ':attribute ' . trans('banner::banner_admin.required')
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('banner.img_min_lengh');
        $max_lenght = config('banner.img_max_lengh');

        $banner_img = @$input['banner_img'];


        if ((strlen($banner_img) <= $min_lenght) || ((strlen($banner_img) >= $max_lenght))) {
            $this->errors->add('img_unvalid_length', trans('img_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            $flag = TRUE;
        }
        return $flag;
    }

}
