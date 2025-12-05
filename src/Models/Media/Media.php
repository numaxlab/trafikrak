<?php

namespace Testa\Models\Media;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Media
{
    public function attachments(): MorphMany;
}
