<?php 
use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

if (!function_exists('roles')) {

    function roles()
    {
        return Role::all();
    }
}
if (!function_exists('categorias')) {

    function categorias()
    {
        return Category::all();
    }
}
if (!function_exists('PreviewVideos')) {

    function PreviewVideos()
    {
        return Video::all()->take(3);
    }
}
if (!function_exists('countUser')) {

    function countUser()
    {
        return User::all()->count() == 0 ? null : User::all()->count() ;
    }
}
if (!function_exists('countVideos')) {

    function countVideos()
    {
        return Video::all()->count() == 0 ? null : Video::all()->count() ;
    }
}
if (!function_exists('countEstudiantes')) {

    function countEstudiantes()
    {
        $count=0;
        foreach(User::all() as $item){
            if($item->hasRole('Estudiantes')){
                $count++;
            }
        }
        return $count == 0 ? null : $count ;
    }
}
if (!function_exists('countProfesores')) {

    function countProfesores()
    {
        $count=0;
        foreach(User::all() as $item){
            if($item->hasRole('Profesor')){
                $count++;
            }
        }
        return $count == 0 ? null : $count ;
    }
}
if (!function_exists('chart')) {

    function chart($mes)
    {
        return User::whereMonth('created_at', $mes)->count();
    }
}
if (!function_exists('chartVideo')) {

    function chartVideo($mes)
    {
        return Video::whereMonth('created_at', $mes)->count();
    }
}
if (!function_exists('short_string')) {

    function short_string($str, $n = 10)
    {
        return Str::limit($str, $n, '...');
    }
}
