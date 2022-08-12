<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\invoice;
use Exception;

class invoiceController extends Controller
{
    public function index() //listar facturas
    {
        try{
            return invoice::all();
        }

        catch (Exception $e){
            return ["error:",$e->getMessage()];
        }
    }

    public function store(Request $request) // guardar factura
    {
        try{
            // error_log('entrando al try');
            $invoice = new invoice();
            $invoice->invoiceNumber = $request->invoiceNumber;
            $invoice->emitterName = $request->emitterName;
            $invoice->emitterNit = $request->emitterNit;
            $invoice->receptorName = $request->receptorName;
            $invoice->receptorNit = $request->receptorNit;
            $invoice->valueNoneVat = $request->valueNoneVat;
            $invoice->vat = $request->vat;
            $invoice->totalValue = $request->totalValue;
            $invoice->items = json_encode($request->items);

            $invoice->save();
            return response()->json([
                'message' => '¡Factura registrada exitosamente!',
                'invoice' => $invoice
            ],201);
        }
        catch (Exception $e){
            return ["error:",$e->getMessage()];
        }

    }

    public function show($id) //muestra una factura
    {
        try{
            return response()->json([
                'message' => 'Factura encontrada',
                'invoice' => invoice::find($id)
            ],200);
        }

        catch (Exception $e){
            return response()->json([
                'message' => 'Hubo un problema',
                'error' => $e->getMessage()
            ],404);
        }
    }

    public function update(Request $request, $id) //actualiza una factura
    {
        try{
            $invoice = invoice::findOrFail($request->id);
            $invoice->invoiceNumber = $request->invoiceNumber;
            $invoice->emitterName = $request->emitterName;
            $invoice->emitterNit = $request->emitterNit;
            $invoice->receptorName = $request->receptorName;
            $invoice->receptorNit = $request->receptorNit;
            $invoice->valueNoneVat = $request->valueNoneVat;
            $invoice->vat = $request->vat;
            $invoice->totalValue = $request->totalValue;
            $invoice->items = $request->items;

            $invoice->save();
            return response()->json([
                'message' => 'Factura actualizada exitosamente',
                'invoice' => $invoice
            ],200);
        }
        catch (Exception $e){
            return response()->json([
                'message' => 'Hubo un problema',
                'error' => $e->getMessage()
            ],404);
        }

    }

    public function destroy($id) //eliminar una factura
    {
        try{
            $invoice = invoice::findOrFail($id);
            if (!empty($invoice)){
                $invoice = invoice::destroy($id);
                return response()->json([
                    'message' => 'Factura eliminada exitosamente',
                    'invoice' => $invoice
                ],200);
            }
        }
        catch (Exception $e){
            return response()->json([
                'message' => 'Hubo un problema',
                'error' => $e->getMessage()
            ],404);
        }
    }
}
