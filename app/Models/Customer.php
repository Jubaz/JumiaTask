<?php

namespace App\Models;

use App\Constants\CountryCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];

    protected $appends = ['phone_number', 'country_code', 'country', 'country_code_with_plus', 'phone_state'];

    public function getCountryAttribute()
    {
        return CountryCodes::$countries[$this->country_code];
    }

    public function getPhoneNumberAttribute()
    {
        return preg_replace('/\((.*?)\) /', '', $this->phone);
    }

    public function getCountryCodeAttribute()
    {
        preg_match('/\((.*?)\) /', $this->phone, $match);

        return (isset($match[1])) ? $match[1] : null;
    }

    public function getCountryCodeWithPlusAttribute()
    {
        return '+' . $this->country_code;
    }

    public function getPhoneStateAttribute()
    {
        return (bool)preg_match(CountryCodes::$countriesRegex[$this->country_code], $this->phone);
    }
}
