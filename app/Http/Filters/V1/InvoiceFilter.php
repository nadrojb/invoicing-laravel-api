<?php

namespace App\Http\Filters\V1;

class InvoiceFilter extends QueryFilter
{
    public function include($value)
    {
        return $this->builder->with($value);
    }

    public function status($value)
    {
        //Below is seperating multiple query parameters into an array
        return $this->builder->whereIn('status', explode(',', $value));
    }

    public function customerName($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('customer_name', 'like', $likeStr);
    }
}
