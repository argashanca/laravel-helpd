<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tiket extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'tikets';


    protected $fillable = [
        'no_tiket',
        'req_subject',
        'req_desc',
        'priority',
        'user_id',
        'user_group_id',
        'tiket_stat',
        'attach',
        'req_date',
        'req_close',
        'sleg',
    ];


    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function sluggable(): array
    {
        return [
            'sleg' => [
                'source' => 'no_tiket'
            ]
        ];
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->hasMany(Requestd::class);
    }


    // public function all_id()
    // {
    //     return DB::table('tikets')
    //         ->leftJoin('users', 'users.id', '=', 'tikets.user_id')
    //         ->leftJoin('user_group', 'user_group.id', '=', 'tikets.user_group_id')
    //         ->paginate(10);
    // }

    //     return DB::table('tikets')
    //         ->leftJoin('users', 'users.id', '=', 'tikets.user_id')
    //         ->leftJoin('user_group', 'user_group.id', '=', 'tikets.user_group_id')
    //         ->where('no_tiket', 'LIKE', '%' . $keyword . '%')
    //         ->paginate(5);
    // }
}
