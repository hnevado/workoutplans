<html>
    <head>
        <title>Plan de entrenamiento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <style>
            .mb-8 {margin-bottom: 2rem;}
            .p-2 {padding: 0.5rem; width:12.67%;display:inline-block;vertical-align:top; word-break:break-all; overflow:hidden; height:525px;}
            .wrapper {width:100%;}
            * { font-family:"DejaVu Sans"; sans-serif; font-size:12.5px;}
            .uppercase {text-transform:uppercase; font-size:14px;}
            .bg-gray-100 {background-color: rgb(243 244 246);}
            .mb-12 {margin-bottom:2.5rem;}
            .padding-2 {padding:0.5rem;}
            .text-center {text-align:center};
            .border {border-width: 1px;}
            .mt-2 {margin-top:0.5rem;}
            .font-bold {font-weight:bold;}
        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="mb-12 border padding-2 text-center" style="background-color: rgb(248 250 252);">
        
            <p class="mb-2 mt-2 font-bold uppercase">
               Entrenamiento del {{date("d-m",strtotime($workouts->start_date))}} al {{date("d-m",strtotime($workouts->end_date))}}
            </p>
                
            <p class="mt-4 mb-2"> {{$workouts->comments_coach}} </p>
        
        </div>

                    <div style="background-color: rgb(255 237 213);" class="p-2 mb-8"> 
                       <h2 class="uppercase font-bold text-xl">Lunes</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_monday)) !!}
                     </div>
                    
                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Martes</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_tuesday)) !!}
                     </div>

                     <div style="background-color: rgb(255 237 213);" class="mb-8 p-2"> 
                       <h2 class="uppercase font-bold text-xl">Miércoles</h2>
                       <hr class="mb-4"/>
                      {!! nl2br(e($workouts->training_wednesday)) !!} 
                     </div>

                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Jueves</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_thursday)) !!}
                     </div>


                     <div style="background-color: rgb(255 237 213);" class="mb-8 p-2"> 
                       <h2 class="uppercase font-bold text-xl">Viernes</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_friday)) !!}
                     </div>


                     <div class="mb-8 p-2 bg-gray-100"> 
                       <h2 class="uppercase font-bold text-xl">Sábado</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_saturday)) !!}
                     </div>




                     <div style="background-color: rgb(255 237 213);" class="mb-8 p-2"> 
                       <h2 class="uppercase font-bold text-xl">Domingo</h2>
                       <hr class="mb-4"/>
                       {!! nl2br(e($workouts->training_sunday)) !!}
                     </div>



                    </div>

    </body>
 </html>