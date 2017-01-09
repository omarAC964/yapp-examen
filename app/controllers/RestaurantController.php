<?php
use Illuminate\Http\Request;

class RestaurantController extends Controller {

    protected $layout = '\App\views\layout';
    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        if(count($restaurants) == 0){
            $lol = "sinrestaurant";
            return $this->layout = View::make('restaurant.create', compact('lol'));
        }else {
            return $this->layout = View::make('restaurant.index',compact('restaurants'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->layout = View::make('restaurant.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
         var_dump(Input::get('tdia'));
        /*echo Input::get('direccion');
         echo Input::get('telefono');*/
        $rules = array(
            'nombre_restaurante'  => 'required',
            'direccion' => 'required',
            'telefono'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('restaurant.create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $rest = new Restaurant();
            $rest->nombre_restaurante = Input::get('nombre_restaurante');
            $rest->direccion = Input::get('direccion');
            $rest->telefono = Input::get('telefono');
            $rest->save();
            $lunes = new DiasTrabajo();
            $lunes->dia = "Lunes";
            $lunes->hora_inicio = Input::get('al');
            $lunes->hora_fin = Input::get('cl');
            $lunes->restaurants_id = $rest->id;
            $lunes->save();
            $martes = new DiasTrabajo();
            $martes->dia = "Martes";
            $martes->hora_inicio = Input::get('am');
            $martes->hora_fin = Input::get('cm');
            $martes->restaurants_id = $rest->id;
            $martes->save();
            $miercoles = new DiasTrabajo();
            $miercoles->dia = "Miercoles";
            $miercoles->hora_inicio = Input::get('amm');
            $miercoles->hora_fin = Input::get('cmm');
            $miercoles->restaurants_id = $rest->id;
            $miercoles->save();
            $jueves = new DiasTrabajo();
            $jueves->dia = "Jueves";
            $jueves->hora_inicio = Input::get('aj');
            $jueves->hora_fin = Input::get('cj');
            $jueves->restaurants_id = $rest->id;
            $jueves->save();
            $viernes = new DiasTrabajo();
            $viernes->dia = "Viernes";
            $viernes->hora_inicio = Input::get('aj');
            $viernes->hora_fin = Input::get('cj');
            $viernes->restaurants_id = $rest->id;
            $viernes->save();
            $sabado = new DiasTrabajo();
            $sabado->dia = "Sabado";
            $sabado->hora_inicio = Input::get('as');
            $sabado->hora_fin = Input::get('cs');
            $sabado->restaurants_id = $rest->id;
            $sabado->save();
            $domingo = new DiasTrabajo();
            $domingo->dia = "Domingo";
            $domingo->hora_inicio = Input::get('ad');
            $domingo->hora_fin = Input::get('cd');
            $domingo->restaurants_id = $rest->id;
            $domingo->save();

            return Redirect::route('restaurant.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $restaurante = Restaurant::find($id);

        return $this->layout = View::make('restaurant.show',compact('restaurante'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $restaurante = Restaurant::find($id);
        return $this->layout = View::make('restaurant.edit',compact('restaurante'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rules = array(
            'nombre_restaurante'  => 'required',
            'direccion' => 'required',
            'telefono'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('restaurant.create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {

            $rest = Restaurant::find($id);
            $rest->nombre_restaurante = Input::get('nombre_restaurante');
            $rest->direccion = Input::get('direccion');
            $rest->telefono = Input::get('telefono');
            $rest->save();
            $lunes = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Lunes');
            $lunes->dia = "Lunes";
            $lunes->hora_inicio = Input::get('al');
            $lunes->hora_fin = Input::get('cl');
            $lunes->restaurants_id = $rest->id;
            $lunes->save();
            $martes = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Martes');
            $martes->dia = "Martes";
            $martes->hora_inicio = Input::get('am');
            $martes->hora_fin = Input::get('cm');
            $martes->restaurants_id = $rest->id;
            $martes->save();
            $miercoles = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Miercoles');
            $miercoles->dia = "Miercoles";
            $miercoles->hora_inicio = Input::get('amm');
            $miercoles->hora_fin = Input::get('cmm');
            $miercoles->restaurants_id = $rest->id;
            $miercoles->save();
            $jueves = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Jueves');
            $jueves->dia = "Jueves";
            $jueves->hora_inicio = Input::get('aj');
            $jueves->hora_fin = Input::get('cj');
            $jueves->restaurants_id = $rest->id;
            $jueves->save();
            $viernes = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Viernes');
            $viernes->dia = "Viernes";
            $viernes->hora_inicio = Input::get('aj');
            $viernes->hora_fin = Input::get('cj');
            $viernes->restaurants_id = $rest->id;
            $viernes->save();
            $sabado  = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Sabado');
            $sabado->dia = "Sabado";
            $sabado->hora_inicio = Input::get('as');
            $sabado->hora_fin = Input::get('cs');
            $sabado->restaurants_id = $rest->id;
            $sabado->save();
            $domingo = DiasTrabajo::where('restaurants_id',$rest->id)->where('dia','Domingo');
            $domingo->dia = "Domingo";
            $domingo->hora_inicio = Input::get('ad');
            $domingo->hora_fin = Input::get('cd');
            $domingo->restaurants_id = $rest->id;
            $domingo->save();

            return Redirect::route('restaurant.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Restaurant::find($id)->delete();
        return Redirect::route('restaurant.index')
            ->with('success','El Restairant se elimino correctamente');
    }

    public function abiertos(){
        $restaurantes = Restaurant::whereHas('dias', function($q)
        {
            $q->where('hora_inicio', '<=', date('H:i:s'))->where('hora_fin', '>=', date('H:i:s'));

        })->get();
        
        return View::make('restaurantesAbiertos', compact('restaurantes'));
    }
}
