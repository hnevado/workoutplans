<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use Mail;
 
use App\Mail\NotifyWorkout;
use App\Mail\NotifyRegister;
use App\Mail\NotifyUpdate;

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
        //Si soy el coach o el athleta, te dejo ver el workout
        if ($workout->coach == Auth::user()->id || $workout->athlete == Auth::user()->id) 
        {
            //Para saber si quien está viendo el detalle del workout es el coach o el atleta.
            //Si es el coach no quiero que pueda enviar feedback.
            if ($workout->coach == Auth::user()->id)
             $isCoach=true;
            else
             $isCoach=false;


          return view("workout", ['workout' => $workout, 'isCoach' => $isCoach]);
        }
        abort(403);
    }

    public function editWorkout(Workout $workout)
    {

        $usuario=Auth::user();
        $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();


        if ($workout->coach == Auth::user()->id) 
            return view("coach/editWorkout", ['workout' => $workout, 'atletas' => $atletas]);

        abort(403);
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

        if ($workout->coach == Auth::user()->id) 
        {
            $workout = Workout::find($workout->id);
            $newWorkout = $workout->replicate();
            $newWorkout->athlete = NULL;
            $newWorkout->save();

            
            $atletas=User::where('coach','=',$usuario->id)->orderBy('name', 'asc')->latest()->get();
            
            return view("coach/editWorkout", ['workout' => $newWorkout, 'atletas' => $atletas]);
        }

        abort(403);

    } 


    public function storefeedbackmonday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_monday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_monday' => $request->feedback_monday
            ]);

            return back();
         }
         else 
           abort(403);


    }

    public function storefeedbacktuesday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_tuesday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_tuesday' => $request->feedback_tuesday
            ]);

            return back();
         }
         else 
           abort(403);


    }

    public function storefeedbackwednesday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_wednesday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_wednesday' => $request->feedback_wednesday
            ]);

            return back();
         }
         else 
           abort(403);


    }

    public function storefeedbackthursday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_thursday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_thursday' => $request->feedback_thursday
            ]);

            return back();
         }
         else 
           abort(403);


    }


    public function storefeedbackfriday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_friday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_friday' => $request->feedback_friday
            ]);

            return back();
         }
         else 
           abort(403);


    }


    public function storefeedbacksaturday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_saturday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_saturday' => $request->feedback_saturday
            ]);

            return back();
         }
         else 
           abort(404);


    }


    public function storefeedbacksunday(Request $request, Workout $workout)
    {


        if ($workout->athlete == Auth::user()->id) 
        {
            $request->validate([

                'feedback_sunday' => 'required|numeric'

            ]);

            $workout->update([
                'feedback_sunday' => $request->feedback_sunday
            ]);

            return back();
         }
         
        
         abort(403);


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

        $email_usuario=User::where('id','=',$request->athlete)->first();

        Mail::to($email_usuario->email)->send(new NotifyWorkout());

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


        if ($user->coach == Auth::user()->id) 
          return view("coach/editAthlete", ['user' => $user]);

        abort(404);
    }


    public function deleteAthlete (User $user)
    {

        $usuario=Auth::user();

        Workout::where('athlete','=',$user->id)->where('coach','=',$usuario->id)->delete();
        $user->where('id','=',$user->id)->where('coach','=',$usuario->id)->delete();
        

        return back();

    }

    public function profile(User $user)
    {


        return view("profile", ['user' => $user]);

    }

    public function newCoach($email,$idCoach)
    {
        
        $email_atleta = base64_decode($email);
        $idCoach = base64_decode($idCoach);

        $coach=User::where('id',$idCoach)->value('name');

        if (Auth::user()->email === $email_atleta)
          return view("newcoach",['email_atleta' => $email_atleta, 'coach' => $coach]);

        abort(403);

    }
    public function updateathlete(User $user, Request $request)
    {

        if ($user->coach == Auth::user()->id)
        {
         
            /* 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:6144', */
            $request->validate([

                'name' => 'required',
                'email' => 'required|unique:users,email,'.$user->id,
                'notes' => 'nullable'

            ]);
            /*
            if (!is_null($request->image))
            {

                $image_path = $request->file('image')->store('img', 'public');
            }
            else 
            $image_path = NULL;
            */
            $image_path = NULL;

            if (is_null($request->password))
            {

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $image_path,
                    'notes' => $request->notes,
                ]);

            }
            else
            {
                //Ha actualizado su contraseña y le enviamos un email con sus nuevas credenciales
                $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'image' => $image_path,
                        'notes' => $request->notes,
                    ]);
                
                    $mailData = [
                        'email' => $request->email,
                        'password' => $request->password
                    ];

                    Mail::to($request->email)->send(new NotifyUpdate($mailData));

            }

       }

       return redirect()->route('dashboard');


    }

    public function storeathlete(Request $request)
    {
        /*'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:6144',*/

       /* if (!is_null($request->image))
        {

            // LA IMAGEN SE GUARDA EN storage\app\public\img  y LUEGO LA MUESTRO COMO {{ url('storage/'.$gift->image) }}
            $image_path = $request->file('image')->store('img', 'public');
        }
        else 
          $image_path = NULL;
        */

        if (User::where('email', $request->email)->exists()) {
            //Si ya existe, se le solicita que cambie de coach

             return view("changecoach", ['name' => $request->name, 'email' => $request->email, 'coach' => Auth::user()->id]);
        }
        else 
        {
            $request->validate([

                'name' => 'required',
                'email' => 'required|unique:users,email',
                'notes' => 'nullable'
            ]);

            $image_path=NULL;
            $password=fake()->password();

            $user = User::create([

                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'image' => $image_path,
                'notes' => $request->notes,
                'coach' => Auth::user()->id,

            ]);

            $mailData = [
                'email' => $request->email,
                'password' => $password
            ];

            Mail::to($request->email)->send(new NotifyRegister($mailData));

            return redirect()->route('dashboard');
       }
    }


    

}
