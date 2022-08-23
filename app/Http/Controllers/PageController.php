<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class PageController extends Controller
{

    public function home()
    {


        return view("welcome");

    }

    public function export(Workout $workout)
    {
    
       
        $pdf = PDF::loadView('download', ['workouts' => $workout])->setPaper('a4', 'landscape');
     
        return $pdf->download('Plan_Entrenamiento_'.$workout->start_date.' '.$workout->end_date.'.pdf');
    }


    public function storecomment(Workout $workout, Request $request)
    {

        $request->validate([

            'comments_athlete' => 'required'


        ]);



        $workout->update([


            'comments_athlete' => $request->comments_athlete

        ]);


        return redirect()->back();

    }

    public function search(User $atletas, Request $request)
    {

        $search = $request->search;
        $usuario=Auth::user();

        $atletas=User::where('coach','=',$usuario->id)
                 ->where('name','LIKE','%'.$search.'%')
                 ->latest()
                 ->get();

    
        return view("dashboard", ['usuario' => $usuario, 'atletas' => $atletas, 'search' => $search]);

    }
    public function dashboard(User $atletas, Workout $workouts) 
    {

        $usuario=Auth::user();

        if (is_null($usuario->coach))
        {

          $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();
     
          return view("dashboard", ['usuario' => $usuario, 'atletas' => $atletas, 'search' => '']); //Es coach

        }
        else
        {
          
          $workouts=Workout::where('athlete','=',$usuario->id)->orderBy('start_date','desc')->take(12)->get();  
          return view("athlete",['workouts' => $workouts]); //Es atleta
        }
    }


    public function workouts(Workout $workouts, $atleta = null)
    {
        
        $usuario=Auth::user();
        
        if (is_null($atleta))
           $workouts=Workout::where('coach','=',$usuario->id)->latest()->paginate();
        else 
           $workouts=Workout::where('coach','=',$usuario->id)->where('athlete','=',$atleta)->latest()->paginate();

        return view("coach/workouts",['workouts' => $workouts]);


    }



    public function workout(Workout $workout)
    {

        return view("workout", ['workout' => $workout]);

    }

    public function editWorkout(Workout $workout)
    {

        $usuario=Auth::user();
        $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();
        
        return view("coach/editWorkout", ['workout' => $workout, 'atletas' => $atletas]);

    }

    public function createWorkout(Workout $workout)
    {

        $usuario=Auth::user();
        $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();
        return view("coach/createWorkout", ['workout' => $workout, 'atletas' => $atletas]);

    }

    public function duplicate(Workout $workout)
    {

        $usuario=Auth::user();

        $workout = Workout::find($workout->id);
        $newWorkout = $workout->replicate();
        $newWorkout->athlete = NULL;
        $newWorkout->save();

        
        $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();
        
        return view("coach/editWorkout", ['workout' => $newWorkout, 'atletas' => $atletas]);

    } 



    public function storeworkout(Request $request)
    {

        $usuario=Auth::user();

        $request->validate([

            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'athlete' => 'required',
            'training_monday' => 'nullable',
            'training_tuesday' => 'nullable',
            'training_wednesday' => 'nullable',
            'training_thursday' => 'nullable',
            'training_friday' => 'nullable',
            'training_saturday' => 'nullable',
            'training_sunday' => 'nullable',
            'comments_coach' => 'nullable'

        ]);


        $workout=Workout::create([

            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coach' => $usuario->id,
            'athlete' => $request->athlete,
            'training_monday' => $request->training_monday,
            'training_tuesday' => $request->training_tuesday,
            'training_wednesday' => $request->training_wednesday,
            'training_thursday' => $request->training_thursday,
            'training_friday' => $request->training_friday,
            'training_saturday' => $request->training_saturday,
            'training_sunday' => $request->training_sunday,
            'comments_coach' => $request->comments_coach,


        ]);


        return redirect()->route('dashboard');

        
    }

    public function updateworkout(Workout $workout, Request $request)
    {

        $usuario=Auth::user();
        
        $request->validate([

            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'athlete' => 'required',
            'training_monday' => 'nullable',
            'training_tuesday' => 'nullable',
            'training_wednesday' => 'nullable',
            'training_thursday' => 'nullable',
            'training_friday' => 'nullable',
            'training_saturday' => 'nullable',
            'training_sunday' => 'nullable',
            'comments_coach' => 'nullable'

        ]);

        $workout->update([

            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'coach' => $usuario->id,
            'athlete' => $request->athlete,
            'training_monday' => $request->training_monday,
            'training_tuesday' => $request->training_tuesday,
            'training_wednesday' => $request->training_wednesday,
            'training_thursday' => $request->training_thursday,
            'training_friday' => $request->training_friday,
            'training_saturday' => $request->training_saturday,
            'training_sunday' => $request->training_sunday,
            'comments_coach' => $request->comments_coach,


        ]);
       
        return back();

    }

 

    public function deleteWorkout(Workout $workout)
    {

        $usuario=Auth::user();
        $workout->where('id','=',$workout->id)->where('coach','=',$usuario->id)->delete();

        return back();
        
    }

    public function createAthlete(User $user)
    {

        
        return view("coach/createAthlete", ['user' => $user]);

    }


    public function editAthlete (User $user)
    {



        return view("coach/editAthlete", ['user' => $user]);


    }


    public function deleteAthlete (User $user)
    {

        $usuario=Auth::user();

        Workout::where('athlete','=',$user->id)->where('coach','=',$usuario->id)->delete();
        $user->where('id','=',$user->id)->where('coach','=',$usuario->id)->delete();
        

        return back();

    }


    public function storeathlete(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:6144',
            'notes' => 'nullable'
        ]);

        
        if (!is_null($request->image))
        {

            /* 
            LA IMAGEN SE GUARDA EN storage\app\public\img 
             LUEGO LA MUESTRO COMO {{ url('storage/'.$gift->image) }}
            */
            $image_path = $request->file('image')->store('img', 'public');
        }
        else 
          $image_path = NULL;


        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image_path,
            'notes' => $request->notes,
            'coach' => Auth::user()->id,

        ]);

        
        return redirect()->route('dashboard');

    }

}
