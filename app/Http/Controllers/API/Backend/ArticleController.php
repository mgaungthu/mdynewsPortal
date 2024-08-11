<?php

namespace App\Http\Controllers\API\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Article;
use App\Models\Portal;
use App\Models\Category;


class ArticleController extends Controller
{

    protected $subdomain;
    protected $portal_id;

    public function __construct(Request $request)
    {
        $this->subdomain = $this->extractSubdomain($request);
        $this->portal_id = $this->getUserIdBySubdomain($this->subdomain);
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

        $this->portal_id;
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


    protected function extractSubdomain(Request $request)
    {
        // Assuming the subdomain is the first part of the host
        return explode('.', $request->getHost())[0];
    }


    protected function getUserIdBySubdomain($subdomain)
    {
        $user = User::where('subdomain', $subdomain)->first();
        $portal = Portal::where('user_id', $user->id)->first();

        return $portal ? $portal->id : null; // Return the user ID if found, or null if not
    }
}
