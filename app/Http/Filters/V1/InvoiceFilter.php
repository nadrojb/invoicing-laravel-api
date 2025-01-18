<?php

namespace App\Http\Filters\V1;

class InvoiceFilter {
    public function status($value) {
        return $this->builder->where('status', $value);
    }
}
