<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Complait extends Model {
        use HasFactory;
        protected $fillable = ['complait_submitted', 'status'];
    }
