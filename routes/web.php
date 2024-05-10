<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NumeroVisitasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;






Route::middleware(['log.visits'])->group(function () {

    //RUTAS PRINCIPALES LAS CUALES SE PODRAN VER CUALES SE VISITAN
    Route::get('/', function () {
        return view('Prueba');
    })->name('inicio');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/store', function () {
        return view('store');
    })->middleware(['auth', 'verified'])->name('store');

    Route::get('/forum', function () {
        return view('forum');
    })->middleware(['auth', 'verified'])->name('forum');

    Route::get('/homepage', function () {
        return view('homepage');
    })->middleware(['auth', 'verified'])->name('homepage');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

});

//RUTAS DEL FOOTER DE POLITICA Y PRIVACIDAD ETC
Route::middleware('auth')->group(function () {
    Route::get('/privacy-policy', function () {
        return view('pages.privacy-policy');
    })->name('privacy-policy');

    Route::get('/terms-of-service', function () {
        return view('pages.terms-of-service');
    })->name('terms-of-service');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');
    Route::post('/contact', [ContactController::class, 'sendContactEmail'])->name('send.contact.email');
});

//RUTAS DE USUARIOS
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile',  [ProfileController::class, 'image_update'])->name('profile.image');
    Route::get('/perfil/{id}',  [ProfileController::class, 'perfil'])->name('perfil');
    Route::get('/profiles/{search?}', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/language/set', [ProfileController::class, 'language'])->name('language.set');
});

require __DIR__ . '/auth.php';

//RUTAS DE IMAGENES
Route::middleware('auth')->group(function () {
    Route::get('/user/avatar/{filename}', [ProfileController::class, 'getImage'])->name('user.avatar');
    Route::get('/imagen', [ImageController::class, 'create'])->name('image.create');
    Route::post('/image/save',  [ImageController::class, 'save'])->name('image.save');
    Route::get('/show', [ImageController::class, 'show'])->name('image.show');
    Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
    Route::get('/detail{id}', [ImageController::class, 'detail'])->name('image.detail');
    Route::get('/image/delete/{id}',  [ImageController::class, 'delete'])->name('image.delete');
    Route::get('/image/edit/{id}',  [ImageController::class, 'edit'])->name('image.edit');
    Route::post('/image/update',  [ImageController::class, 'update'])->name('image.update');
});

//RUTAS DE COMENTARIOS
Route::middleware('auth')->group(function () {
    Route::post('/comment/save',  [CommentController::class, 'save'])->name('comment.save');
    Route::get('/comment/save',  [CommentController::class, 'save'])->name('comment');
    Route::get('/comment/delete/{id}',  [CommentController::class, 'delete'])->name('comment.delete');
});

//RUTAS DE LIKES
Route::middleware('auth')->group(function () {
    Route::get('/like/{image_id}',  [LikeController::class, 'like'])->name('like.save');
    Route::get('/dislike/{image_id}',  [LikeController::class, 'dislike'])->name('dislike.save');
    Route::get('/likes', [LikeController::class, 'index'])->name('likes');
});

//RUTAS DE LA TIENDA
Route::middleware('auth')->group(function () {
Route::post('/store/save',  [StoreController::class, 'save'])->name('store.save');
Route::get('/store/show', [StoreController::class, 'show'])->name('store.show');
Route::get('/store/file/{filename}', [StoreController::class, 'getImage'])->name('store.file');
Route::get('/store/detalles{id}', [StoreController::class, 'detail'])->name('store.detalles');
Route::get('store/compras', [PedidosController::class, 'compras'])->name('store.compras');
});

//RUTAS DEL CARRITO/CART
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('store.checkout');
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart/removeitem', [CartController::class, 'removeItem'])->name('cart.removeitem');
    Route::post('/cart/comprar', [CartController::class, 'comprar'])->name('cart.comprar');
});

//RUTAS DEL ADMINISTRADOR
Route::middleware(['auth', 'admin', AdminMiddleware::class])->group(function () {
    // Ruta para listar y borrar usuarios
    Route::get('/admin/borrar-usuarios', [AdminController::class, 'mostrarUsuarios'])->name('admin.borrar-usuarios');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
     //Ruta para crear un PDF con el listado de usuarios
     Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.report');
    // Ruta para crear tiendas, accesible solo para administradores
    Route::get('/store/crear', [StoreController::class, 'crear'])->name('store.crear');
    //Ruta para las visitas
    Route::get('/numero-visitas', [NumeroVisitasController::class, 'mostrar'])
        ->name('admin.numero-visitas')
        ->middleware('log.visits');
    //El Super admin puedes cambiar el valor de admin de los demas
    Route::put('/admin/toggle-admin/{id}', [AdminController::class, 'toggleAdmin'])->name('admin.toggle-admin');
    
});
