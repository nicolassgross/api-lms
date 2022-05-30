<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserLms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    
    public function login(Request $request) { 
        
        $rules = array(
            'cd_cliente' => 'required',
            'ds_login' => 'required',
            'ds_senha' => 'required'
        );
       
        $validator=Validator::make($request->all(),$rules);
            if($validator->fails())
            {
                return 'Faltou algum campo';
            }

        $cd_cliente = $request->input('cd_cliente');
        $ds_login = $request->input('ds_login');
        $ds_senha = $request->input('ds_senha');
        
        $user = UserLms::where([
            ['cd_cliente', '=', $cd_cliente],
            ['ds_login', '=', $ds_login],
        ])->first();

        if ($user == null) {
            return response()->json([
                "success" => false,
                "message" => 'Credenciais inválidas!',
            ], 401); 
        }
        
        $auth = Hash::check($ds_senha, $user->ds_senha);
        $ok = password_verify($ds_senha, $user->ds_senha);
        $token = JWTAuth::fromUser($user);
        
        if($ok == false && $auth == false) {
            return response()->json([
                "success" => false,
                "message" => 'Credenciais inválidas!',
            ], 401);  
        }
        
        return response()->json([
            "success" => true,
            "message" => 'Autenticado com sucesso!',
            "data" => 
                [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'user' => $user
                ] 
        ]);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $ds_senha = $request->input('ds_senha');
        $validator = Validator::make($request->all(), [
            'cd_cliente' => 'required|integer',
            'ds_nome' => 'required|string',
            'ds_login' => 'required|string',
            'ds_senha' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(array(
                "success" => true,
                "status" => 400,
                "message" => 'Usuário registrado com sucesso',
                "error" => 'Faltou algum campo'
            ));
        }

        $user = UserLms::create(array_merge(
            $validator->validated(),
            ['ds_senha' => Hash::make($ds_senha)]
        ));

        return response()->json([
            "success" => true,
            "status" => 201,
            "message" => 'Usuário registrado com sucesso',
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => '',
            'message' => 'Usuário deslogado com sucesso']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile(Request $request)
    {
        $pessoa = $request->route('cd_pessoa');;

        $response = UserLms::where('cd_pessoa', $pessoa)->first();
        
        return response()->json(['data'=>$response],200);
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    
}