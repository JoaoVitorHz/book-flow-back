<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends Controller
{
    // Regras para validação
    public $rules = [
        'name' => ['required', 'string', 'max:255','regex:/^[^\d]+$/'],
        'last_name' => ['required', 'string', 'max:255','regex:/^[^\d]+$/'],
        'email' => ['required', 'email', 'unique:user', 'max:255'],
        'phone' => ['required', 'string', 'min:11'],
        'cpf' => ['required', 'string', 'max:11', 'unique:user,cpf'],
        'password' => ['nullable', 'string', 'min:3'],
    ];

    // Mensagens de erro personalizadas
    public $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'name.string' => 'O campo nome deve ser uma string.',
        'name.max' => 'O campo nome não deve exceder 255 caracteres.',
        'name.regex' => 'O campo nome não deve conter números.',

        'last_name.required' => 'O campo sobrenome é obrigatório.',
        'last_name.string' => 'O campo sobrenome deve ser uma string.',
        'last_name.max' => 'O campo sobrenome não deve exceder 255 caracteres.',
        'last_name.regex' => 'O campo sobrenome não deve conter números.',
        
        'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        'email.unique' => 'Este e-mail já está cadastrado no sistema.',
        'email.max' => 'O campo e-mail não deve exceder 255 caracteres.',
        
        'phone.string' => 'O campo telefone deve ser uma string.',
        'phone.min' => 'O campo telefone deve ter pelo menos 11 caracteres.',
        
        'cpf.string' => 'O campo CPF deve ser uma string.',
        'cpf.max' => 'O campo CPF não deve exceder 11 caracteres.',
        'cpf.unique' => 'Este CPF já está em uso.',
        
        'cpf.required' => 'A senha é obrigatoria.',
        'cpf.min' => 'A senha dever ter pelo menos 3 caracteres.',
    ];
    
    public function CreateUser(Request $request){
        $validator = Validator::make( $request->all(), $this->rules, $this->messages );

        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'user_type' => $request['user_type'],
            'phone' => $request['phone'],
            'cpf' => $request['cpf'],
            'password' => password_hash($request['password'], PASSWORD_DEFAULT)
        ]);
        return $user;
    }

    public function GetUser(Request $request){
        $user = User::find($request['id']);
        return $user;
    }
    
    public function GetAllUser(Request $request){
        $users = User::all();
        return $users;
    }
    
    public function UpdateUser(Request $request){

        $rules = [
            'name' => ['required', 'string', 'max:255','regex:/^[^\d]+$/'],
            'last_name' => ['required', 'string', 'max:255','regex:/^[^\d]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'min:11'],
            'cpf' => ['required', 'string', 'max:11' ],
            'password' => ['nullable', 'string', 'min:3'],
        ];

        $validator = Validator::make( $request->all(), $rules, $this->messages );
         
        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }
        
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->cpf = $request['cpf'];
        $user->phone = $request['phone'];
        $user->save();

        return $user;
    }

    public function DeleteUser(Request $request){
        $user = User::find($request['id']);
        $user->delete(); 
        return $user;
    }

    public function Login(Request $request){
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3'],
        ];

        $messages = [
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'password.required' => 'Por favor, insira uma senha',
        ];

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

        $user = User::where('email', $request['email'])->get()->first();

        if(!$user){
            return response()->json(['errors' => 'Conta não encontrada!'], 401);
        }
        return $user;

        if (!password_verify($request['password'], $user['password'])) {
            return response()->json(['errors' => 'Senha invalida'], 401);
        } 

        return $user;
    }
}
