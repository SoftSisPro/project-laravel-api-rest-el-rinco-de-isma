<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Filters\CustomerFilter;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        # Instancia de la clase CustomerFilter
        $filter = new CustomerFilter();
        # Transforma los datos de la petición
        $queryItems = $filter->transform($request);
        # Pagina los datos y hace la consulta
        $customers = Customer::where($queryItems)->paginate(10);
        //- Validamos si solicita los invoices
        $includeInvoices = $request->query('includeInvoices');
        if ($includeInvoices) {
            $customers->load('invoices');
        }
        # Retorna la colección de datos paginados
        return new CustomerCollection($customers->appends($request->query()));

        //$customers = Customer::all(); # Vista normal

        /* Vista con coleccion
        $customers = Customer::paginate(10); #
        return new CustomerCollection($customers);
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $includeInvoices = request()->query('includeInvoices');
        if ($includeInvoices) {
            $customer->loadMissing('invoices');
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
