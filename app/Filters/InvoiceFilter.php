<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter
{
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];

    protected $safeParams =[
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'paidDate' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    ];

    protected $columnMap =[
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

}


?>
