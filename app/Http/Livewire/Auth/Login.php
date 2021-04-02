<?php

namespace App\Http\Livewire\Auth;

use App\Models\Login as UserLogin;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Login extends Component
{
    use ThrottlesLogins;

    public $username = '';
    public $password = '';
    public $error = '';

    public function authenticate(Request $request)
    {

        $credentials = $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request, $this->username)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request, $this->username, $this);
        }
        if (Auth::attempt($credentials)) {
            if (auth()->user()->status == 0) {
                $this->addError('username', trans('User Account Banned!'));
                return;
            }
            $user = auth()->user();
            $ip = null;
            $deep_detect = true;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }

            $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);

            $country = @$xml->geoplugin_countryName;
            $city = @$xml->geoplugin_city;
            $area = @$xml->geoplugin_areaCode;
            $code = @$xml->geoplugin_countryCode;
            $long = @$xml->geoplugin_longitude;
            $lat = @$xml->geoplugin_latitude;
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $os_platform = "Unknown OS Platform";
            $os_array = array(
                '/windows nt 10/i' => 'Windows 10',
                '/windows nt 6.3/i' => 'Windows 8.1',
                '/windows nt 6.2/i' => 'Windows 8',
                '/windows nt 6.1/i' => 'Windows 7',
                '/windows nt 6.0/i' => 'Windows Vista',
                '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                '/windows nt 5.1/i' => 'Windows XP',
                '/windows xp/i' => 'Windows XP',
                '/windows nt 5.0/i' => 'Windows 2000',
                '/windows me/i' => 'Windows ME',
                '/win98/i' => 'Windows 98',
                '/win95/i' => 'Windows 95',
                '/win16/i' => 'Windows 3.11',
                '/macintosh|mac os x/i' => 'Mac OS X',
                '/mac_powerpc/i' => 'Mac OS 9',
                '/linux/i' => 'Linux',
                '/ubuntu/i' => 'Ubuntu',
                '/iphone/i' => 'iPhone',
                '/ipod/i' => 'iPod',
                '/ipad/i' => 'iPad',
                '/android/i' => 'Android',
                '/blackberry/i' => 'BlackBerry',
                '/webos/i' => 'Mobile'
            );
            foreach ($os_array as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $os_platform = $value;
                }
            }
            $browser = "Unknown Browser";
            $browser_array = array(
                '/msie/i' => 'Internet Explorer',
                '/firefox/i' => 'Firefox',
                '/safari/i' => 'Safari',
                '/chrome/i' => 'Chrome',
                '/edge/i' => 'Edge',
                '/opera/i' => 'Opera',
                '/netscape/i' => 'Netscape',
                '/maxthon/i' => 'Maxthon',
                '/konqueror/i' => 'Konqueror',
                '/mobile/i' => 'Handheld Browser'
            );
            foreach ($browser_array as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $browser = $value;
                }
            }
            $ul['user_id'] = $user->id;
            $ul['user_ip'] = request()->ip();
            $ul['long'] = $long;
            $ul['lat'] = $lat;
            $ul['location'] = $city . (" - $area - ") . $country . (" - $code ");
            $ul['country_code'] = $code;
            $ul['browser'] = $browser;
            $ul['os'] = $os_platform;
            $ul['country'] = $country;
            UserLogin::create($ul);
            if (auth()->user()->active == 1) {
                return redirect()->intended(route('user.dashboard'));
            } else {
                return redirect()->intended(route('user.deposit.funds'));
            }
        } else {
            $this->incrementLoginAttempts($request, $this->username);
            $this->addError('username', trans('auth.failed'));
            $this->password = '';
            return;
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}
