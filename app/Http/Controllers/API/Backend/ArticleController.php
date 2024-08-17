<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;

use App\Traits\SubdomainHandlerTrait;


use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Article;
use App\Models\Portal;
use App\Models\Category;


class ArticleController extends Controller
{

    use SubdomainHandlerTrait; 


    protected $subdomain;
    protected $portal_id;

    public function __construct(Request $request)
    {
        $this->subdomain =  $this->getSubdomain($request);
        $this->portal_id = $this->getPortalIdBySubdomain($this->subdomain);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $articles = Article::where('portal_id', $this->portal_id)->with('categories', 'comments')->get();

        return response()->json([
            'status' => true,
            'data' => $articles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        echo  $this->portal_id;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
