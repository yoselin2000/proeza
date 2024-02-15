<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Range;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'term', 'feeType', 'frequency','choose', 'date',
        'operation', 'sequence', 'specific', 'user_id','destination_id',
        'product_id', 'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function assign()
    {
        return $this->hasOne(Assign::class);
    }

    public function observeds()
    {
        return $this->hasMany(Observed::class);
    }

    public function approved()
    {
        return $this->hasOne(Approved::class);
    }

    public function rejected()
    {
        return $this->hasOne(Rejected::class);
    }

    public function disbursement()
    {
        return $this->hasOne(Disbursement::class);
    }

    public function debtor(){
        $debtor = $this->participants()->where('category_id', 1)->first();
        if ($debtor) {
            $client = Client::find($debtor->client_id);
            return $client;
        } else {
            return null;
        }
    }

    public function choose(){
        $user = Auth::user();
        $ranges = Range::all();
        $range;
        foreach ($ranges as $item) {
            if ($this->amount > $item->min && $this->amount <= $item->max) {
                $range = $item;
                break;
            }
        }

        $rev1 = $range->users->where('id', '!=', $user->id)->where('agency_id', $user->agency->id);
        $rev2 = $range->users->where('id', '!=', $user->id);
        $rev3 = User::find(1);

        if ($rev1->count() > 0) {
            return $rev1;
        } elseif ($rev2->count() > 0) {
            return $rev2;
        } else {
            return $rev3;
        }
    }
}
