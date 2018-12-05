<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 12/5/18
 * Time: 11:44 PM
 *
 */

namespace App\Http\Controllers;


use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class VersionController extends Controller
{

    const LATEST_VERSION = 'latest_version';

    public function publish(Request $request){
        try {
            $this->validate($request, [
                'version' => 'required|unique:versions|regex:/^\d+.\d+.\d+$/u'
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        Cache::forget(self::LATEST_VERSION);

        return Version::create($request->all());
    }

    public function check(Request $request, $version)
    {
        $request->request->add(['version' => $version]);

        if(!Cache::has(self::LATEST_VERSION)){
            Cache::forever(self::LATEST_VERSION, Version::latest()->first()->version);
        }
        $latestVersion = Cache::get(self::LATEST_VERSION);

        try {
            $this->validate($request, [
                'version' => 'required|regex:/^\d+.\d+.\d+$/u'
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        if(version_compare($version, $latestVersion, '>=')){
            return 'VERSION_OK';
        }
        if(version_compare(
            $this->stripRevision($version),
            $this->stripRevision($latestVersion),
            '='
        )){
            return 'SHOULD_UPGRADE';
        }

        return 'MUST_UPGRADE';

    }

    private function stripRevision($version)
    {
        [$major, $minor] = explode('.', $version);

        return implode('.', [$major, $minor]);
    }
}
