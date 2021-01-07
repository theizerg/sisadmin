<?php

namespace App\Http\Controllers;
use App\Models\Pastor;
use App\Models\Estado;
use App\Models\Estado_Civil;
use App\Models\Genero;
use App\Models\Grado_Ministerial;
use App\Models\Grado_Instruccion;
use App\Models\Nacionalidad;
use App\Models\Pais;
use App\Models\TipoSangre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmployeesController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastor = Pastor::Paginate(4);
        return view('pastor.index')->with('pastor',$pastor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $genero = Genero::get()->pluck('nb_genero','id');
        $estadoC = Estado_Civil::get()->pluck('nb_estado_civil','id');
        $estado = Estado::get()->pluck('nb_estado','id');
        $pais = Pais::get()->pluck('nb_pais','id');
        $gradoMin = Grado_Ministerial::get()->pluck('nb_grado_ministerial','id');
        $gradoIns = Grado_Instruccion::get()->pluck('nb_grado_instruccion','id');
        $nacionalidad = Nacionalidad::get()->pluck('nb_nacionalidad','id');
        $tipoSangre = TipoSangre::get()->pluck('nb_tipo_sangre','id');
        
     return view('pastor.create')->with([
            'genero'     => $genero,
            'estadoC'    => $estadoC,
            'estado'     => $estado,
            'gradoMin'   => $gradoMin,
            'gradoIns'        => $gradoIns,
            'nacionalidad'    => $nacionalidad,
            'pais'            => $pais,
            'tipoSangre'      => $tipoSangre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validateRequest($request,null);
        $fileNameToStore = $this->handleImageUpload($request);
        $pastor = new Pastor();
        $this->setPastor($pastor,$request,$fileNameToStore);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pastor = Pastor::find($id);
        return view('pastor.show')->with('pastor',$pastor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $genero = Genero::get()->pluck('nb_genero','id');
        $estadoC = Estado_Civil::get()->pluck('nb_estado_civil','id');
        $estado = Estado::get()->pluck('nb_estado','id');
        $pais = Pais::get()->pluck('nb_pais','id');
        $gradoMin = Grado_Ministerial::get()->pluck('nb_grado_ministerial','id');
        $gradoIns = Grado_Instruccion::get()->pluck('nb_grado_instruccion','id');
        $nacionalidad = Nacionalidad::get()->pluck('nb_nacionalidad','id');
        $tipoSangre = TipoSangre::get()->pluck('nb_tipo_sangre','id');
        
        $pastor = Pastor::find($id);

     return view('pastor.create')->with([
            'genero'     => $genero,
            'estadoC'    => $estadoC,
            'estado'     => $estado,
            'gradoMin'   => $gradoMin,
            'gradoIns'        => $gradoIns,
            'nacionalidad'    => $nacionalidad,
            'pais'            => $pais,
            'tipoSangre'      => $tipoSangre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validateRequest($request,$id);
        $pastor = Pastor::find($id);
        $old_image = $pastor->image;
        if($request->hasFile('image')){
            //Upload the image
            $fileNameToStore = $this->handleImageUpload($request);
            //Delete the previous image
            Storage::delete('public/employee_images/'.$pastor->image);
        }else{
            $fileNameToStore = '';
        }
        
        /**
         *  updating an existing employee with setPastor
         *  method
         */
        $this->setPastor($pastor,$request,$fileNameToStore);
        return redirect('/employees')->with('info','Selected Employee has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pastor = Pastor::find($id);
        $pastor->delete();
        Storage::delete('public/employee_images/'.$pastor->image);
        return redirect('/employees')->with('info','Selected Employee has been deleted!');
    }

    /**
     *  Search For Resource(s)
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $this->validate($request,[
            'search'   => 'required|min:1',
            'options'  => 'required'
        ]);
        $str = $request->input('search');
        $option = $request->input('options');
        $pastors = Pastor::where($option, 'LIKE' , '%'.$str.'%')->Paginate(4);
        return view('employee.index')->with(['employees' => $pastors , 'search' => true ]);
    }

    /**
     * This method is used for validating the form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    private function validateRequest($request,$id){
        /**
         *  specifying the validation rules 
         */
        /**
         *  Below in image validation rules we are first checking
         *  that if there is an image, if not then don't apply the
         *  validation rules. the reason we are doing this is because
         *  if we are updating an employee but not updating the image. 
         */
        return $this->validate($request,[
            'tx_nombres'     =>  'required|min:3|max:50',
            'tx_apellidos'   =>  'required|min:3|max:50',
            'nu_cedula'      =>  'required|min:2|max:9',
            'nu_telefono'    =>  'required|min:1|max:11',
            'nu_edad'        =>  'required|max:2',
            'tx_direccion'   =>  'required',
            'fe_nacimiento'  =>  'required',
            'lugar_nacimiento_id'       =>  'required',
            'nacionalidad_id'           =>  'required',
            'genero_id'                 =>  'required',
            'grado_instruccion_id'      =>  'required',
            'estado_civil_id'           =>  'required',
            'estado_id'                 =>  'required',
            'tx_nota'                   =>  'required',
            'nb_bau_Espiritu_Santo'     =>  'required',
            'nb_ins_teologico'          =>  'required',
            'nb_desc_ins_teologico'     =>  'required',
            'nu_tiempo_ins'             =>  'required',
            'fe_ingreso'                =>  'required',
            'grado_ministerial_id'      =>  'required',
            'nb_sufre_enfermedad'       =>  'required',
            'nb_descripcion_enfermedad' =>  'required',
            'tipo_sangre_id'            =>  'required',
            'tx_correo'          =>  'required|email|unique:pastor,tx_correo,'.($id ? : '' ).'|max:250',
            'picture'        =>  ($request->hasFile('picture') ? 'required|image|max:1999' : '')
            /**
             *  if we are updating an employee but not changing the
             *  email then this will throw a validation error saying
             *  that email should be unique. that's why we need to specify
             *  the current employee to ignore the unique validation rule.
             *  Above in email rules , we are using a ternary operator simply
             *  saying that if we pass an id then it will ignore that employee
             *  (which we want in update) and if id's null then it will check
             *  every employee to be unique (which we want in create because
             *  every employee should have a unique email).
             *  check the documentation for more details, 
             *  https://laravel.com/docs/5.6/validation#rule-unique 
             */

            
        ]);
    }

    /**
     * Save a new resource or update an existing resource.
     *
     * @param  App\Employee $pastor
     * @param  \Illuminate\Http\Request  $request
     * @param  string $fileNameToStore
     * @return Boolean
     */
    private function setPastor(Pastor $pastor,Request $request,$fileNameToStore){
        $pastor->tx_nombres   = $request->input('tx_nombres');
        $pastor->tx_apellidos    = $request->input('tx_apellidos');
        $pastor->nu_cedula        = $request->input('nu_cedula');
        $pastor->nu_telefono          = $request->input('nu_telefono');
        $pastor->nu_edad      = $request->input('nu_edad');
        $pastor->tx_direccion        = $request->input('tx_direccion');
        //Format Date then insert it to the database
        $pastor->fe_nacimiento    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('fe_nacimiento'))));
        //Format Date then insert it to the database
        $pastor->lugar_nacimiento_id    = $request->input('lugar_nacimiento_id');
        $pastor->nacionalidad_id  = $request->input('nacionalidad_id');
        $pastor->genero_id    = $request->input('genero_id'); 
        $pastor->grado_instruccion_id      = $request->input('grado_instruccion_id');
        $pastor->estado_civil_id      = $request->input('estado_civil_id');
        $pastor->estado_id     = $request->input('estado_id');
        $pastor->tx_nota   = $request->input('tx_nota');
        $pastor->nb_bau_Espiritu_Santo   = $request->input('nb_bau_Espiritu_Santo');
        $pastor->nb_ins_teologico   = $request->input('nb_ins_teologico');
        $pastor->nb_desc_ins_teologico   = $request->input('nb_desc_ins_teologico');
        $pastor->nu_tiempo_ins   = $request->input('nu_tiempo_ins');
        $pastor->fe_ingreso   = $request->input('fe_ingreso');
        $pastor->grado_ministerial_id   = $request->input('grado_ministerial_id');
        $pastor->nb_sufre_enfermedad   = $request->input('nb_sufre_enfermedad');
        $pastor->nb_descripcion_enfermedad   = $request->input('nb_descripcion_enfermedad');
        $pastor->tipo_sangre_id   = $request->input('tipo_sangre_id');
        $pastor->tx_correo   = $request->input('tx_correo');
         $pastor->nb_titulo_obtenido   = $request->input('nb_titulo_obtenido');
        /**
         *  we are checking if there is an image
         *  because if we are updating an employee
         *  but not changing the employee image then
         *  it will save  '' (means null) to image field and we don't
         *  want that. 
         */
        if($request->hasFile('picture')){
            $pastor->image = $fileNameToStore;
        }
        
        $pastor->save();
    }

    /**
     * Handle image upload when creating a new resource
     * or updating an existing resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handleImageUpload(Request $request){
        dd( $request->hasFile('picture'));

        if( $request->hasFile('picture') ){
            
            //get filename with extension
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            
            //get just filename
            $filename = pathInfo($filenameWithExt,PATHINFO_FILENAME);
            
            // get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();
            
            /**
             * filename to store
             * 
             *  we are appending timestamp to the file name
             *  and prepending it to the file extension just to
             *  make the file name unique.
             */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            //upload the image
            $path = $request->file('picture')->storeAs('public/employee_images',$fileNameToStore);
        }
        /**
         *  return the file name so we can add it to database.
         */
        return $fileNameToStore;
    }
}
