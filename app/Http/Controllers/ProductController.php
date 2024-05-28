<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        //return response()->json(Product::all(), 200);

        $products = Product::all();

        if($products->count() > 0){

            return response()->json([
                'status' => 200,
                'products' => $products
            ], 200);

        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
            ], 404);
        }
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric',
        ]);

        if($validatedData->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validatedData->messages()
            ], 422);

        }else {

            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            if($product) {

                return response()->json([
                    'status' => 200,
                    'message' => "Product Created Successfully"
                ], 200);

            }else {

                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }


    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
            $product = Product::find($id);

            if($product) {
                return response()->json([
                    'status' => 200,
                    'product' => $product
                ], 200);

            }else {

                return response()->json([
                    'status' => 404,
                    'message' => "No Such Product Found!"
                ], 404);

            }
    }


    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);


        // Check if the product was found
        if ($product) {
        // Update the product with the validated data
        $product->update($validatedData);


        // Return the updated product as a JSON response with a 200 HTTP status code
        return response()->json($product, 200);
        } else {
        // Return a 404 Not Found HTTP status code if the product was not found
        return response()->json(['message' => 'Product not found'], 404);
        }
    }


    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Product $product)
    {
    // Check if the product was found
    if ($product) {
    // Delete the product
    $product->delete();


    // Return a 204 No Content HTTP status code
    return response()->json(null, 204);
        } else {
        // Return a 404 Not Found HTTP status code if the product was not found
        return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
