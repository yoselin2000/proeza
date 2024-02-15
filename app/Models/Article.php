<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'performance', 'production', 'activity_id', 'buys', 'sale', 'mb'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }

    public function saleDetail()
    {
        return $this->hasOne(SaleDetail::class);
    }

    public function buys()
    {
        $article = $this;
        $res = 0;

        if ($article->performance > 0) {
            $res = $article->supplies->sum('total')/($article->performance);
            $article->buys = round($res, 2);
            $article->save();
            return round($res, 2);
        } else {
            return round($res, 2);
        }
    }

    public function mb()
    {
        $article = $this;
        $res = 0;

        if ($article->performance > 0) {
            if ($article->sale > 0) {
                $res = ($article->sale-$article->buys)/$article->sale;
                $article->mb = $res;
                $article->save();
                return round($res*100, 2);
            } else {
                return round($res*100, 2);
            }
        } else {
            return 0;
        }
    }
}
