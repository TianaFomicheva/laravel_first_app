<?php

use \Illuminate\Http\Request;

Route::get('/', function () {
    $tasks = \App\Task::OrderBy('created_at', 'desc')->get();
    
    return view('task',['tasks'=>$tasks]);
});



Route::post('/task', function(Request $request){
   
    $validator =Validator::make($request->all(),[
        'name=>required|max255'
    ]);
    if($validator->fails()){
        return redirect( '/')
        ->withInput()
        ->withErrors($validator);
                          
    }
    
     $task= new \App\Task;
        $task->name = $request->name;
        $task->save();
        
    return Redirect::to('/');

});

Route::delete('/task/{task}', function (\App\Task $task) {
    $tasks->delete();
    
    return redirect('/');
});



