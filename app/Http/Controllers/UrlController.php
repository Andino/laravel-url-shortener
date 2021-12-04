<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlFormRequest;
use App\Http\Resources\UrlResource;
use App\Jobs\UrlNameJob;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * New Url model instance
    */
    protected $url;
    /**
     * Instantiate a new controller instance.
     *
     * @param Url $url
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = $this->url->orderBy('visits', 'DESC')->limit(100)->get();
        return UrlResource::collection($urls);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UrlFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UrlFormRequest $request)
    {
        $url = $this->url->fill($request->all());
        $url->shorter_url = url('') . "/shorter-url/" . Str::random(10);
        $url->save();

        UrlNameJob::dispatch($url->id);

        return new UrlResource($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formated_url = url('') . "/shorter-url/" .  $id;
        $url = $this->url->where("shorter_url", $formated_url)->first();
        if (!isset($url)) {
            return response()->json(["Message" => "Url not found in the database"]);
        }
        $urlRecord = $this->url->find($url->id);
        $urlRecord->visits = $urlRecord->visits + 1;
        $urlRecord->save();

        return redirect()->to($url->url);
    }
}
