<?php
namespace App\Models\Traits;

use Illuminate\Support\Carbon;

trait HasPublishedAt
{
    public function publicationStatus()
    {
        if (is_null($this->published_at)) {
            $status = 'draft';
        } else if (isset($this->published_at) AND $this->published_at->isFuture()) {
            $status = 'schedule';
        } else if (isset($this->deleted_at)) {
            $status = 'trash';
        } else {
            $status = 'publish';
        }

        return $status;
    }

    public function publicationLabel()
    {
        return match ($this->publicationStatus()) {
            'draft'     => '<span class="text-capitalize text-warning d-block">Draf</span>',
            'schedule'  => '<span class="text-capitalize text-info d-block">Terjadwal</span>',
            'publish'   => '<span class="text-capitalize text-success d-block">Terbit</span>',
            'trash'     => '<span class="text-capitalize d-block">Sampah</span>',
        };
    }

    public function publicationBadge()
    {
        return match ($this->publicationStatus()) {
            'draft'     => '<span class="badge bg-warning bg-opacity-20 text-warning">Draf</span>',
            'schedule'  => '<span class="badge bg-info bg-opacity-20 text-info">Terjadwal</span>',
            'publish'   => '<span class="badge bg-success bg-opacity-20 text-success">Terbit</span>',
            'trash'     => '<span class="badge bg-dark bg-opacity-20 text-dark">Sampah</span>',
        };
    }

    public function scopePublished($query): void
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeScheduled($query): void
    {
        $query->where('published_at', '>', Carbon::now());
    }

    public function scopeDraft($query): void
    {
        $query->whereNull('published_at');
    }

    public function scopePopular($query, $days = 365): void
    {
        $query->where('published_at', '>', Carbon::now()->subDays($days))
            ->orderBy('view', 'desc');
    }

    public function scopeLatestPublished($query): void
    {
        $query->orderBy('published_at', 'desc');
    }
}
