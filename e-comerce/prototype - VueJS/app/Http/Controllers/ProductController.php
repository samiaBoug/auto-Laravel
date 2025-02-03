<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        $products = $this->productRepo->all() ;
        return response()->json(['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "name"=> 'required|string|max:255',
                "description"=> 'required|string',
                "price"=>'required|integer'
            ]
            );
        $product= $this->productRepo->create($request);

        return response()->json([
            'success' => true,
            'message' => 'Produit créé avec succès.',
            'product' => $product
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

        $this->productRepo->delete($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Produit supprimé avec succès.'
        ], 200);
        }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => 'Erreur lors de la suppression.']);
        }
    }

  }



