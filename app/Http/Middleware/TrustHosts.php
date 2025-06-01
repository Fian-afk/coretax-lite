<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
<<<<<<< HEAD
    public function hosts()
=======
    public function hosts(): array
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
