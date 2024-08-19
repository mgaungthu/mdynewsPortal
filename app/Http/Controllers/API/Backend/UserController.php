<?php

namespace App\Http\Controllers\API\Backend;
use App\Models\User;
use App\Models\Portal;
use App\Models\Role;
use App\Models\Permission;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('portal')->get();
        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         // Validate the incoming request data

         $validator =  \Validator::make($request->all(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'subdomain' => 'required|string|max:255|unique:users,subdomain',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'portal_name' => 'required|string|max:255',
                'portal_logo' => 'nullable|string|max:255', // Optional
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
             }


            //  return response()->json([
            //     'data' => [
            //         'fullname' => $request->firstname . ' ' . $request->lastname,
            //         'subdomain' => $request->subdomain,
            //         'email' => $request->email,
            //         'password' => bcrypt($request->password),
            //     ],
            //     'message' => "data ok",
            // ], 201);

        // // Create the user
        $fullname = $request->firstname . ' ' . $request->lastname;
     
        $user = User::create([
            'fullname' => $fullname,
            'subdomain' => $request->subdomain,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // // Create the associated portal
        $portal = Portal::create([
            'user_id' => $user->id,
            'title' => $request->portal_name,
            'logo' => $request->portal_logo, // Optional field
        ]);

        // // Retrieve default role (user)
        $defaultRole = Role::where('name', 'user')->first();

        // // Retrieve default permission (create-post)
        $defaultPermission = Permission::where('name', 'create-post')->first();

        // // Attach the default role and permission to the user
        $user->roles()->attach($defaultRole);
        $user->permissions()->attach($defaultPermission);

        // // Return the created user with portal, role, and permissions information
        return response()->json([
            'user' => $user,
            'portal' => $portal,
            'role' => $defaultRole,
            'permissions' => [$defaultPermission],
        ], 201); // 201 Created status
        
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
