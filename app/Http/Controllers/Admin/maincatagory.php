<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Main_Catagotiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class maincatagory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $defalt_lan=get_default_lang()  ;
      $cataguries=Main_Catagotiry::where('translation_lang',$defalt_lan)->get();
      return view('admin.cataguries.index',compact('cataguries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cataguries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $main_categories = collect($request->category);
   
        try {
        $filter = $main_categories->filter(function ($value, $key) {
            return $value['abbr'] == get_default_lang();
        });
        $default_category = array_values($filter->all()) [0];

       // dd( $default_category);
        $imageName = time().'.'.$request->photo->extension();  
     
        $request->photo->move(public_path('images'), $imageName);
        DB::beginTransaction();

        $default_category_id = Main_Catagotiry::insertGetId([
            'translation_lang' => $default_category['abbr'],
            'translation_of' => 0,
            'name' => $default_category['name'],
            'slog' => $default_category['name'],
            'photo' => $imageName
        ]);
       

        $categories = $main_categories->filter(function ($value, $key) {
            return $value['abbr'] != get_default_lang();
        });


        if (isset($categories) && $categories->count()) {

          
            foreach ($categories as $category) {
                $categories_arr[] = [
                    'translation_lang' => $category['abbr'],
                    'translation_of' => $default_category_id,
                    'name' => $category['name'],
                    'slug' => $category['name'],
                    'photo' => $imageName
                ];
            }
          

            Main_Catagotiry::create([
                'translation_lang' =>$categories_arr[0]['translation_lang'],
                'translation_of' => $categories_arr[0]['translation_of'],
                'name' =>  $categories_arr[0]['name'],
                'slog' => $categories_arr[0]['name'],
                'photo' =>  $categories_arr[0]['photo']
            ]);
          //  dd($categories_arr[0]['translation_lang']) ;
        }
        DB::commit();
        return redirect()->route('catugory.index')->with(['success' => 'تم انشاء قسم  بنجاح ']);

   } catch (\Exception $ex) {
        DB::rollback();
        return redirect()->route('admin.catugory.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $main_categories=Main_Catagotiry::find($id);
if(!$main_categories){
    return redirect()->route('admin.catugory.index')->with(['error' => 'هذا القسم غير موجود ']);
}
    return view('admin.cataguries.edit', compact('main_categories'));



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $main_category = Main_Catagotiry::find($id);

            if (!$main_category)
                return redirect()->route('catugory.index')->with(['error' => 'هذا القسم غير موجود ']);

            // update date
          

            $category = array_values($request->category)[0] ;
          
            if (!$request->has('category.0.active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

              
               
                Main_Catagotiry::where('id', $id)
                ->update([
                    'name' => $category['name'],
                    'active' => $request->active,
                ]);

            // save image

     
            return redirect()->route('catugory.index')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('catugory.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
