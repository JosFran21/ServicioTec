<?php

use App\myClasses\dbConnection;
use App\myClasses\logData;
use App\myClasses\Type;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/knowledge', function () {
    if(Type::isUser())
    {
        return view('User/knowledge');
    }
    elseif(Type::isSUser())
    {
        return view('SUser/knowledge');
    }
    else
    {
        return redirect('/');
    }
});
Route::post('/logIn', function () {


        if(logData::logIn($_POST['email'], $_POST['pass']))
        {       if(logData::getData('estado')==1)
                    return redirect('/dashboard');
                else
                    return redirect('/?noaprobada');
        }
        return redirect('/?error=signin');
    
    
});
Route::get('/dashboard', function () {
    if(Type::isUser())
    {
        return view('User/index');
    }
    elseif(Type::isSUser())
    {
        return view('SUser/index');
    }
    else
    {
        return redirect('/');
    }
});

Route::get('/tickets', function () {
    if(Type::isUser())
    {
        return view('User/tickets');
    }
    elseif(Type::isSUser())
    {
        return view('SUser/tickets');
    }
    else
    {
        return redirect('/');
    }
});
Route::get('dashboard/userProfile', function () {
    if(Type::isUser())
    {
        return view('User/userProfile');
    }
    elseif(Type::isSUser())
    {
        return view('SUser/userProfile');
    }
    else
    {
        return redirect('/');
    }
});

Route::get('/inventario', function () {
    if(Type::isSUser())
    {
        return view('SUser/inventario');
    }
    else
    {
        return redirect('/');
    }
});

Route::get('/logOut', function () {
    logData::logOut();
    return redirect('/');
});
Route::POST('/ajaxRegistro' /* Registro de Usuario*/, function() {

        $cipher_pass = hash("sha256", $_POST['pass']);
        dbConnection::insert("users",
            ['email', 'password', 'nombre', 'email', 'apellido', 'cel', 'tel', 'ext', 'areaTrabajo', 'trabajo', 'id_region','estado'],
            [[$_POST['email'], $cipher_pass, $_POST['pass'], $_POST['name'], $_POST['last'], $_POST['cell'], $_POST['tel'], $_POST['ext']==""?null:$_POST['area'], $_POST['work'], $_POST['country'], '0']]
            );
        $idEmpleado = dbConnection::lastID();
        var_dump($idEmpleado);
        dbConnection::insert("mortals", ["id_usuario","estado"], [[$idEmpleado,'0']]);
        return $idEmpleado;
});



Route::POST('/registrar' /* Registro de Usuario*/, function() {

        $cipher_pass = hash("sha256", $_POST['pass']);
        var_dump($_POST);
        dbConnection::insert("users",
            ['email', 'password', 'nombre','apellido', 'cel', 'tel', 'ext', 'areaTrabajo', 'trabajo', 'id_region','estado'],
            [[$_POST['email'], $cipher_pass, $_POST['name'], $_POST['last'], $_POST['cell'], $_POST['tel'], $_POST['ext'],$_POST['area'], $_POST['work'], $_POST['country'], '0']]
            );
        $idEmpleado = dbConnection::lastID();
        dbConnection::insert("mortals", ["id_usuario","estado"]);
        return redirect('/');
});



Route::POST('/knowledgeregistro' /* Registro de knwoledge*/, function() {

        dbConnection::insert("knowledge",
            ['titulo', 'info', 'id_superuser','tema'],
            [[$_POST['titulo'], $_POST['info'], $_POST['id'], $_POST['tema']]]
            );
        return view('SUser/knowledge');
});


Route::get('/Usuarios', function () {
  return view('SUser/peticiones');
});

Route::POST('/ajaxAP' /* Admin alta pendiente*/, function() {
if(Type::isSUser())
    {
    dbConnection::update("mortals",
                ['estado'],
                ['1'],
                [['mortals.id_usuario', $_POST['ID']]]
            );
    dbConnection::update("users",
                ['estado'],
                ['1'],
                [['users.id', $_POST['ID']]]
            );     
    
      }
    else{
        return 0;
    }

});

Route::POST('/ajaxAdmin' /* Admin da alta admin*/, function() {
var_dump($_POST);
if(Type::isSUser())
    {
     dbConnection::RAW("INSERT INTO superusers (id_usuario) values(".$_POST['ID'].")");   
    dbConnection::delete("mortals",
                [['mortals.id_usuario', $_POST['ID']]]
            );  
      }
    else{
        return 0;
    }

});

Route::POST('/ajaxAR' /* Admin alta rechazado*/, function() {
if(Type::isSUser())
    {
    dbConnection::update("mortals",
                ['estado'],
                ['1'],
                [['mortals.id_usuario', $_POST['ID']]]
            );    
    
      
    dbConnection::update("users",
                ['estado'],
                ['1'],
                [['users.id', $_POST['ID']]]
            );     
    
      }
    else{
        return 0;
    }

});

Route::POST('/ajaxAeP' /* Admin elimina pendiente*/, function() {
if(Type::isSUser())
    {
    dbConnection::update("mortals",
                ['estado'],
                ['0'],
                [['mortals.id_usuario', $_POST['ID']]]
            );    
    
      }
    else{
        return 0;
    }

});
