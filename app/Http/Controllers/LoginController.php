<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAuthRequest;
use  JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
include '../includes/login_unah.php';

class LoginController extends Controller

    
{

    public  $loginAfterSignUp = true;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $logins = Login::first();
        // echo json_encode($logins);

        // orderBy('id_login','desc')->take(1); 

        
        $logins = Login::all()->last();
        if($logins==null){
            $logins= new Login();
            $logins->cuenta='';
            $logins->nombre='';
            $logins->carrera='';
            $logins->centro='';
            $logins->numero_identidad='';
        }
        echo json_encode($logins);
    }

    public function ultimoIdLogin(){

        $si= DB::select('SELECT MAX(id_login) as ultimoId FROM logins');

        echo json_encode($si);
        
        
    }

    public function show($id_paciente)
    {


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->cuenta){

            if($request->input('password')!= null ){

                $nuevo_password = bcrypt($request->password);
    
                DB::table('logins')
                ->where('cuenta', $request->cuenta)
                ->update(['password' =>  $nuevo_password]);
            }

        }else{

            if($request->input('password')!= null ){

                $nuevo_password = bcrypt($request->password);
    
                DB::table('logins')
                ->where('id_login', $request->id_login)
                ->update(['password' =>  $nuevo_password]);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }

    public  function  register(Request  $request) {


		$cuenta = $request->input('cuenta');
        $password = $request->input('password');

        $alumno = accesoAlumno($cuenta, $password);
        
        $datos_login= new Login();
        
        $datos_login->cuenta = $alumno['cuenta'];
        $datos_login->nombre = $alumno['nombre'];
        $datos_login->carrera = $alumno['carrera'];
        $datos_login->centro = $alumno['centro'];
        $datos_login->numero_identidad = $alumno['numero_identidad'];
        $datos_login->imagen = $alumno['imagen'];
        $datos_login->password = bcrypt($request->password);
        $datos_login->save();

        if ($this->loginAfterSignUp) {
            return  $this->login($request);
        }

        return  response()->json([
            'status' => 'ok',
            'data' => $datos_login
        ], 200);
        
	}

    public  function  login(Request  $request) {

		$input = $request->only('cuenta', 'password');
        $jwt_token = JWTAuth::attempt($input);
        
		if ($jwt_token = JWTAuth::attempt($input)) {

            return  response()->json([
                'codigoError' => 0,
                'msg' => 'Todo bien',
                'token' => $jwt_token
            ]);

			
        } else{

            return  response()->json([
				'status' => 'invalid_credentials',
				'message' => 'Correo o contraseña no válidos.',
            ], 401);
            


        }
        

		
	}

	public  function  logout(Request  $request) {
		$this->validate($request, [
			'token' => 'required'
		]);

		try {
			JWTAuth::invalidate($request->token);
			return  response()->json([
				'status' => 'ok',
				'message' => 'Cierre de sesión exitoso.'
			]);
		} catch (JWTException  $exception) {
			return  response()->json([
				'status' => 'unknown_error',
				'message' => 'Al usuario no se le pudo cerrar la sesión.'
			], 500);
		}
	}

    public  function  getAuthUser(Request $request) {

		$this->validate($request, [
			'token' => 'required'
		]);

        $user = JWTAuth::authenticate($request->token);
        
		return  response()->json([

            'cuenta' => $user->cuenta,
            'nombre' => $user->nombre,
            'carrera' => $user->carrera,
            'numero_identidad' => $user->numero_identidad,
            'id_medico' => $user->id_medico,
            'id_administrador' => $user->id_administrador,

        ]);
    }

    
    
    // funcion que sirve para verificar si un usuario existe en la base de datos y si su contrasenia
    // es correcta, arrojando diferentes resultados segun sea el caso.
    public function obtenerUsuario(Request $request){

        $cuenta = $request->cuenta;
        $password = $request->password;

        //verifico si el numero de cuenta del usuario existe en la base de datos
        if($usuario = DB::table('logins')->where('cuenta', $cuenta)->first()){

            // si el usuario existe en la base de datos verifico si la contrasenia introducida es 
            // la correcta.
            if (Hash::check($password, $usuario->password)) {
    
                //si la contrasenia es la correcta se devuelve como resultado los datos completos del 
                //usuario en formato json.
                
                // return  response()->json(["codigoError"=>0, "msg"=> "eso mero"]);
                return $this->login($request);

                // $user = $this->getAuthUser($token);

                // return response()->json([
                //     'codigoError' => 0,
                //     'msg' => 'Todo bien',
                //     'token' => $jwt_token,
                //     // 'cuenta' => $user->cuenta,
                //     // 'nombre' => $user->nombre,
                //     // 'carrera' => $user->carrera,
                //     // 'numero_identidad' => $user->numero_identidad,
                //     // 'id_medico' => $user->id_medico,
                //     // 'id_administrador' => $user->id_administrador,

                // ]);
    
            }else{

                //si la contrasenia no es correcta la correcta, se devuelvo el siguiente
                // mensaje en formato json.
                return  response()->json(["codigoError" => 1, "msg"=> "clave incorrecta"]);
            }
                

        // si el numero de cuenta del usuario no se encuentra en la base de datos entonces se devuelve como
        // resultado null.
        } else{

            return  response()->json(["codigoError"=> 2, "msg"=> "el usuario no existe"]);

        }


    }

    public function verificarClave(Request $request){

        $cuenta = $request->cuenta;
        $password = $request->password;


        $usuario = DB::table('logins')->where('cuenta', $cuenta)->first();

        if(Hash::check($password, $usuario->password)){

            return response()->json([
                'codigoError' => 0,
                'msg' => 'todo bien'
            ]);
        } else {

            return response()->json([
                'codigoError' => 1,
                'msg' => 'Clave incorrecta'
            ]);
        }




    }


}
