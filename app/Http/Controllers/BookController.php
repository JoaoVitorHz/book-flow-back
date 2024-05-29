<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
      // Regras para validação
      public $rules = [
        'title' => ['required', 'string', 'max:255'],
        'synopsis' => ['required', 'string', 'max:255'],
        'author' => ['required', 'string', 'max:255'],
        'publisher' => ['required', 'string', 'max:255'],
        'price' => ['required', 'string'],
    ];

    // Mensagens de erro personalizadas
    public $messages = [
        'title.required' => 'O campo nome é obrigatório.',
        'title.max' => 'O campo nome não deve exceder 255 caracteres.',

        'synopsis.required' => 'O campo sobrenome é obrigatório.',
        'synopsis.max' => 'O campo sobrenome não deve exceder 255 caracteres.',
        
        'author.required' => 'O campo autor é obrigatório.',
        'author.author' => 'O campo e-mail deve ser um endereço de e-mail válido.',
        'author.max' => 'O campo e-mail não deve exceder 255 caracteres.',
        
        'publisher.required' => 'O campo editora é obrigatorio.',
        'publisher.max' => 'O campo editora não deve exceder 255 caracteres.',
        
        'price.required' => 'O preço é obrigatorio.',
    ];
    
    public function CreateBook(Request $request){
        $validator = Validator::make( $request->all(), $this->rules, $this->messages );

        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }

        $book = Book::create([
            'title' => $request['title'],
            'synopsis' => $request['synopsis'],
            'author' => $request['author'],
            'publisher' => $request['publisher'],
            'price' => $request['price'],
        ]);
        return $book;
    }

    public function GetBook(Request $request){
        $book = Book::find($request['id']);
        return $book;
    }
    
    public function GetAllBook(Request $request){
        $books = Book::all();
        return $books;
    }
    
    public function UpdateBook(Request $request){

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string'],
        ];

        $validator = Validator::make( $request->all(), $rules, $this->messages );
         
        if ($validator->fails()) {
            return response()->json( [ 'errors' => $validator->errors()->first() ], 400);
        }
        
        $book = Book::find($request['id']);
        $book->title = $request['title'];
        $book->synopsis = $request['synopsis'];
        $book->author = $request['author'];
        $book->publisher = $request['publisher'];
        $book->price = $request['price'];
        $book->save();

        return $book;
    }

    public function DeleteBook(Request $request){
        $book = Book::find($request['id']);
        $book->delete(); 
        return $book;
    }
}
