<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 12/5/18
 * Time: 10:48 PM
 *
 */

namespace App\Http\Controllers;


use App\Jobs\LocationUpdate;
use App\LocationData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class LocationController extends Controller
{

    public function collect(Request $request)
    {
        try {
            $this->validate($request, [
                'id'        => 'required',
                'lat'       => 'required',
                'lng'       => 'required',
                'elevation' => 'required'
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        $locationData = new LocationData(
            $request->get('id'),
            $request->get('lat'),
            $request->get('lng'),
            $request->get('elevation')
        );

        Queue::push(new LocationUpdate($locationData));

        return new Response('', HttpResponse::HTTP_CREATED);
    }
}
