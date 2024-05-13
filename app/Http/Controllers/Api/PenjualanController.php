<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PenjualanModel; // Make sure to import the PenjualanModel

class PenjualanController extends Controller
{

    public function index()
    {
        // All penjualan
        $penjualan = PenjualanModel::all();

        // Return Json Response
        return response()->json([
            'penjualan' => $penjualan
        ], 200);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required|date_format:Y-m-d',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 400);
        }

        try {
            // Create penjualan
            $penjualan = PenjualanModel::create([
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal,
                'image' => $request->image->hashName(),
            ]);

            // Return Json Response
            return response()->json([
                'success' => true,
                'penjualan' => $penjualan,
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
    public function show($id)
    {
        $penjualan = PenjualanModel::find($id);
        if ($penjualan) {
            return response()->json($penjualan, 200);
        } else {
            return response()->json(['message' => 'Penjualan tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, PenjualanModel $penjualan)
    {

        $penjualan->update($request->all());
        return $penjualan;

    }

    public function destroy(PenjualanModel $penjualan)
    {
        $penjualan->delete();
        return response()->json([
            "success" => true,
            "message" => 'Data terhapus'
        ]);
    }
}
