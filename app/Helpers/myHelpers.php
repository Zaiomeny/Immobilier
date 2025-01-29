<?php

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * (From helpers)
 * Format a timestamp date into 'x-duration ago'
 * The language is detected automaticaly
 * @param Carbon $date
 * @return null | string
 */
if (!function_exists('formatDate')) {
    function formatDate(Carbon $date): null | string
    {
        /**Just a "garde-fou" */
        if($date == null){
            return null;
        }
       return $date->locale(app()->getLocale())->diffForHumans();
    }
}
/**
 * (From helpers)
 * Format money with unity and add a space separator
 * By default the unity will be 'Ar' but you can customize it
 * @param string|integer $money
 * @param string|null $unity
 * @return string
 */
if(!function_exists('formatMoney')){
    function formatMoney(string $money, string $unity = 'Ariary') : string
    {
        return number_format($money, thousands_separator:'.').' '.$unity;
    }
}
/**
 * (From helpers)
* @return User
*/
if(!function_exists('currentUser')){
    function currentUser()
    {
        return Auth::user();
    }
}
